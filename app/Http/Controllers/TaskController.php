<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\UsersTask;
use DB;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->paginate(5);
        $status = UsersTask::get();

        return view('tasks.index', compact('tasks','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users =User::all();
        
       return view('tasks.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required'
        ]);

        $task_file =  $request->file('task_attach');

        if($task_file){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($task_file->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'files/tasks/';
        $last_img = $up_location.$img_name;
        $task_file->move($up_location,$img_name);

        
        $task =  Task::create([
            'task' => $request->input('task'),
            'description' => $request->input('description'),
            'time_hour' => $request->input('time_hour'),
            'time_day' => $request->input('time_day'),
            'time_week' => $request->input('time_week'),
            'time_month' => $request->input('time_month'),
            'task_attach' => $last_img,
            'created_at' => Carbon::now(),
           ]);
        } else {
            $task =  Task::create([
                'task' => $request->input('task'),
                'description' => $request->input('description'),
                'time_hour' => $request->input('time_hour'),
                'time_day' => $request->input('time_day'),
                'time_week' => $request->input('time_week'),
                'time_month' => $request->input('time_month'),
                'created_at' => Carbon::now(),
               ]);
        }

       

       if($task){
        $user = User::find($request->users);
        $task->users()->attach($user);
       }

        return redirect()->route('tasks.index') 
                    ->with('success','تم إضافة المهام بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
      return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $users = User::all();
        return view('tasks.edit', compact('task','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'task' => 'required',
          
        ]);

        $old_file =  $request->oldimage;
        $task_file =  $request->file('task_attach');

        if($task_file){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($task_file->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'files/tasks/';
        $last_img = $up_location.$img_name;
        $task_file->move($up_location,$img_name);

        if($old_file){
            unlink($old_file);
        }
        

        $task =  Task::find($id);
        $task->update([
            'task' => $request->input('task'),
            'description' => $request->input('description'),
            'time_hour' => $request->input('time_hour'),
            'time_day' => $request->input('time_day'),
            'time_week' => $request->input('time_week'),
            'time_month' => $request->input('time_month'),
            'task_attach' => $last_img,
            'updated_at' => Carbon::now(),
           ]);
        } else {
            $task =  Task::find($id);
            $task->update([
                'task' => $request->input('task'),
                'description' => $request->input('description'),
                'time_hour' => $request->input('time_hour'),
                'time_day' => $request->input('time_day'),
                'time_week' => $request->input('time_week'),
                'time_month' => $request->input('time_month'),
                'updated_at' => Carbon::now(),
               ]);
        }

       if($task){
        
        $user = User::find($request->users);
         DB::table('users_tasks')->where('task_id',$id)->delete();
        $task->users()->attach($user);
        
       }

        return redirect()->route('tasks.index')->with('success','تم تعديل المهمة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task $tasks
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $task = Task::find($id);

        return view('tasks.delete', compact('task'));
    }

    public function destroy(Task $task)
    {
      $task->delete();

       return redirect()->route('tasks.index')
                       ->with('error','تم حذف المهمة');
    }
}
