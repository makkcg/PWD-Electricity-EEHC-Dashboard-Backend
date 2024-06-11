<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqTranslation extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;

    public $fillable = ['q_and_a'];

    public function media()
    {
        return $this->hasMany(FaqTranslationMedia::class, 'faq_translation_id', 'id');
    }
    public function SMedia()
    {
        return $this->hasMany(FaqTranslationMedia::class, 'faq_translation_id', 'id')->where('q_and_a_sound' ,'!=', null);
    }

    public function VMedia()
    {
        return $this->hasMany(FaqTranslationMedia::class, 'faq_translation_id', 'id')->where('q_and_a_video' ,'!=', null);
    }
}
