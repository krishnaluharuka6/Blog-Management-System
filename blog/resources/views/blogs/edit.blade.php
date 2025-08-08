@extends($authUser->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title', $blog->title)
@section('meta_description', $blog->description)
@section('content')
<div class="container p-2">
    <div class="card panel panel-default">
        <div class="panel-heading bg-secondary p-2 mb-2 text-light">
            <p>Edit blog</p>
        </div>
        <div class="row p-2">
            <div class="col-md-9">
            <form action="{{ route('blogs.update',['blog'=>$blog->id]) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $blog->title}}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror">{{ $blog->description }}</textarea>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success text-light" type="submit">Update Blog</button>
                        </div>
                    </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="date">Publish Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date',$blog->published_at->format('Y-m-d')) }}" {{ $blog->isCurrentlyPublished() ? 'readonly' : '' }}>
                    @error('date')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Publish Time</label>
                    <input type="time" name="time" class="form-control @error('time') is-invalid @enderror" value="{{ old('time',$blog->published_at->format('H:i')) }}" {{ $blog->isCurrentlyPublished() ? 'readonly' : '' }}>
                    @error('time')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- <div class="form-group">
                <label>
                    <input type="checkbox" name="is_published" value="1" {{ (old('is_published', $blog->is_published ?? false)) ? 'checked' : '' }}
                    {{ $blog->isCurrentlyPublished() ? 'readonly disabled' : '' }}> Publish
                </label>
                </div> -->

                <div class="form-group">
                      <label for="categories_id[]">Select Categories:</label>
                         @foreach($categories as $category)
                        <div class="form-check ">
                        <input type="checkbox" class="ms-1 form-check-input @error('category_id') is-invalid @enderror" id="category_{{ $category->id }}" name="category_id[]" value="{{ $category->id }}" {{ $blog->categories->contains($category->id) ? 'checked' : '' }} >
                        <span class="ms-4">{{ $category->name }}</span>
                        @endforeach
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                </div>


            </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
