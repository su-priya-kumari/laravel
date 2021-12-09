


@extends('admin.adminbase')
@section('content')    
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Form</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card pl-5 pr-5">
            <!-- Card header -->
            <div class="card-header border-3 ">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Add New Admin</h3>
                </div>
              </div>
            </div>
            
            @if(Session::has('message')) 
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif  
            <form method="POST" action="{{url('admin/add/admin')}}">
                @csrf
                <div class="form-group row mt-3">
                    <div class="col mb-3">
                        <label for="firstname" class=" form-control-label ">{{ __('First Name') }}</label>
                        <input id="firstname" type="text" class="form-control form-control-alternative" name="firstname" value="{{ old('firstname') }}">
                        @error('firstname')
                          <p class="text-lead text-danger text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="lastname" class=" form-control-label ">{{ __('Last Name') }}</label>
                        <input id="lastname" type="text" class="form-control form-control-alternative" name="lastname" value="{{ old('lastname') }}">
                        @error('lastname')
                            <p class="text-lead text-danger text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col mb-3">
                        <label for="email" class=" form-control-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control form-control-alternative" name="email" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-lead text-danger text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6  mb-3">
                        <label for="password" class=" form-control-label ">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control form-control-alternative" name="password">
                        @error('password')
                            <p class="text-lead text-danger text-sm">{{$message}}</p>
                        @enderror
                    </div>                 
                    <div class="col-md-6  mb-3">
                        <label for="password-confirm" class="form-control-label ">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control form-control-alternative" name="password_confirmation">
                        @error('password_confirmation')
                            <p class="text-lead text-danger text-sm">{{$message}}</p>
                        @enderror
                    </div>                        
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4 mb-3">Add</button>
                </div>
            </form>                            

          </div>
        </div>
      </div>
    </div>

@endsection


