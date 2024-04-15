@extends('layouts.dashboard')
@section('content')
<div class="card card-table-border-none" id="recent-orders">
    <div class="card-header justify-content-between">
    <h2>المهام</h2>
    <div>
       <a href="{{ route('tasks.create') }}" class="btn btn-primary">إضافة مهام</a>
    </div>
    </div>
    <div class="card-body pt-0 pb-5">
    <table class="table card-table table-responsive">
        <thead>
        <tr>
            <th class="text-center">رقم</th>
            <th>المهمة</th>
            <th class="text-center">التكليف</th>
            <th class="text-center"><badge class="badge badge-primary d-md-block">ساعة</badge></th>
            <th class="text-center"><badge class="badge badge-success">يوم</badge></th>
            <th class="text-center"><badge class="badge badge-info">اسبوع</badge></th>
            <th class="text-center"><badge class="badge badge-dark">شهر</badge></th>
            <th class="text-center">الموظف</th>
            <th class="text-center">الحالة</th>
            <th class="text-center">حالة الموظف</th>
        </tr>
       
        @foreach ($tasks as $index=>$task)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td><a class="text-dark" href="{{ route('employees.show',$task->id) }}">{{ $task->task }} </a></td>
            <td>{{ Carbon\Carbon::parse($task->created_at)->diffForHumans() }}</td>
            <td class="text-center"><badge class="badge badge-primary">{{ $task->time_hour }}</badge> </td>
            <td class="text-center"><badge class="badge badge-success">{{ $task->time_day }}</badge> </td>
            <td class="text-center"><badge class="badge badge-info">{{ $task->time_week }}</badge> </td>
            <td class="text-center"><badge class="badge badge-dark">{{ $task->time_month }}</badge> </td>
            <td class="text-center col-md-1">
                @foreach ($task->users as $employee)
                    <span class="badge badge-primary m-1">{{ $employee->name }}</span> 
                @endforeach
            </td>
            <td class="col-md-1">
                @foreach ($status as $emptask)
                    @if ($emptask->task_id === $task->id ) 
                    <span class="badge 
                            @if ($emptask->status === 'Wainting') badge-secondary 
                            @elseif ($emptask->status === 'Working') badge-primary
                            @elseif ($emptask->status === 'Done') badge-success
                            @else  badge-danger 
                            @endif m-1">{{ __('custom.'.$emptask->status) }}
                    </span> 
                    @endif   
                @endforeach
            </td>
            <td class="col-md-3"> 
            
                <form action="{{ route('employees.update',$task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" class="form-control empstatus">
                        <option value="">تحديث</option>
                        <option value="Wainting">تفعيل</option>
                        <option value="Canceled">إلغاء</option>
                    </select>
                    <button class="btn btn-success" type="submit">تحديث</button>
                </form>
            
            </td>
            <td class="text-right">
                <div class="dropdown show d-inline-block widget-dropdown">
                  <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order5" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" data-display="static"></a>
                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order5">
                    <li class="dropdown-item">
                        <a class="btn btn-info" href="{{ route('tasks.edit',$task->id) }}" style="color: white">تعديل</a>
                    </li>
                    <li class="dropdown-item">
                        <li class="dropdown-item">
                            <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('task.delete', $task->id) }}" title="حذف المهمة">
                              <i class="btn btn-danger">حذف</i>
                          </a>
                        </li>
                    </li>
                  </ul>
                </div>
            </td>
        </tr>
        
        @endforeach
       
    </tbody>
    </table>
</div>
<div class="card-footer">
    {{ $tasks->links() }}
</div>
</div>



  <!-- small modal -->
  <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection