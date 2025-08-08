@extends('layouts.admin_dashboard')
@section('meta_title', 'Website Setting')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Website Setting 
        </div>
        <div class="panel-body">
            <form action="{{ route('website.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                <label for="title">Website Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                <label for="image">Select Logo</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                    <label for="contact">Contact</label>
                        <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}">
                        @error('contact')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fb_link">Facebook Link</label>
                        <input type="url" name="fb_link" value="{{ old('fb_link') }}" class="form-control @error('fb_link') is-invalid @enderror">
                        @error('fb_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fb_link">Whatsapp Link</label>
                        <input type="url" name="whatsapp_link" value="{{ old('whatsapp_link') }}" class="form-control @error('whatsapp_link') is-invalid @enderror">
                        @error('whatsapp_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pinterest_link">pinterest Link</label>
                        <input type="url" name="pinterest_link" value="{{ old('pinterest_link') }}" class="form-control @error('pinterest_link') is-invalid @enderror">
                        @error('pinterest_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="insta_link">Instagram Link</label>
                        <input type="url" name="insta_link" value="{{ old('insta_link') }}" class="form-control @error('insta_link') is-invalid @enderror">
                        @error('insta_link')
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
