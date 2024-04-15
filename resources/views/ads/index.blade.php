@extends('layouts.dashboard')
@section('content')
<div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2>الرسائل</h2>
    <div>
        <a href="{{ route('ads.create') }}" class="btn btn-primary">إنشاء إعلان</a>
    </div>
    </div>
    <div class="card-body pt-0 pb-5">
    <table class="table card-table table-responsive table-responsive-large">
        <thead>
        <tr>
               <th>رقم</th>
               <th>المرسل</th>
               <th>الرسالة</th>
               <th>الزمن</th>
        </tr>
        
             @foreach ($ads as $key => $ads)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ \App\Models\User::where(['id' => $ads->ads_userid])->first()->name }}</td>
                <td> <a href="{{ route('ads.show',$ads->id) }}">{{ $ads->ads_title }}</a></td>
                <td class="col-md-2">{{ Carbon\Carbon::parse($ads->created_at)->diffForHumans() }}</td>
                
              </tr>
             @endforeach
            </table>
        </div>
    </div>


@endsection