@extends($authUser->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title',$meta_title)
@section('content')
 <div class="container">
    <h4 class="text-center mb-4">File Manager</h4>
    <div class="container">
    <div class="row d-flex">
    @foreach ($images as $image)
    <div class="col-md-2 text-center btn btn-light">
        <a href="{{ route('images.show', ['image' => str_replace('/','_', $image)]) }}" class="text-decoration-none ">
            <div class="row d-flex justify-content-center">
                <i class="bi bi-folder-fill text-warning my-0 py-0 " style="font-size: 65px;"></i>
            </div>
                <p class="text-wrap text-center">{{ \Illuminate\Support\Str::limit(basename($image),40) }}</p>
                <p class="text-end !important"><a href="{{ route('images.deleteFolder', ['image' => str_replace('/', '_', $image)]) }}" class="text-danger"><i class="bi bi-trash"></i></a></p>
            </a>
    </div>
    @endforeach
    </div>
    </div>
 </div>
@endsection