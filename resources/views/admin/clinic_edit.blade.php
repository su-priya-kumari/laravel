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
                  <h3 class="mb-0">Edit Clinic Details </h3>
                </div>
              </div>
            </div>
            @if(Session::has('message')) 
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
           @endif
        <form action="{{route('updateClinicRecord')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data['id']}}">
               <div class="form-group mb-3 mt-3">
                   <label class="form-control-label" for="clinic_name">Clinic Name</label>
                   <input type="text" name="clinic_name" class="form-control form-control-alternative" value="{{$data['clinic_name']}}">
                   @error('clinic_name') <small class="text-lead text-danger">{{$message}}</small> @enderror
               </div>
               <div class="form-group mb-3">
                   <label class="form-control-label" for="address">Address</label>
                   <input type="text" name="address" class="form-control form-control-alternative" value="{{$data['address']}}">
                   @error('address') <small class="text-lead text-danger">{{$message}}</small> @enderror
               </div>
               <div class="row">
                 <div class="col-lg-4">
                  <div class="form-group mb-3">
                    <label class="form-control-label" for="state">State</label>
                    <input type="text" name="state" class="form-control form-control-alternative" value="{{$data['state']}}">
                    @error('state') <small class="text-lead text-danger">{{$message}}</small> @enderror
                </div>
                 </div>
                 <div class="col-lg-4">
                  <div class="form-group mb-3">
                    <label class="form-control-label" for="country">Country</label>
                    <input type="text" name="country" class="form-control form-control-alternative" value="{{$data['country']}}">
                    @error('country') <small class="text-lead text-danger">{{$message}}</small> @enderror
                </div>
                 </div>
                 <div class="col-lg-4">
                  <div class="form-group mb-3">
                    <label class="form-control-label" for="contact">Contact</label>
                    <input type="text" name="contact" class="form-control form-control-alternative" value="{{$data['contact']}}">
                    @error('contact') <small class="text-lead text-danger">{{$message}}</small> @enderror
                </div>
                 </div>
               </div>
               <div class="form-group mb-3">
                   <label class="form-control-label" for="specialization">Specialization</label>
                   <input type="text" name="specialization" class="form-control form-control-alternative" value="{{$data['specialization']}}">
                   @error('specialization') <small class="text-lead text-danger">{{$message}}</small> @enderror
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
