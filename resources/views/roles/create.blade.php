@extends('layouts.dashboard')
@section('content')
<div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2>إضافة صلاحية</h2>
    <div>
      
        <a href="{{ route('roles.index') }}" class="btn btn-primary"> الصلاحيات</a>
        
      
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
    <form method="post" action="{{ route('roles.store') }}" >
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>إسم الصلاحية</strong>
                    <input type="text" name="name" placeholder="إسم الصلاحية" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>الصلاحيات الفرعية:</strong>
                    <select class="custom-select custom-select-lg mb-3" name="permissions[]" multiple>
                      <option selected>حدد الصلاحية</option>
                      @foreach($permissions as $permission)
                        <option value="{{ $permission->id }}"> {{ $permission->name }} </option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection