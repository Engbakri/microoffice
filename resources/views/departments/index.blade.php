@extends('layouts.dashboard')
@section('content')
<div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2>الادارات</h2>
    <div>
        <a href="{{ route('departments.create') }}" class="btn btn-primary">إضافة ادارة</a>
    </div>
    </div>
    <div class="card-body pt-0 pb-5">
    <table class="table card-table table-responsive table-responsive-large">
        <thead>
        <tr>
               <th>رقم</th>
               <th>الاسم</th>
            
               <th></th>
        </tr>
        
             @foreach ($departments as $key => $department)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $department->dept_name }}</td>
                <td class="text-right">
                   
                   <a class="btn btn-info" href="{{ route('departments.edit',$department->id) }}">تعديل</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['departments.destroy', $department->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
              </tr>
             @endforeach
            </table>
        </div>
    </div>


@endsection