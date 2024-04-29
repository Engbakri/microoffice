@extends('layouts.dashboard')
@section('content')
<div class="row">
<div class="col-md-12">
<!-- New Customers -->
<div class="card card-table-border-none" >
<div class="card-header justify-content-between ">
  <h2>الرسائل</h2>
  <div>
      <a class="text-black-50 mr-2 font-size-20" href="{{ route('inbox') }}" >
        <i class="mdi mdi-cached"></i>
      </a>
      <div class="dropdown show d-inline-block widget-dropdown">
          <a class="dropdown-toggle icon-burger-mini" href="{{ route('inbox') }}" role="button" id="dropdown-customar"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
          </a>
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-customar">
            <li class="dropdown-item"><a  href="{{ route('inbox') }}">رجوع</a></li>
          </ul>
        </div>
  </div>
</div>
<div class="card-body pt-0">
  <table class="table ">
    <tbody>
    @foreach ($messages as $key => $message)
      <tr>
        <td >
          <div class="media">
            <div class="media-image mr-3 rounded-circle">
              <a href="profile.html"><img class="rounded-circle w-45" src="{{ asset(\App\Models\User::where(['id' => $message->sender])->first()->image) }}" alt="customer image"></a>
            </div>
            <div class="media-body align-self-center">
              <a href="profile.html"><h6 class="mt-0 text-dark font-weight-medium">{{ \App\Models\User::where(['id' => $message->sender])->first()->name }}</h6></a>
              <small>{{ \App\Models\User::where(['id' => $message->sender])->first()->email }}</small>
              <br>
              <small>{{ $message->created_at }}</small>
             <p>{{ $message->message }}</p>
              <br>
            @if ($message->image)
                @if ($extension == 'png' or $extension == 'jpg')
                <a href="{{ asset($message->image) }}" target="_blank" class="btn btn-success btn-sm"> <i class="mdi mdi-cloud-download"></i> تحميل الصورة</a>
                @else
                <a href="{{ asset($message->image) }}" target="_blank" class="btn btn-success btn-sm"> <i class="mdi mdi-cloud-download"></i> تحميل الملف</a>
                @endif
              @endif

              
            
            </div>
           
          </div>
        </td>
        <td ></td>
        <td class="text-dark d-none d-md-block">{{ Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</td>
      </tr>
      

    @endforeach

    </tbody>
  </table>
  
  <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="message_status" value="{{ $message_status }}" />

    @if ($message_status == 1)
    <input type="hidden" name="sender" value="{{ $messages[0]->sender }}" />
      
    @else
    <input type="hidden" name="recever" value="{{ $messages[0]->recever }}" />
    @endif
    

  

     
    
    
     <div class="form-group">
         <label for="exampleFormControlTextarea1">نص الرسالة</label>
         <textarea class="form-control" name="message" rows="3"></textarea>
     </div>
     <div class="form-group">
         <label for="exampleFormControlFile1">ارفاق صورة</label>
         <input type="file" name="image" class="form-control-file" >
     </div>
     <div class="form-footer pt-4 pt-5 mt-4 border-top">
      
         <button type="submit" class="btn btn-primary btn-default"><i class="mdi mdi-send"></i> أرسال</button>

         <button type="submit" class="btn btn-secondary btn-default"> <i class="mdi mdi-keyboard-backspace"></i> رجوع</button>
     </div>
 </form>
 
</div>

</div>
</div>
</div>
@endsection