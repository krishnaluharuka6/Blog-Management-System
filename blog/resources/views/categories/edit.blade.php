@extends($authUser->role === 'admin' ? 'layouts.admin_dashboard' : 'layouts.dashboard')
@section('meta_title', $category->name)
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Edit Category
        </div>
        <div class="panel-body">
            <form action="{{ route('categories.update',['id'=>$category->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    
                <label for="title">Category Name</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $category->name }}">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success text-light" type="submit">Update Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
