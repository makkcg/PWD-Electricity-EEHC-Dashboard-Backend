<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqTranslationMedia extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'faq_translation_id', 'q_and_a_sound', 'q_and_a_video'
   ];

}
