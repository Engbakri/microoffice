@extends('layouts.dashboard')
@section('content')
<div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2>عرض بيانات الصلاحية</h2>
    <div>
      
        <a href="{{ route('roles.index') }}" class="btn btn-primary"> الصلاحيات</a>
        
      
    </div>
    </div>
    <div class="card-body pt-0 pb-5">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>إسم الصلاحية:</strong>
                <strong>{{ __('custom.'.$role->name) }}</strong>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الفرعية:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $permission)
                        <label class="label label-success">{{ $permission->name }},</label>
                    @endforeach
                @endif
            </div>
        </div>


    </div>
</div>
</div>
@endsection