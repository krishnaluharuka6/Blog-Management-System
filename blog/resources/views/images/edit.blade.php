@extends($authUser->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title',$image->file_name)
@section('meta_image',asset('storage/'.$image->file_path))
@section('content')
<div class="container">
    <!-- Image Upload Form -->
    <div class="mb-3">
        <h3>Upload Images</h3>
        <form action="{{ route('images.update',['image'=>$image->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="blog_id">Select Blog</label>
                <select name="blog_id" id="blog_id" class="form-control">
                    <option value="">Select Blog</option>
                    @foreach($blogs as $blog)
                    <option value="{{ $blog->id }}" {{ $blog->id == $image->blog_id ? 'selected' : '' }}>
                        {{ $blog->title }}
                    </option>
                    @endforeach
                </select>
                @error('blog_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image Type Selection -->
            <div class="form-group">
                <label for="image_type">Select Image Type</label>
                <select name="image_type" id="image_type" class="form-control">
                <option value="cover" {{ $image->image_type == 'cover' ? 'selected' : '' }}>Cover</option>
                <option value="image1" {{ $image->image_type == 'image1' ? 'selected' : '' }}>Image 1</option>
                </select>
                @error('image_type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                    <label for="image">Select Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    @if($image->file_path)
                    <div class="mb-3">
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/'.$image->file_path) }}" alt="Image Preview" class="img-thumbnail" width="150">
                    </div>
                    @endif
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-2 me-0">
                    <button type="submit" class="btn btn-primary">Edit Image</button>
        </form>
                </div>
                <div class="col-md-2">
                    <form action="{{ route('images.destroy',  ['image'=>$image->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger m-0">Delete</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
@endsection
