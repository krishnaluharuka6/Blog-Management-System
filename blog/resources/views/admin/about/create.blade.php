@extends('layouts.admin_dashboard')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Create About content
        </div>
        <div class="panel-body">
            <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}


                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                    @error('content')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                <label for="image">Select Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success text-light" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
