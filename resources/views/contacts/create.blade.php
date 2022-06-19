@extends('layouts.dashboard')

@section('content')

<div class="row">

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>إرسال رسالة</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect12">إرسال الي :</label>
                        <select class="form-control" name="recever">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>   
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">نص الرسالة</label>
                        <textarea class="form-control" name="message" rows="3"></textarea>
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