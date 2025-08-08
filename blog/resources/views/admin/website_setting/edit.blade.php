@extends('layouts.admin_dashboard')
@section('meta_title', 'Website Setting')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Edit Website setting
        </div>
        <div class="panel-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('website.updateWebsite') }}">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                <label for="title">Website Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $website->website_title }}">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                <div class="d-flex align-item-center">
                    <div class="w-75">
                    <label for="image">Select Image</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                    </div>
                <img src="{{ asset('storage/'.$website->logo) }}" alt="Logo" class="w-25" height="125px">
                </div>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>


                <div class="form-group">
                    <label for="contact">Contact</label>
                        <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ $website->contact }}">
                        @error('contact')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $website->email }}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fb_link">Facebook Link</label>
                        <input type="url" name="fb_link" value="{{ $website->fb_link }}" class="form-control @error('fb_link') is-invalid @enderror">
                        @error('fb_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fb_link">Whatsapp Link</label>
                        <input type="url" name="whatsapp_link" value="{{ $website->whatsapp_link }}" class="form-control @error('whatsapp_link') is-invalid @enderror">
                        @error('whatsapp_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pinterest_link">pinterest Link</label>
                        <input type="url" name="pinterest_link" value="{{ $website->pinterest_link }}" class="form-control @error('pinterest_link') is-invalid @enderror">
                        @error('pinterest_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="insta_link">Instagram Link</label>
                        <input type="url" name="insta_link" value="{{ $website->insta_link }}" class="form-control @error('insta_link') is-invalid @enderror">
                        @error('insta_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success text-light" type="submit">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
