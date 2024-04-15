@extends('layouts.dashboard')
@section('content')
<div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2>مهامي</h2>
    <div>
       
    </div>
    </div>
    <div class="card-body pt-0 pb-5">
    <table class="table card-table table-responsive table-responsive-large ">
        <thead>
        <tr>
            <th class="text-center">المهمة</th>
            <th class="text-center">الوقت</th>
            <th class="text-center">المدة</th>
            <th class="text-center">الموظف</th>
            <th class="text-center">الحالة</th>
            <th class="text-center">حالة المهمة</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td><a class="text-dark" href="{{ route('employees.show',$task->id) }}">{{ $task->task }} </a></td>
            <td>{{ Carbon\Carbon::parse($task->created_at)->diffForHumans() }}</td>
            <td class="text-center">{{ $task->task_time }}</td>
            <td class="text-center">
                @foreach ($task->users as $employee)
                @if ($employee->id === Auth()->user()->id ) 
                    <span class="badge badge-primary m-1">{{ $employee->name }}</span> 
                @endif
                @endforeach
            </td>
            <td>
                @foreach ($status as $emptask)
                    @if ($emptask->task_id === $task->id && $emptask->user_id === Auth()->user()->id ) 
                    <span class="badge 
                            @if ($emptask->status === 'Wainting') badge-secondary
                            @elseif ($emptask->status === 'Working') badge-primary
                            @elseif ($emptask->status === 'Done') badge-success
                            @else  badge-danger 
                            @endif m-1">{{ __('custom.'.$emptask->status) }}
                    </span> 
                    @endif   
                @endforeach
            </td>
            <td> 
            
                <form action="{{ route('employees.update',$task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <select name="status" class="form-control status">
                        <option >تحديث الحالة</option>
                        <option value="Wainting ">إنتظار</option>
                        <option value="Working">يعمل</option>
                        <option value="Done">منتهي</option>
                    </select>
                    <button class="btn btn-success" type="submit">تحديث</button>
                </form>
            
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
</div>
@endsection