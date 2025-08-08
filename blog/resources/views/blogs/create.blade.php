@extends($authUser->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title', 'Create BLOGS')
@section('content')
<div class="container p-2">
    <div class="card panel panel-default">
        <div class="panel-heading bg-secondary p-2 mb-2 text-light">
            <p>Create a new blog</p>
        </div>
        <div class="row p-2">
            <div class="col-md-9">
                <form action="{{ route('blogs.store') }}" method="post">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success text-light" type="submit">Create Blog</button>
                        </div>
                    </div>
            </div>
    
            <div class="col-md-3">
                <div class="form-group">
                    <label for="date">Publish Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date',now()->format('Y-m-d')) }}">
                    @error('date')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Publish Time</label>
                    <input type="time" name="time" class="form-control @error('time') is-invalid @enderror" value="{{ old('time',now()->format('H:i')) }}">
                    @error('time')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- <div class="form-group">
                <label>
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}> Publish Now
                </label>
                </div> -->

                <div class="form-group">
                    <label for="categories_id[]">Select Categories:</label>
                    @foreach($categories as $category)
                        <div class="form-check ">
                        <input type="checkbox" class="ms-1 form-check-input @error('category_id') is-invalid @enderror" id="category_{{ $category->id }}" name="category_id[]" 
                        value="{{ $category->id }}" >
                        <span class="ms-4">{{ $category->name }}</span>
                        </div>
                    @endforeach
                    @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


            </div>
                </form>
        </div>
    </div>
</div>
@endsection
