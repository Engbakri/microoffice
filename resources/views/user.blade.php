@extends('layouts.dashboard')

@section('content')

            <div class="row">
              <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                  <div class="card-body">
                    <h2 class="mb-1">{{  $usertasks->count() }}</h2>
                    <p> المهمات</p>
                    <div class="chartjs-wrapper">
                      <canvas id="barChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card card-mini  mb-4">
                  <div class="card-body">
                    <h2 class="mb-1">{{  $waiting->count() }}</h2>
                    <p>في الانتظار</p>
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
                            
                            {{-- <span class="badge badge-primary m-1">{{ $task->users->name }}</span>  --}}
                             
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
             

              <div class="col-xl-6">
                <!-- New Customers -->
                <div class="card card-table-border-none"  data-scroll-height="550">
                  <div class="card-header justify-content-between ">
                    <h2>لوحة الاعلانات</h2>
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
                     
                      @foreach ($ads as $index=>$ads)
                        <tr>
                          <td class="col-md-8">
                            <div class="media">
                              <div class="media-body align-self-center">
                                <h6 class="mt-0 text-dark font-weight-medium"><a class="text-dark" href="{{ route('ads.show',$ads->id) }}">{{ $ads->ads_title }} </a></h6>
                                
                              </div>
                            </div>
                          </td>
                          {{-- <td class="col-md-2"> --}}
                            
                            {{-- <span class="badge badge-primary m-1">{{ $ads->user->name }}</span>  --}}
                             
                          {{-- </td> --}}
                          <td>
                            {{ Carbon\Carbon::parse($ads->created_at)->diffForHumans() }}
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


              {{-- <div class="col-xl-6">
                <!-- New Customers -->
                <div class="card card-table-border-none"  data-scroll-height="550">
                  <div class="card-header justify-content-between ">
                    <h2>بياناتي</h2>
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
                    <div class="card-body text-center">
                      <img class="rounded-circle d-flex mx-auto" src="{{ asset($user->image) }}" alt="user image" width="200" height="200">
                      <h4 class="py-2 text-dark">{{ $user->name }}</h4>
                      <p>{{ $user->email }}</p> <br/>
                      
                  <a class="btn btn-success btn-pill  my-4" href="#">{{ $user->job }}</a>
                  
                  </div>
                  
                  </div>
                  
                </div>
              </div> --}}
            </div>


    
@endsection