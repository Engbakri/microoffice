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
                        @if ($extension == 'png' or $extension == 'jpg')
                        <img src="{{ asset($task->task_attach) }}" width="200" height="200"/>
                        <a href="{{ asset($task->task_attach) }}" target="_blank" class="btn btn-success">تحميل</a>
                        @else
                        <i class=""></i>
                        
                        <a href="{{ asset($task->task_attach) }}" target="_blank" class="btn btn-success">تحميل الملف</a>
                        @endif 
                        
                    </div>
    </div>
    <label>مدة التنفيذ:</label>
                            
                    <div class="row">
                        
                    <div class="col-lg-3">
                        <div class="form-group">
                            
                            <input type="text" value="{{ $task->time_hour ?? 0 }} ساعة" class="form-control" disabled> 
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            
                            <input type="text" value="{{ $task->time_day ?? 0 }} يوم" class="form-control" disabled> 
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" value="{{ $task->time_week ?? 0 }} اسبوع" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" value="{{ $task->time_month ?? 0  }} شهر" class="form-control" disabled>
                        
                        </div>
                    </div>
                </div>
                    
                   
                   
          
        

      

    
</div>
</div>
</div>
</div>
@endsection