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
                  <h3 class="mb-0">Add New Doctor</h3>
                </div>
              </div>
            </div>
            
            @if(Session::has('message')) 
            <div class="alert alert-primary" role="alert">{{Session::get('message')}}</div>
            @endif  
            <form method="POST" action="{{route('doctor.add')}}">
                @csrf
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="col mb-3">
                            <label for="firstname" class=" form-control-label ">{{ __('First Name') }}</label>
                            <input id="firstname" type="text" class="form-control form-control-alternative" name="firstname" value="{{ old('firstname') }}">
                            @error('firstname')
                                <small class="text-lead text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                   <div class="col-6">
                        <div class="col mb-3">
                            <label for="lastname" class=" form-control-label ">{{ __('Last Name') }}</label>
                            <input id="lastname" type="text" class="form-control form-control-alternative" name="lastname" value="{{ old('lastname') }}">
                            @error('lastname')
                                <small class="text-lead text-danger">{{$message}}</small>
                            @enderror
                        </div>
                   </div>
                </div>

                <div class="col mb-3">
                    <label for="gender" class="form-control-label">{{ __('Gender') }}</label>
                    <input id="gender" type="text" class="form-control form-control-alternative" name="gender" value="{{ old('gender') }}">
                    @error('gender')
                        <small class="text-lead text-danger">{{$message}}</small>
                    @enderror                    
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="col mb-3">
                            <label for="specialist" class="form-control-label">{{ __('Specialist') }}</label>
                            <input id="specialist" type="text" class="form-control form-control-alternative" name="specialist" value="{{ old('specialist') }}">
                            @error('specialist')
                                <small class="text-lead text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col mb-3">
                            <label for="contact" class="form-control-label">{{ __('Clinic Name') }}</label>
                            <select type="" name="clinic_id" class="form-control form-control-alternative" value="{{old('clinic_name')}}">
                                <option selected disabled value="">Select Clinic Name</option>           
                                 @foreach ($c_data as $clinic)
                                <option value="{{$clinic->id}}" >{{$clinic->clinic_name}}</option>
                                @endforeach
                            </select>
                            @error('clinic_id')
                                <small class="text-lead text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="col mb-3">
                            <label for="experience" class="form-control-label">{{ __('Experience') }}</label>
                            <input id="experience" type="text" class="form-control form-control-alternative" name="experience" value="{{ old('experience') }}">
                            @error('experience')
                                <small class="text-lead text-danger">{{$message}}</small>
                            @enderror                    
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col mb-3">
                            <label for="treatment" class="form-control-label">{{ __('Treatment') }}</label>
                            <input id="treatment" type="text" class="form-control form-control-alternative" name="treatment" value="{{ old('treatment') }}">
                            @error('treatment')
                                <small class="text-lead text-danger">{{$message}}</small>
                            @enderror                    
                        </div>
                    </div>
                </div>

                <div class="col mb-3">
                    <label for="designation" class="form-control-label">{{ __('Designation') }}</label>
                    <input id="designation" type="text" class="form-control form-control-alternative" name="designation" value="{{ old('designation') }}">
                    @error('designation')
                        <small class="text-lead text-danger">{{$message}}</small>
                    @enderror                    
                </div>

                <div class="col mb-3">
                    <label for="email" class="form-control-label">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control form-control-alternative" name="email" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-lead text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="col mb-3">
                            <label for="password" class="form-control-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control form-control-alternative" name="password"  value="{{ old('password') }}">
                            @error('password')
                                <small class="text-lead text-danger">{{$message}}</small>
                            @enderror                    
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col mb-3">
                            <label for="password-confirm" class="form-control-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control form-control-alternative" name="password_confirmation" value="{{ old('password') }}"> 
                            @error('password_confirmation') <small class="text-lead text-danger">{{$message}}</small> @enderror                                      
                        </div>
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