@extends('layouts.dashboard')

@section('content')

            <div class="row">
              <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                  <div class="card-body">
                    <h2 class="mb-1">{{ $allusers->count() }}</h2>
                    <p> الموظفين</p>
                    <div class="chartjs-wrapper">
                      <canvas id="barChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card card-mini  mb-4">
                  <div class="card-body">
                    <h2 class="mb-1">{{  $tasks->count() }}</h2>
                    <p>المهمات</p>
                    <div class="chartjs-wrapper">
                      <canvas id="dual-line"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                  <div class="card-body">
                    <h2 class="mb-1">{{ $done->count() }}</h2>
                    <p>تم إنجازها</p>
                    <div class="chartjs-wrapper">
                      <canvas id="area-chart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                  <div class="card-body">
                    <h2 class="mb-1">{{ $working->count() }}</h2>
                    <p>تحت التنفيذ</p>
                    <div class="chartjs-wrapper">
                      <canvas id="line"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

            <div class="row">
              <div class="col-xl-6">
                <!-- New Customers -->
                <div class="card card-table-border-none"  data-scroll-height="550">
                  <div class="card-header justify-content-between ">
                    <h2>الموظفين</h2>
                    <div>
                        <a href="{{ url('/') }}" class="text-black-50 mr-2 font-size-20">
                          <i class="mdi mdi-cached"></i>
                        </a>
                        <div class="dropdown show d-inline-block widget-dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-customar"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-customar">
                              <li class="dropdown-item"><a  href="{{ route('users.index') }}">عرض الكل</a></li>
                              <li class="dropdown-item"><a  href="{{ route('users.create') }}">إضافة موظف</a></li>
                            </ul>
                          </div>
                    </div>
                  </div>
                  <div class="card-body pt-0">
                    <table class="table ">
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                          <td >
                            <div class="media">
                              <div class="media-image mr-3 rounded-circle">
                                <a href="profile.html"><img class="rounded-circle w-45" src="{{ asset($user->image) }}" alt="customer image"></a>
                              </div>
                              <div class="media-body align-self-center">
                                <a href="profile.html"><h6 class="mt-0 text-dark font-weight-medium">{{ $user->name }}</h6></a>
                                <small>{{ $user->email }}</small> <br/>
                                <small>{{ $user->job }}</small>
                              </div>
                            </div>
                          </td>
                         
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                     {{  $users->links() }}
                  </div>
                </div>
              </div>

              <div class="col-xl-6">
                <!-- New Customers -->
                <div class="card card-table-border-none"  data-scroll-height="550">
                  <div class="card-header justify-content-between ">
                    <h2>المهمات</h2>
                    <div>
                        <a href="{{ url('/') }}" class="text-black-50 mr-2 font-size-20">
                          <i class="mdi mdi-cached"></i>
                        </a>
                        <div class="dropdown show d-inline-block widget-dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-customar"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-customar">
                              <li class="dropdown-item"><a  href="{{ route('tasks.index') }}">عرض الكل</a></li>
                              <li class="dropdown-item"><a  href="{{ route('tasks.create') }}">إضافة مهمة</a></li>
                            </ul>
                          </div>
                    </div>
                  </div>
                  <div class="card-body pt-0">
                    <table class="table ">
                     
                      @foreach ($tasks as $index=>$task)
                        <tr>
                          <td >
                            <div class="media">
                              <div class="media-body align-self-center">
                                <h6 class="mt-0 text-dark font-weight-medium"><a class="text-dark" href="{{ route('employees.show',$task->id) }}">{{ $task->task }} </a></h6>
                                
                              </div>
                            </div>
                          </td>
                          <td class="col-md-2">
                            @foreach ($task->users as $employee)
                            <span class="badge badge-primary m-1">{{ $employee->name }}</span> 
                             @endforeach
                          </td>
                          <td  class="col-md-2">
                            @foreach ($status as $emptask)
                            @if ($emptask->task_id === $task->id ) 
                              <span class="badge 
                                      @if ($emptask->status === 'Wainting') badge-secondary 
                                      @elseif ($emptask->status === 'Working') badge-primary
                                      @elseif ($emptask->status === 'Done') badge-success
                                      @else  badge-danger 
                                      @endif m-1 ">{{ __('custom.'.$emptask->status) }}
                              </span> 
                            @endif   
                            @endforeach
                          </td>
                         
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                     
                  </div>
                </div>
              </div>
            </div>


    
@endsection