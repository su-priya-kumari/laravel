@extends('admin.adminbase')
@section('content')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tables</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-plus text-blue"></i>  Add New</a>
              <a href="#" class="btn btn-sm btn-neutral"><i class="fas fa-sort-amount-up text-blue"></i>  Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            @if(Session::has('message')) 
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <span class="alert-icon"><i class="ni ni-like-2"></i></span>
              <span class="alert-text">{{Session::get('message')}}</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            <div class="card-header border-0">
              <h3 class="mb-0">All Patient Records</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Id</th>
                    <th scope="col" class="sort" data-sort="name">firstname</th>
                    <th scope="col" class="sort" data-sort="budget">lastname</th>
                    <th scope="col" class="sort" data-sort="status">email</th>
                    <th scope="col" class="sort" data-sort="status">contact</th>
                    <th scope="col" class="sort" data-sort="status">address</th>
                    <th scope="col" class="sort" data-sort="status">age</th>
                    <th scope="col" class="sort" data-sort="status">gender</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @foreach ($records as $record)
                <tbody>
                  <tr>
                    <td>{{$record->id}}</td>
                    <td>{{$record->firstname}}</td>
                    <td>{{$record->lastname}}</td>
                    <td>{{$record->email}}</td>
                    <td>{{$record->contact}}</td>
                    <td>{{$record->address}}</td>
                    <td>{{$record->age}}</td>
                    <td>{{$record->gender}}</td>
                      <td>
                          <a href={{"edit/".$record['id']}} class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                          <a href={{"delete/".$record['id']}} class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
                      </td>
                  </tr>
              </tbody>
              @endforeach                                
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>

@endsection