@extends('layouts.dashboard')
@section('css')

@endsection
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
                        <select class="js-example-basic-multiple form-control select2" name="recever[]"  multiple="multiple">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->department->dept_name }}</option>   
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="message_status" value="0" />
                    <div class="form-group" >
                        <label for="exampleFormControlTextarea1">نص الرسالة</label>
                        <textarea class="form-control" name="message" rows="10"  id="editor"></textarea>
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