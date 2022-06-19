@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-12"> 
<!-- Recent Order Table -->
<div class="card card-table-border-none" id="recent-orders">
<div class="card-header justify-content-between">
<h2>عرض تفاصيل المهمة</h2>
<div>
<a class="btn btn-primary" href="{{ route('tasks.index') }}">المهام</a>
</div>
</div>
<div class="card-body pt-0 pb-5">
    <div class="col-lg-12">
                    <div class="form-group">
                        <label>المهمة</label>
                        <input type="text" value="{{ $task->task }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label >التفاصيل</label>
                        <textarea class="form-control" rows="3" disabled>{{ $task->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label >المرفق</label>
                        <img src="{{ asset($task->task_attach) }}" width="300" height="300"/>
                    </div>
                    <div class="form-group">
                        <label>المدة</label>
                        <input type="text" value="{{ $task->task_time }}" class="form-control" disabled>
                    </div>
                   
          
        

      

    </div>
</div>
</div>
</div>
</div>
@endsection