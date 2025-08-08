@extends('layouts.homelayout')
@section('main')
<section class="about spad">
        <div class="container">
            <div class="about__text">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about__pic__item__large">
                            <img src="{{ asset('storage/'.$about->image) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__right__text">
                            {!! $about->content !!}
                            <div class="about__right__text__social">
                                <a href="{{ $website->insta_link }}"><i class="fa fa-instagram"></i></a>
                                <a href="{{ $website->pinterest_link }}"><i class="fa fa-pinterest"></i></a>
                                <a href="{{ $website->fb_link }}"><i class="fa fa-facebook"></i></a>
                                <a href="{{ $website->whatsapp_link }}"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection