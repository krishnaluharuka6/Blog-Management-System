@extends('layouts.admin_dashboard')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            About content
        </div>
        <div class="panel-body">
            <form action="{{ route('about.updateAbout') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror">{{ old('content',$about->content) }}</textarea>
                    @error('content')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                <div class="d-flex align-item-center">
                    <div class="w-75">
                    <label for="image">Select Image</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                    </div>
                <img src="{{ asset('storage/'.$about->image) }}" alt="image" class="w-25" height="125px">
                </div>
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
