@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-12"> 
<!-- Recent Order Table -->
<div class="card card-table-border-none" id="recent-orders">
<div class="card-header justify-content-between">
<h2>عرض تفاصيل الاعلان</h2>
<div>
<a class="btn btn-primary" href="{{ route('ads.index') }}">لوحة الاعلان</a>
</div>
</div>
<div class="card-body pt-0 pb-5">
    <div class="col-lg-12">
                    <div class="form-group">
                        <label>نص الاعلان</label>
                        <input type="text" value="{{ $ads->ads_title }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label >التفاصيل</label>
                        <textarea class="form-control" rows="3" disabled>{{ $ads->ads_desc }}</textarea>
                    </div>
                    <div class="form-group">
                        <label >المرفق</label>
                        @if ($extension == 'png' or $extension == 'jpg')
                        <img src="{{ asset($ads->ads_image) }}" width="200" height="200"/>
                        <a href="{{ asset($ads->ads_image) }}" target="_blank" class="btn btn-success">تحميل</a>
                        @else
                        <i class=""></i>
                        
                        <a href="{{ asset($ads->ads_image) }}" target="_blank" class="btn btn-success">تحميل الملف</a>
                        @endif 
                        
                    </div>
                    <div class="form-group">
                        <label>المدة</label>
                        <input type="text" value="{{ $ads->ads_userid }}" class="form-control" disabled>
                    </div>
    </div>
</div>
</div>
</div>
</div>
@endsection