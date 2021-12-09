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
                  <h3 class="mb-0">Edit Patient Details </h3>
                </div>
              </div>
            </div>
            @if(Session::has('message')) 
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
           @endif
        <form action="{{route('updatePatientRecord')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data['id']}}">
            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label class="form-control-label" for="contact">First Name</label>
                        <div class="input-group input-group-merge input-group-alternative">
                          <input class="form-control" name="firstname" type="text" value="{{$data['firstname']}}">                      
                        </div>
                        @error('firstname') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
                      </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label class="form-control-label" for="contact">Last Name</label>
                        <div class="input-group input-group-merge input-group-alternative">
                          <input class="form-control" name="lastname" type="text" value="{{$data['lastname']}}">                      
                        </div>
                        @error('lastname') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
                      </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label class="form-control-label" for="contact">Contact</label>
                <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control" name="contact" type="text" value="{{$data['contact']}}">                      
                </div>
                @error('contact') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-control-label" for="contact">Address</label>
                <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control" name="address" type="text" value="{{$data['address']}}">                      
                </div>
                @error('address') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label class="form-control-label" for="contact">Age</label>
                        <div class="input-group input-group-merge input-group-alternative">
                          <input class="form-control" name="age" type="text" value="{{$data['age']}}">                      
                        </div>
                        @error('age') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-3">
                        <label class="form-control-label" for="contact">Gender</label>
                        <div class="input-group input-group-merge input-group-alternative">
                          <input class="form-control" name="gender" type="text" value="{{$data['gender']}}">                      
                        </div>
                        @error('gender') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
                      </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label class="form-control-label" for="contact">Email</label>
                <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control" name="email" type="email" value="{{$data['email']}}">                      
                </div>
                @error('email') <p class="text-lead text-danger text-sm">{{$message}}</p> @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-control-label" for="contact">Password</label>
                <div class="input-group input-group-merge input-group-alternative">
                    <input class="form-control" name="password" type="password" value="{{$data['password']}}">
                </div>
                @error('password') <small class="text-lead text-danger">{{$message}}</small> @enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-control-label" for="contact">Confirm Password</label>
                <div class="input-group input-group-merge input-group-alternative">
                    <input id="password-confirm" type="password" class="form-control" value="{{$data['password']}}" name="password_confirmation" required autocomplete="new-password">
                </div>
                @error('password_confirmation') <small class="text-lead text-danger">{{$message}}</small> @enderror
            </div>
               <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4 mb-3">Update</button>
               </div>
           </form>

          </div>
        </div>
      </div>
    </div>

@endsection
