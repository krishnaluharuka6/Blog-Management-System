@extends('layouts.homelayout')
@section('main')
<section class="single-post spad">
        <div class="single-post__hero set-bg" data-setbg="{{ $blog->images()->first() ?asset('storage/'.$blog->images()->first()->file_path):asset('blogg.jpeg') }}"></div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="single-post__title">
                        <div class="single-post__title__meta">
                            <h2>{{ $blog->published_at->format('d') }}</h2>
                            <span>{{ $blog->published_at->format('M') }}</span>
                        </div>
                        <div class="single-post__title__text">
                            <ul class="label">
                                @foreach($blog->categories as $cat)
                                <li>{{ $cat->name }}</li>
                                @endforeach
                            </ul>
                            <h4>{{ $blog->title }}</h4>
                            <ul class="widget">
                                <li>by {{ $blog->user->name }}</li>
                                <li>{{ $blog->getReadingTimeAttribute() }}</li>
                                <li>{{ $blog->comments->count() }}  Comment</li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-post__social__item">
                        @php
                            $url = urlencode(request()->fullUrl());
                            $title = urlencode($blog->title);
                            $image = $blog->images()->first() ? urlencode(asset('storage/'.$blog->images()->first()->file_path)) : urlencode(asset('blogg.jpeg'));
                        @endphp
                        <ul>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://api.whatsapp.com/send?text={{ $title }}%20{{ $url }}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                            <!-- <li><a href="{{ $website->insta_link }}"><i class="fa fa-instagram"></i></a></li> -->
                            <li><a href="https://www.pinterest.com/pin/create/button/?url={{ $url }}&media={{ $image }}&description={{ $title }}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                    <div class="single-post__top__text">
                        <p>{!! $blog->description !!}</p>
                    </div>
                    <!-- <div class="single-post__recipe__details">
                        <div class="single-post__recipe__details__option">
                            <ul>
                                <li>
                                    <h5><i class="fa fa-user-o"></i> SERVES</h5>
                                    <span>2 as a main, 4 as a side</span>
                                </li>
                                <li>
                                    <h5><i class="fa fa-clock-o"></i> PREP TIME</h5>
                                    <span>15 minute</span>
                                </li>
                                <li>
                                    <h5><i class="fa fa-clock-o"></i> Cook TIME</h5>
                                    <span>15 minute</span>
                                </li>
                                <li><a href="#" class="primary-btn"><i class="fa fa-print"></i> Read more</a></li>
                            </ul>
                        </div>
                        <div class="single-post__recipe__details__indegradients">
                            <h5>Ingredients</h5>
                            <ul>
                                <li>Ingredients</li>
                                <li>1 cup (240 ml) water, plus more as needed</li>
                                <li>1 teaspoon fine sea salt</li>
                                <li>2 tablespoons olive oil</li>
                                <li>3/4 cup (120 g) fine polenta</li>
                                <li>3 cups sunflower oil, plus more as needed</li>
                                <li>7 ounces (200 g) peeled parsnips, very thinly sliced on a mandoline</li>
                                <li>1 pinch fine sea salt, plus more to taste</li>
                                <li>2 tablespoons (30 g) unsalted butter</li>
                                <li>1/2 tablespoon maple syrup (up to 1 tablespoon as needed)</li>
                            </ul>
                        </div>
                        <div class="single-post__recipe__details__direction">
                            <h5>Directions</h5>
                            <ul>
                                <li><span>1.</span> Combine all of the ingredients, kneading to form a smooth dough.
                                </li>
                                <li><span>2.</span> Allow the dough to rise, in a lightly greased, covered bowl, until
                                    it’s doubled in size, about 90 minutes.</li>
                                <li><span>3.</span> Gently divide the dough in half; it’ll deflate somewhat.</li>
                                <li><span>4.</span> Gently shape the dough into two oval loaves; or, for longer loaves,
                                    two 10″ to 11″ logs. Place the loaves on a lightly greased or parchment-lined baking
                                    sheet. Cover and let rise until very puffy, about 1 hour. Towards the</li>
                                <li><span>5.</span> end of the rising time, preheat the oven to 425°F.</li>
                                <li><span>6.</span> Spray the loaves with lukewarm water.</li>
                                <li><span>7.</span> Make two fairly deep diagonal slashes in each; a serrated bread
                                    knife, wielded firmly, works well here.</li>
                                <li><span>8.</span> Bake the bread for 25 to 30 minutes, until it’s a very deep golden
                                    brown. Remove it from the oven, and cool on a rack.</li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- <div class="single-post__middle__text">
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in. .
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
                    </div> -->
                    <!-- <div class="single-post__quote">
                        <p>The whole family of tiny legumes, whether red, green, yellow, or black, offers so many
                            possibilities to create an exciting lunch.</p>
                        <span>MEIKE PETERS</span>
                    </div> -->
                    <!-- <div class="single-post__desc">
                        <p>laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat.</p>
                        <h4>You Can Buy For Less Than A College Degree</h4>
                        <p>Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia </p>
                    </div> -->
                    <!-- <div class="single-post__more__details">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <img src="img/categories/single-post/single-post-desc.jpg" alt="">
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <p>Vestibulum commodo nulla eu augue tincidunt rutrum. Suspendisse interdum lacus in
                                    ligula finibus luctus. Vivamus mollis libero vel orci finibus, sit amet malesuada
                                    lectus aliquam. In auctor viverra eros. Maecenas elit mi, dictum et consectetur nec,
                                    sollicitudin sed arcu.</p>
                                <p>Curabitur tempor tempor pharetra.Sed imperdiet sem at nunc luctus, sed cursus nulla
                                    mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur
                                    ridiculus mus porta tincidunt, purus enim laoreet.</p>
                                <p>Duis aute irure dolor inenim ad minim veniam, quis nostrud exercitation ullamco
                                    laboris nisi ut aliquip ex ea commodo conslaboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="single-post__last__text">
                        <p>Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae
                            vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                            aut fugit. Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt
                            tempora incidunt ut labore quia non numquam eius modi.</p>
                        <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                            Mauris vel magna ex. Integer gravida tincidunt accumsan. Vestibulum nulla mauris,
                            condimentum id felis ac, volutpat volutpat mi. In vitae tempor velit of the impenetrable
                            foliage quisquam est, qui dolorem ipsum quia dolor sit amet consectetur adipisci.</p>
                    </div> -->
                    <div class="single-post__tags">
                        @foreach($blog->categories as $cat)
                        <a href="{{ route('cat_blog',$cat->slug) }}">{{ $cat->name }}</a>
                        @endforeach
                    </div>
                    <div class="single-post__next__previous">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @if($previous)
                                <a href="{{ route('singlepost',$previous->slug ) }}" class="single-post__previous">
                                    <h6><span class="arrow_carrot-left"></span> Previous posts</h6>
                                    <div class="single-post__previous__meta">
                                        <h4>{{ $previous->published_at->format('d') }}</h4>
                                        <span>{{ $previous->published_at->format('M') }}</span>
                                    </div>
                                    <div class="single-post__previous__text">
                                        <span>{{ $previous->categories->first()->name }}</span>
                                        <h5 class="text-wrap">{{ \Illuminate\Support\Str::limit($previous->title, 50, ) }}</h5>
                                    </div>
                                </a>
                                 @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @if($next)
                                <a href="{{ route('singlepost',$next->slug) }}" class="single-post__next">
                                    <h6>Next posts <span class="arrow_carrot-right"></span> </h6>
                                    <div class="single-post__next__meta">
                                        <h4>{{ $next->published_at->format('d') }}</h4>
                                        <span>{{ $next->published_at->format('M') }}</span>
                                    </div>
                                    <div class="single-post__next__text">
                                        <span>{{ $next->categories->first()->name }}</span>
                                        <h5>{{ \Illuminate\Support\Str::limit($next->title, 50, ) }}</h5>
                                    </div>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="single-post__author__profile">
                        <div class="single-post__author__profile__pic">
                            <img src="{{ $blog->user->image ? asset('storage/'.$blog->user->image) : asset('person.jpeg') }} " alt="">
                        </div>
                        <div class="single-post__author__profile__text">
                            <h4>{{ $blog->user->name }}</h4>
                            <p>{{ $blog->user->bio }}</p>
                            <!-- <div class="single-post__author__profile__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div> -->
                        </div>
                    </div>
                    <div class="single-post__comment">
                        <div class="widget__title">
                            <h4>Comment</h4>
                        </div>
                        @foreach($blog->comments as $comment)
                        <div class="single-post__comment__item">
                            <div class="single-post__comment__item__pic">
                                <img src="{{ $comment->user->image ? asset('storage/'.$comment->user->image) :asset('person.jpeg') }}" alt="">
                            </div>
                            <div class="single-post__comment__item__text">
                                <h5>{{ $comment->user->name }}</h5>
                                <span>{{ $comment->created_at->format('d M Y') }}</span>
                                <p>{{ $comment->comment }}</p>
                                <!-- <ul>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-share-square-o"></i></a></li>
                                </ul> -->
                            </div>
                        </div>
                        @endforeach
                        <!-- <div class="single-post__comment__item single-post__comment__item--reply">
                            <div class="single-post__comment__item__pic">
                                <img src="img/categories/single-post/comment/comment-2.jpg" alt="">
                            </div>
                            <div class="single-post__comment__item__text">
                                <h5>Brandon Kelley</h5>
                                <span>15 Aug 2017</span>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
                                    magnam.</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-share-square-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-post__comment__item">
                            <div class="single-post__comment__item__pic">
                                <img src="img/categories/single-post/comment/comment-3.jpg" alt="">
                            </div>
                            <div class="single-post__comment__item__text">
                                <h5>Brandon Kelley</h5>
                                <span>15 Aug 2017</span>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
                                    magnam.</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-share-square-o"></i></a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                    <div class="single-post__leave__comment">
                        <div class="widget__title">
                            <h4>Leave a comment</h4>
                        </div>
                        <form action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->check() ? $authUser->id : route('login')  }}">
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <textarea placeholder="Message" name="comment"></textarea>
                            <button type="submit" class="site-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection