<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $blogs=Blog::has('images')->published()->latest()->take(5)->get();
        $categories=Category::all();
        $main =$blogs->slice(0, 1);
        $first=$blogs->slice(1,2);
        $second=$blogs->slice(3,2);
        $top_blogs = Blog::has('images')->published()->mostViewed(5)->get();
        $top_dishes=$top_blogs->slice(1,4);
        // $top_blog=$top_dishes->blogs()->published()->get()->random();
        $top_blog=$top_blogs->first();
        return view('home.index',compact('blogs','first','main','second','categories','top_dishes','top_blog'));
    }

    public function blog(){
        $blogs=Blog::paginate(4);
        $categories=Category::all();
        return view('home.blogs',compact('blogs','categories'));
    }

    public function category(Category $category){
        $blogs=$category->blogs()->paginate(4);
        $categories=Category::all();
        return view('home.blogs',compact('blogs','categories'));
    }

    public function about(){
        $about=About::first();
        return view('home.about',compact('about'));
    }

    public function contact(){
        return view('home.contact');
    }

    public function singlepost($slug){
        $blog=Blog::with(['categories','images','user','comments'])->where('slug',$slug)->firstorFail();
        $blog->increment('views');
        $previous = Blog::with('categories')->where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $next = Blog::with('categories')->where('id', '>', $blog->id)->orderBy('id', 'asc')->first();
        return view('home.single_post',compact('blog','previous','next'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $blogs = Blog::where('title', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%")
                    ->with('categories') // eager load category
                    ->paginate(10);
        $categories=Category::all();
        return view('home.blogs', compact('blogs', 'query','categories'));
    }
}
