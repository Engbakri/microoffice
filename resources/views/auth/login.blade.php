@extends('layouts.root')

@section('content')
<div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand" >
                <a href="https://www.iassksa.com/iass/ar/" style="text-align: center">
                  <span class="brand-name"  style="font-size: 50%"ظام الاحتياجات والمراسلات  </span>
                </a>
              </div>
            </div>
            <div class="card-body p-5">
              @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
              @endif

              <h5 class="text-dark mb-5" style="text-align: center">تسجيل الدخول</h5>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input  name="email" :value="old('email')" required autofocus type="email" class="form-control input-lg" id="email" aria-describedby="emailHelp" placeholder="البريد الالكتروني">
                  </div>
                  <div class="form-group col-md-12 ">
                    <input type="password" class="form-control input-lg" id="password" placeholder="كلمة المرور" name="password" required autocomplete="current-password">
                  </div>
                  <div class="col-md-12">
                    <div class="d-flex my-2 justify-content-between">
                      <div class="d-inline-block mr-3">
                        <label class="control control-checkbox">ذكرني
                          <input type="checkbox" />
                          <div class="control-indicator"></div>
                        </label>
                
                      </div>
                      @if (Route::has('password.request'))
                        <p><a class="text-blue" href="{{ route('password.request') }}">هل نسيت كلمة المرور ؟</a></p>
                     @endif
                      
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">تسجيل الدخول</button>
                    
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
