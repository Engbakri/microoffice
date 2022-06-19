@extends('layouts.dashboard')
@section('content')
<div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2>تعديل بيانات الموظف</h2>
    <div>
        
            <a href="{{ route('users.index') }}" class="btn btn-primary">الموظفين</a>
    
      
    </div>
    </div>
    <div class="card-body pt-0 pb-5">

    <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="hidden" name="oldimage" value="{{ $user->image }}"/>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>إسم الموظف</strong>
                    <input type="text" name="name" placeholder="إسم الموظف" class="form-control" value="{{ $user->name }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>الوظيفة</strong>
                    <input type="text" name="job" placeholder="المسمى الوظيفي" class="form-control" value="{{ $user->job }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>الايميل</strong>
                    <input type="email" name="email" placeholder="البريد الالكتروني" class="form-control" readonly value="{{ $user->email }}">
                </div>
            </div>

            <div class="form-group">
                <label>صورة الموظف</label>
                <input type="file" class="form-control" name="empimage" >
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>الصلاحية</strong>
                    <select class="custom-select custom-select-lg mb-3" name="roles[]" multiple>
                      @foreach($roles as $role)
                        <option value="{{ $role->id }}" @if(in_array($role->id, $userRoles) ) selected @endif> {{ __('custom.'.$role->name) }} </option>
                      @endforeach
                    </select>
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