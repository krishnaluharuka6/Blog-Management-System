<?php
namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogServices{
    public function getAllBlogs(){
        return Blog::all();
    }

}




