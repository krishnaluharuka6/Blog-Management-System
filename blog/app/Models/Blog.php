<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'user_id',
        'published_at',
        'is_published'
    ];

    protected $casts=[
        'published_at'=>'datetime',
    ];

    use SoftDeletes;
    protected $dates=['deleted_at'];
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }

    public function images(){
        return $this->hasMany('App\Models\Image');
    }


    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function scopePublished(Builder $query)
    {
        return $query
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function isCurrentlyPublished(): bool
    {
        return $this->published_at && $this->published_at <= now();
    }

    public function getReadingTimeAttribute(){
        $word_count=str_word_count(strip_tags($this->description));
        $wordsPermin=200;
        $readingTime=ceil($word_count/$wordsPermin);
        return $readingTime.'min read';
    }

    public function scopeMostViewed($query)
    {
        return $query->orderBy('views', 'desc')->limit(5);
    }

//     public static function boot()
// {
//     parent::boot();

//     static::forceDeleted(function ($blog) {
//         $blogname=Str::slug($blog->title)?:'untitled';
//         $folderPath = "public/uploads/".$blogname;
//         if (Storage::exists($folderPath)) {
//             Storage::deleteDirectory($folderPath);
//         }
//     });
// }

}
