@extends('layouts.dashboard')
@section('content')
<div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2> إضافة موظف</h2>
    <div>
       <a href="{{ route('users.index') }}" class="btn btn-primary">الموظفين</a>
    </div>
    </div>
    <div class="card-body pt-0 pb-5">

    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data" >
        @csrf
        <div class="row">
            
            <div class="col-lg-6">

          
            <div class="form-group">
                <label>الاسم</label>
                <input type="text" class="form-control" name="name" placeholder="إسم الموظف">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect12">الادارة</label>
                <select class="form-control" name="dept">
                    <option selected disabled>إختر الادارة</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->dept_name }}</option>   
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>القسم</label>
                <input type="text" class="form-control" name="job" placeholder="القسم">
            </div>

            <div class="form-group">
                <label>الايميل</label>
                <input type="email" class="form-control" name="email" placeholder="الايميل">
            </div>

            <div class="form-group">
                <label>كلمة المرور</label>
                <input type="password" class="form-control" name="password" placeholder="كلمة المرور">
            </div>

            <div class="form-group">
                <label>كلمة المرور</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder=" تأكيد كلمة المرور">
            </div>

            <div class="form-group">
                <label>صورة الموظف</label>
                <input type="file" class="form-control" name="empimage" >
            </div>

            
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>التكليف الاداري </h2>
                </div>
    
                <div class="card-body">
                    <ul class="list-unstyled list-inline">
                        <li class="d-inline-block mr-3">
                            <label class="control control-radio">مدير الادارة
                                <input value="1" type="radio" name="mgr"/>
                                <div class="control-indicator"></div>
                            </label>
                        </li>
    
                        <li class="d-inline-block mr-3">
                            <label class="control control-radio">رئيس قسم
                                <input value="1" type="radio"  name="secmgr"/>
                                <div class="control-indicator"></div>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>الصلاحيات: </strong>
                    <select class="custom-select custom-select-lg mb-3" name="roles[]" multiple>
                      <option selected>إختر الصلاحية</option>
                      @foreach($roles as $role)
                        <option value="{{ $role->id }}"> {{ __('custom.'. $role->name ) }}</option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">إضافة</button>
            </div>
        </div>
        </div>
    </form>
</div>
</div>
@endsection