@extends('layouts.dashboard')

@section('content')

<div class="row">

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>إضافة إدارة</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                        <label for="exampleFormControlFile1">إسم الادارة </label>
                        <input type="text" name="dept_name" class="form-control" placeholder="اسم الادارة" required>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">حفظ</button>
                        <a href="{{ route('departments.index') }}" class="btn btn-secondary btn-default">رجوع</a>
                    </div>
                </form>
            </div>
        </div>

    

        
    </div>
</div>
    
@endsection