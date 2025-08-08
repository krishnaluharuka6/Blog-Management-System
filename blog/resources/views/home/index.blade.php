@extends('layouts.homelayout')
@section('page-top-recipe')
    <section class="page-top-recipe">
    <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-2">
                    <div class="pt-recipe-item large-item">
                        <div class="pt-recipe-img set-bg" data-setbg="{{ $main[0]->images()->first() ?asset('storage/'.$main[0]->images()->first()->file_path):asset('favicon.ico') }}">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="pt-recipe-text">
                            <span>{{ $main[0]->published_at->format('F j, Y') }}</span>
                            <h3>{{ $main[0]->title }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 order-lg-1">
                    @foreach($first as $fst)
                    <div class="pt-recipe-item">
                        <div class="pt-recipe-img set-bg" data-setbg="{{ $fst->images()->first() ?asset('storage/'.$fst->images()->first()->file_path):asset('favicon.ico') }}">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="pt-recipe-text">
                            <h4>{{ $fst->title }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-6 order-lg-3">
                    @foreach($second as $sec)
                    <div class="pt-recipe-item">
                        <div class="pt-recipe-img set-bg" data-setbg="{{ $sec->images()->first() ?asset('storage/'.$sec->images()->first()->file_path):asset('favicon.ico') }}">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="pt-recipe-text">
                            <h4>{{ $sec->title }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection



@section('top-recipe')
    <section class="top-recipe spad">
        <div class="section-title">
            <h5>Top Blogs</h5>
        </div>
        <div class="container po-relative">
            <div class="plus-icon">
                <i class="fa fa-moon-o"></i>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="top-recipe-item large-item">
                        <div class="top-recipe-img set-bg" data-setbg="{{ $top_blog->images()->first() ? asset('storage/'.$top_blog->images()->first()->file_path) : asset('blogg.jpeg') }}">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="top-recipe-text">
                             @foreach($top_blog->categories as $cat)
                                <div class="cat-name">{{ $cat->name }}</div>
                             @endforeach
                            <a href="{{ route('singlepost',$top_blog->slug) }}">
                                <h4>{{ $top_blog->title }}</h4>
                            </a>
                            <p>{!! \Illuminate\Support\Str::limit($top_blog->description,150,'...') !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @foreach($top_dishes as $blog)
                    <div class="top-recipe-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="top-recipe-img set-bg" data-setbg="{{ $blog->images()->first() ? asset('storage/'.$blog->images()->first()->file_path) : asset('blogg.jpeg') }}">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="top-recipe-text">
                                    @foreach($blog->categories as $cat)
                                    <div class="cat-name">{{ $cat->name }}</div>
                                    @endforeach
                                    <a href="{{ route('singlepost',$blog->slug) }}">
                                        <h4>{{ $blog->title }}</h4>
                                    </a>
                                    <p>{!! \Illuminate\Support\Str::limit($blog->description,115,'...') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

    @section('categories-filter-section')
    <div class="categories-filter-section spad">
    <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="filter-item">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach ($categories as $category)
                                <li data-filter=".{{ Str::slug($category->name) }}">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="cf-filter" id="category-filter">
                @foreach ($blogs as $blog)
                    @php
                        $categoryClasses = $blog->categories->pluck('name')->map(fn($name) => Str::slug($name))->implode(' ');
                        $image = $blog->images->first();
                    @endphp
                    <div class="cf-item mix all {{ $categoryClasses }}">
                        <div class="cf-item-pic">
                            @if($image)
                                <img src="{{ asset('storage/' . $image->file_path) }}" alt="Blog Image" height="200px">
                            @else
                                <img src="{{ asset('default.jpg') }}" alt="No Image">
                            @endif
                        </div>
                        <div class="cf-item-text">
                            <h5>{{ $blog->title }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection


