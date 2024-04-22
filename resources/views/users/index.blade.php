@extends('layouts.dashboard')
@section('content')
  <div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2>شؤون الموظفين</h2>
    <div>
       <a href="{{ route('users.create') }}" class="btn btn-primary">إضافة موظف</a>
    </div>
    </div>
    <div class="card-body pt-0 pb-5">
    <table class="table card-table table-responsive table-responsive-large ">
      <thead>
        <tr>
               <th>رقم</th>
               <th>الاسم</th>
               <th>الادارة</th>
               <th>التلكيف</th>
               <th>البريد</th>
               <th>الصلاحية</th>
               <th width="280px">العمليات</th>
        </tr>
      
             @foreach ($users as $key => $user)
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->department->dept_name }}</td>
                @if($user->mgr ==1)
                <td>{{ 'مدير ' }} {{ $user->department->dept_name }}</td>
                @elseif ($user->secmgr == 2)
                <td>{{ 'رئيس قسم' }} {{ $user->job }}</td>
                @else
                <td>{{ 'موظف بقسم' }} {{ $user->job }}</td>
                @endif

                <td>{{ $user->email }}</td>
                <td>
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $role)
                       <label class="badge badge-success">{{ __('custom.'. $role ) }}</label>
                    @endforeach
                  @endif
                </td>
                <td>
                   <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">عرض</a>
                   <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">تعديل</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
              </tr>
            
             @endforeach
            </tbody>
            </table>
        </div>
        <div class="card-footer">
          {{ $users->links() }}
        </div>
    </div>

@endsection