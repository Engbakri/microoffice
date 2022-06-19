@extends('layouts.dashboard')
@section('content')




<div class="col-lg-6 col-sm-12 col-xl-4">
    <div class="card card-default" data-scroll-height="575">
        <div class="card-header">
            <h2>بيانات الموظف</h2>
            
        </div>
        <div class="card-body text-center">
            <img class="rounded-circle d-flex mx-auto" src="{{ asset($user->image) }}" alt="user image" width="200" height="200">
            <h4 class="py-2 text-dark">{{ $user->name }}</h4>
            <p>{{ $user->email }}</p>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $role)
                    <a class="btn btn-primary btn-pill  my-4" href="#">{{ __('custom.'. $role) }}</a>
                @endforeach
            @endif
        <a class="btn btn-success btn-pill  my-4" href="#">{{ $user->job }}</a>
        
        </div>
        <div class="card-footer">
            <a class="btn btn-info" href="{{ route('users.index') }}">رجوع</a>
        </div>
        
    </div>
</div>


@endsection