@extends('layouts.dashboard')
@section('content')
<div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2>تعديل مهمة</h2>
    <div>
       <a href="{{ route('tasks.index') }}" class="btn btn-primary">المهام</a>
    </div>
    </div>
    <div class="card-body pt-0 pb-5">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update',$task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="oldimage" value="{{ $task->task_attach }}"/>
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>المهمة</strong>
                    <input type="text" value="{{ $task->task }}" name="task"  class="form-control" placeholder="المهمة">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>الوصف</strong>
                    <textarea class="form-control" rows="5" name="description" placeholder="وصف المهمة">{{ $task->description }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>عدد الساعات</strong>
                    <input type="number" value="{{ $task->task_time }}" name="task_time"  class="form-control" placeholder="عدد ساعات المهمة">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>مرفق</strong>
                    <input type="file"  name="task_attach"  class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <img src="{{ asset($task->task_attach) }}" width="300" height="300"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>أسناد المهمة الي : </h2>
                    </div>
                    <div class="card-body">
                        @foreach ($users as $user)
                        <label class="control outlined control-checkbox checkbox-success">{{  $user->name }}
                            @if (in_array($user->id,$task->users->pluck('id')->toArray()))
                                <input type="checkbox"    name="users[]" value="{{  $user->id }}" checked/>
                            @else
                                <input type="checkbox"    name="users[]" value="{{  $user->id }}" />
                            @endif
                            <div class="control-indicator"></div>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
           

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">تعديل</button>
            </div>
        </div>
    </form>
</div>
</div>

@endsection


         