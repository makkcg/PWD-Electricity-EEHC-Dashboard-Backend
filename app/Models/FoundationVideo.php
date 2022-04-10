<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class FoundationVideo extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['video'];

    protected $fillable = [
        'video' , 'creator_id' ,'foundation_id'
    ];
}
