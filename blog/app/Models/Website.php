<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'website_title',
        'logo',
        'contact',
        'email',
        'fb_link',
        'whatsapp_link',
        'pinterest_Link',
        'insta_Link',
    ];

    // public static function getSetting()
    // {
    //     return self::firstOrCreate(['id' => 1]); // Only one record, ensure it exists
    // }
}
