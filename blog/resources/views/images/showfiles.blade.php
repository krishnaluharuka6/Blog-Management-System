@extends($authUser->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title',$meta_title)
@section('content')
<h2 class="text-xl font-bold mt-8">Files</h2>
<div class="row">
    @foreach ($images as $image)
    <div class="col-md-2">
        <div class="p-1">
        <form action="{{ route('images.edit',  ['image' => str_replace('/', '_',$image)]) }}" method="POST">
                @csrf
                @method('GET')
            <button type="submit" class="btn btn-light text-light p-2"><img src="{{ asset('storage/'.$image) }}" alt="Image" height="150" width="140">
                <p class="w-100 text-dark">{{ \Illuminate\Support\Str::limit(basename($image),15,'...') }}</p>
            </button>
            </form>  
    </p>
        </div>
        </div>
    @endforeach
</div>
@endsection



