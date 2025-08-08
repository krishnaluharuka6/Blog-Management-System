<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
    ];

    public function blogs(){
        return $this->belongsToMany('App\Models\Blog');
    }

    use SoftDeletes;
    protected $dates=['deleted_at'];

}
