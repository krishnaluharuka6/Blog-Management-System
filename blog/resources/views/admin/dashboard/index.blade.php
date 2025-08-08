@extends('layouts.admin_dashboard')
@section('content')
<!-- <div class="row">
<div class="col-sm-4 mb-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div><div class="col-sm-4 mb-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div><div class="col-sm-4 mb-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div><div class="col-sm-4 mb-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div><div class="col-sm-4 mb-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div><div class="col-sm-4 mb-2">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div> -->
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                  <h6 class="font-weight-normal mb-0">{{ now()->format('h:i A') }}</span></h6>
                </div>
                <!-- <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-people p-0">
                  <img src="{{ asset('storage/uploads/nepal.jpg') }}" alt="people" width="100%" height="300px">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <!-- <h4 class="mb-0 font-weight-normal"><i class="icon-clock mr-2"></i>{{ now()->format('d, M') }}</h4> -->
                      </div>
                      <div class="ml-2">
                      <h4 class="mb-2 font-weight-normal"><i class="icon-clock mr-2"></i>{{ now()->format('d, M') }}</h4>
                        <!-- <h4 class="location font-weight-normal">{{ $response['city'] }},{{ $response['country'] }}</h4> -->
                        <h6 class="font-weight-normal">{{ $response['city'] }},{{ $response['country'] }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">No. of Blogs</p>
                      <p class="fs-30 mb-2">{{ App\Models\Blog::all()->count() }}</p>
                      <p></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">No. of Categories</p>
                      <p class="fs-30 mb-2">{{ App\Models\Category::all()->count() }}</p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">No. of Images</p>
                      <p class="fs-30 mb-2">{{ App\Models\Image::all()->count() }}</p>
                      <p></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">No. of Comment</p>
                      <p class="fs-30 mb-2">{{ App\Models\Comment::all()->count() }}</p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection
