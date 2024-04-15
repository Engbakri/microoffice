@extends('layouts.dashboard')

@section('content')
<div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2>إضافة مهمة جديدة</h2>
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

    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('POST')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>المهمة</label>
                    <input type="text" name="task"  class="form-control" placeholder="المهمة">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>الوصف</label>
                    <textarea class="form-control" rows="5" name="description" placeholder="وصف المهمة"></textarea>
                </div>
            </div>

            
                <div class="col-md-3 mb-3">
                    <label for="validationServer03">عدد الساعات</label>
                    <input type="number" name="time_hour" class="form-control" id="validationServer03" placeholder="عدد الساعات">
                </div>

                <div class="col-md-3 mb-3">
                    <label for="validationServer04">عدد الايام</label>
                    <input type="number" name="time_day" class="form-control" id="validationServer04" placeholder="عدد الايام">
                </div>

                <div class="col-md-3 mb-3">
                    <label for="validationServer05">عدد الاسابيع</label>
                    <input type="number" name="time_week" class="form-control" id="validationServer05" placeholder="عدد الاسابيع" >
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationServer05">عدد الشهور</label>
                    <input type="number" name="time_month" class="form-control" id="validationServer05" placeholder="عدد الشهور" >
                </div>
            

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>مرفق</label>
                    <input type="file" name="task_attach"  class="form-control">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>أسناد المهمة الي  </h2>
                    </div>
                    <div class="card-body">
                        
                       
                        <label class="control outlined control-checkbox checkbox-success">الي الجميع
                            <input type="checkbox"  id="select-all" />
                            <div class="control-indicator"></div>
                        </label>
                        @foreach ($users as $user)
                            <label class="control outlined control-checkbox checkbox-success">{{ $user->name }} - {{ $user->department->dept_name }}
                                <input type="checkbox" name="users[]" value="{{  $user->id }}" />
                                <div class="control-indicator"></div>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
           

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary btn-block">إضافة</button>
            </div>
        </div>
    </form>
</div>
</div>

@endsection
