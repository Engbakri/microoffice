@extends('layouts.dashboard')
@section('content')
<div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2>الصلاحيات</h2>
    <div>
        @can('role-create')
        <a href="{{ route('roles.create') }}" class="btn btn-primary">إضافة صلاحية</a>
        @endcan
      
    </div>
    </div>
    <div class="card-body pt-0 pb-5">
    <table class="table card-table table-responsive table-responsive-large">
        <thead>
        <tr>
               <th>رقم</th>
               <th>صلاحية</th>
               <th>العمليات</th>
        </tr>
        
             @foreach ($roles as $key => $role)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ __('custom.'.$role->name) }}</td>
                <td class="col-md-3">
                   <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">عرض</a>
                   @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">تعديل</a>
                   @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
              </tr>
             @endforeach
            </table>
        </div>
    </div>


@endsection