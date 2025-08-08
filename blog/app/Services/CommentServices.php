<?php
namespace App\Services;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CommentServices{
    public function getAllComments(){
        return Comment::paginate(10);
    }

}