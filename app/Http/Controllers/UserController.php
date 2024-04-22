<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
      $users = User::whereHas('roles', function($query){
                $query->Orwhere('name', 'user');
              })->paginate(10);

      return view('users.index', compact('users'));
    }

    public function create()
    {
        $departments = Department::all();
        $roles = Role::get(['id', 'name']);
        return view('users.create', compact('roles','departments'));
    }

    public function store(Request $request)
    {

        $emp_file =  $request->file('empimage');
        if($emp_file){

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($emp_file->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'files/employees/';
        $last_img = $up_location.$img_name;
        $emp_file->move($up_location,$img_name);

        $user = User::create([
                  'name'       =>  $request->name,
                  'dept'       => $request->dept,
                  'job'        =>  $request->job,
                  'image'      =>  $last_img,
                  'email'      =>  $request->email,
                  'password'   =>  Hash::make($request->password),
                  'mgr'        => $request->mgr,
                  'secmgr'        => $request->secmgr
                ]);
            } else {
                $user = User::create([
                    'name'      =>  $request->name,
                    'dept'      => $request->dept,
                    'job'       =>  $request->job,
                    'image'     =>  'files/employees/avatar.jpg',
                    'email'     =>  $request->email,
                    'password'  =>  Hash::make($request->password),
                    'mgr'        => $request->mgr,
                    'secmgr'        => $request->secmgr
                  ]);
                }
            

        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success', 'تم إضافة الموظف بنجاح');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get(['id', 'name']);
        $userRoles = $user->roles->pluck('id')->toArray();
        $depts = Department::all();

        return view('users.edit', compact('user', 'roles', 'userRoles','depts'));
    }

    public function update(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $old_file =  $request->oldimage;
        $emp_file =  $request->file('empimage');
       
        if($emp_file){
           
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($emp_file->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'files/employees/';
            $last_img = $up_location.$img_name;
            $emp_file->move($up_location,$img_name);

          

            $user->update([
                'name'  => $request->name,
                'dept'      => $request->dept,
                'job'   => $request->job,
                'image' => $last_img,
                'email'      =>  $request->email,
                'password'   =>  Hash::make($request->password),
                'mgr'        => $request->mgr,
                'secmgr'     => $request->secmgr
                ]); 
            } else {
            $user->update([
                'name' => $request->name,
                'dept'      => $request->dept,
                'job' => $request->job,
                'email'      =>  $request->email,
                'password'   =>  Hash::make($request->password),
                'mgr'        => $request->mgr,
                'secmgr'        => $request->secmgr
            ]);
        }
        $user->syncRoles($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('error','تم حذف الموظف');

    }
}
