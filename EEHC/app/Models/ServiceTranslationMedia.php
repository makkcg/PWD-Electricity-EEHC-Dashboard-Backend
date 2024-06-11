<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceTranslationMedia extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'service_translation_id', 'title_sound', 'title_video','desc_sound', 'desc_video'
   ];

}
