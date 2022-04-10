<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentTranslationMedia extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'document_translation_id', 'title_sound', 'title_video','desc_sound', 'desc_video'
   ];

}
