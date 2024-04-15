<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Task;
use Illuminate\Support\Carbon;
use App\Models\UsersTask;
use App\Models\Ads;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       

         if (Auth::user()->hasRole('admin')) {

            $status = UsersTask::get();
            $tasks = Task::orderBy('id', 'desc')->paginate(10);
            $allusers = User::all();
            $users = User::paginate(4);
            $done = UsersTask::where('status','Done')->get();
            $canceled = UsersTask::where('status','Canceled')->get();
            $working = UsersTask::where('status','Working')->get();
            $waiting = UsersTask::where('status','Wainting')->get();

            return view('index',compact('status','allusers','users','tasks','canceled','done','working','waiting'));

        } else {

            $status = UsersTask::get();
            $usertasks = UsersTask::where('user_id',Auth()->user()->id)->get();
          //  $tasks = Task::get();
            $allusers = User::all();
            $users = User::paginate(4);
            $done = UsersTask::where('status','Done')
                        ->where('user_id',Auth()->user()->id)->get();
            $canceled = UsersTask::where('status','Canceled')
                        ->where('user_id',Auth()->user()->id)->get();
            $working = UsersTask::where('status','Working')
                        ->where('user_id',Auth()->user()->id)->get();
            $waiting = UsersTask::where('status','Wainting')
                        ->where('user_id',Auth()->user()->id)->get();
            $user = User::where('id',Auth()->user()->id)->first();

            
 
           $tasks = DB::table('tasks')
            ->join('users_tasks', 'tasks.id', '=', 'users_tasks.task_id')
            ->where('users_tasks.user_id','=',Auth()->user()->id)
             ->select('tasks.*', 'users_tasks.status', 'users_tasks.task_id')
            ->paginate(10);

            $ads = Ads::all();

            

            return view('user',compact('user','usertasks','status','allusers','users','tasks','canceled','done','working','waiting','ads'));
        }
    }


    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
}

}
