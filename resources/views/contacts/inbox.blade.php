@extends('layouts.dashboard')
@section('content')
<div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2>البريد الوارد</h2>
    <div>
        <a href="{{ route('contacts.create') }}" class="btn btn-primary">إنشاء رسالة</a>
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
        
        
             @foreach ($messages as $key => $message)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ \App\Models\User::where(['id' => $message->sender])->first()->name }}</td>
                <td> <a href="{{ route('contacts.show',[$message->id,$message_status]) }}">{{ $message->message }}</a></td>
                <td class="col-md-2">{{ Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</td>
                
              </tr>
             @endforeach
            </table>
        </div>
    </div>


@endsection