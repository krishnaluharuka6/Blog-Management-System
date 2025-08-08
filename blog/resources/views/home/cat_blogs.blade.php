@extends('layouts.homelayout')
@section('main')
<section class="recipe-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="row">
                        @foreach($blogss as $blog)
                        <div class="col-lg-6 col-sm-6">
                            <div class="categories__post__item">
                                <div class="categories__post__item__pic smaller__large set-bg"
                                    data-setbg="{{ $blog->images()->first() ?asset('storage/'.$blog->images()->first()->file_path):asset('blogg.jpeg') }}">
                                    <div class="post__meta">
                                        <h4>{{ $blog->published_at->format('d') }}</h4>
                                        <span>{{ $blog->published_at->format('M') }}</span>
                                    </div>
                                </div>
                                <div class="categories__post__item__text">
                                    <!-- <span class="post__label">Dinner</span> -->
                                    <h3><b><a href="{{ route('singlepost',$blog->slug) }}">{{ $blog->title }}</a></b></h3>
                                    <ul class="post__widget">
                                        <li>by <span>{{ $blog->user->name }}</span></li>
                                        <li>{{ $blog->getReadingTimeAttribute() }}</li>
                                        <li>20 Comment</li>
                                    </ul>
                                    <p>{!! \Illuminate\Support\Str::limit($blog->description,115,'...') !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="sidebar__item">
                        <div class="sidebar__about__item">
                            <div class="card p-3 text-center border border-0">
                                <div class="card-title mb-2 m-auto ">
                                    <img 
                                        src="{{ App\Models\User::where('role','admin')->first() 
                                            ? asset('storage/' . App\Models\User::where('role','admin')->first()->image) 
                                            : asset('person.jpeg') }}" 
                                        alt="Admin Image" 
                                        class="rounded-circle mx-auto d-block" 
                                        style="width: 150px; height: 150px;">
                                </div>
                                <div class="card border border-0">
                                    <div class="card-body">
                                        @php
                                            $abt=\Illuminate\Support\Str::words($about->content,40,'...');
                                        @endphp
                                        <p class="text-muted">{!! $abt !!}</p>
                                        <a href="{{ route('about_page') }}" class="site-btn bg-darkmt-2">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__follow__item">
                            <div class="sidebar__item__title">
                                <h6>Follow me</h6>
                            </div>
                            <div class="sidebar__item__follow__links">
                                <a href="{{ $website->insta_link }}"><i class="fa fa-instagram"></i></a>
                                <a href="{{ $website->pinterest_link }}"><i class="fa fa-pinterest"></i></a>
                                <a href="{{ $website->fb_link }}"><i class="fa fa-facebook"></i></a>
                                <a href="{{ $website->whatsapp_link }}"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <div class="sidebar__item__categories">
                            <div class="sidebar__item__title">
                                <h6>Categories</h6>
                            </div>
                            <ul>
                                @foreach($categories as $cat)
                                <li><a href="{{ route('cat_blog',$cat->slug) }}">{{ $cat->name }}<span>{{ $cat->blogs()->count() }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recipe-pagination">
                        <a href="#" class="active">01</a>
                        <a href="#">02</a>
                        <a href="#">03</a>
                        <a href="#">04</a>
                        <a href="#">Next</a>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection