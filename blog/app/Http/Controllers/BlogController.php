<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;
use App\Services\BlogServices;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $blogservice;

    public function __construct(BlogServices $blogservice)
    {
        $this->blogservice=$blogservice;
    }

    public function index()
    {
        if(Auth::user()->role === 'admin')
        {
            $blogs=Blog::paginate(10);
        }
        else{
            $blogs=Blog::where('user_id',Auth::id())->paginate(10);
        }

        return view('blogs.show', compact('blogs'))->with('meta_title','BLOGS');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); 
        if($categories->count() == 0){
            session()->flash('info','To create a blog you must have category');
            
            return view('categories.create')->with('meta_title','Create CATEGORIES');;
        }

        return view('blogs.create', compact('categories'))->with('meta_title','Create BLOGS');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog=new Blog();
        $request->validate([
            'title'=>'required|min:3',
            'content'=>'required',
            'category_id' => 'required|array', // Ensure an array of category IDs is submitted
            'category_id.*' => 'exists:categories,id', 
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);

        $publishedAt = Carbon::createFromFormat('Y-m-d H:i',$request->date . ' ' .     $request->time);

        $blog->title=$request->title;
        // $blog->description=strip_tags(str_replace('&nbsp;',' ',$request->content));
        $blog->slug=Str::slug($request->title);
        $blog->description=$request->content;
        $blog->user_id=Auth::id();
        $blog->published_at = $publishedAt;
        $blog->save();
        $blog->categories()->sync($request->category_id);
        return redirect()->route('blogs.create')->with('success','Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog=Blog::with('categories')->findorFail($id);
        $categories=Category::all();
        return view('blogs.edit',compact('blog','categories'))->with('meta_title',$blog->title)->with('meta_description',$blog->description);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog=Blog::findorFail($id);
        $request->validate([
            'title'=>'required|min:3',
            'content'=>'required',
            'category_id' => 'required|array', // Ensure an array of category IDs is submitted
            'category_id.*' => 'exists:categories,id',
            'date' => $blog->isCurrentlyPublished() ? 'nullable' : 'required|date|after_or_equal:today',
            'time' => $blog->isCurrentlyPublished() ? 'nullable' : 'required|date_format:H:i',
        ]);


        if ($blog->isCurrentlyPublished()) {
            $publishedAt=$blog->published_at;
        }elseif ($request->date && $request->time) {
            $publishedAt = Carbon::createFromFormat(
                'Y-m-d H:i',
                $request->date . ' ' . $request->time
            );
        }

        $blog->title=$request->title;
        // $blog->description=strip_tags(str_replace('&nbsp;',' ',$request->content));
        $blog->slug=Str::slug($request->title);
        $blog->description=$request->content;
        $blog->user_id=Auth::id();
        $blog->published_at = $publishedAt;
        //$blog->is_published= (bool) $request->is_published;
        $blog->save();
        $blog->categories()->sync($request->category_id);
        return redirect()->route('blogs.index')->with('success','Blog edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog=Blog::findorFail($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success','Blog deleted successfully');
    }

    public function trashed(){
        if(Auth::user()->role==='admin'){
            $trashedBlogs = Blog::onlyTrashed()->paginate(10);
        } 
        else{
            $trashedBlogs=Blog::onlyTrashed()->where('user_id',Auth::id())->paginate(10);
        }
        return view('blogs.trash',compact('trashedBlogs'))->with('meta_title','TRASHED BLOGS');
    }

    public function restore($id)
    {
    $blog = Blog::withTrashed()->findOrFail($id); // Retrieve even soft-deleted blogs
    // Restore the soft-deleted blog
    $blog->restore();
    return redirect()->route('blogs.trashed')->with('success', 'Blog restored successfully.');
    }


    public function forceDelete($id)
    {
    $blog = Blog::withTrashed()->findOrFail($id);
    $blog->categories()->detach();

    $path="uploads/".$blog->user_id."/".$blog->slug;
    if (Storage::disk('public')->exists($path)) {
        Storage::disk('public')->deleteDirectory($path);
    }

    $blog->forceDelete();

    return redirect()->route('blogs.trashed')->with('success', 'Blog permanently deleted.');
    }
    
}
