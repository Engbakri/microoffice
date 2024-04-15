@extends('layouts.dashboard')

@section('content')

<div class="row">

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>لوحة الاعلانات</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect12">موضوع الاعلان  :</label>
                        <input type="text" name="ads_title" class="form-control" placeholder="الموضوع" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">نص الاعلان</label>
                        <textarea class="form-control" name="ads_desc" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">ارفاق صورة</label>
                        <input type="file" name="image" class="form-control-file" >
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">إسال</button>
                        <button type="submit" class="btn btn-secondary btn-default">رجوع</button>
                    </div>
                </form>
            </div>
        </div>

    

        
    </div>
</div>
    
@endsection