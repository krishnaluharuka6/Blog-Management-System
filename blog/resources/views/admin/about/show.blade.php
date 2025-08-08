@extends('layouts.dashboard')
@section('meta_title', 'About Website')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Create About content
        </div>
        <div class="panel-body">
            <form method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                <label for="title">Website Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $about->title }}" readonly>
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                <label for="image">Select Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" readonly>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                    <label for="contact">Contact</label>
                        <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ $about->contact }}" readonly>
                        @error('contact')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $about->email }}" readonly>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fb_link">Facebook Link</label>
                        <input type="url" name="fb_link" value="{{ $about->fb_link }}" class="form-control @error('fb_link') is-invalid @enderror" readonly>
                        @error('fb_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fb_link">Whatsapp Link</label>
                        <input type="url" name="whatsapp_link" value="{{ $about->whatsapp_link }}" class="form-control @error('whatsapp_link') is-invalid @enderror" readonly>
                        @error('whatsapp_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="viber_link">Viber Link</label>
                        <input type="url" name="viber_link" value="{{ $about->viber_link }}" class="form-control @error('viber_link') is-invalid @enderror" readonly>
                        @error('viber_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="insta_link">Instagram Link</label>
                        <input type="url" name="insta_link" value="{{ $about->insta_link }}" class="form-control @error('insta_link') is-invalid @enderror" readonly>
                        @error('insta_link')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" readonly>{{ $about->content }}</textarea>
                    @error('content')
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
