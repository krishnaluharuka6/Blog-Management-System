@extends($authUser->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title', 'Categories')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Create a New Category
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-inverse-danger mb-4"><i class="bi bi-arrow-90deg-left"></i> Back
            </a>
        <div class="panel-body">
            <form action="{{ route('store_category',) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    
                <label for="title">Category Name</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success text-light" type="submit">Create Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
