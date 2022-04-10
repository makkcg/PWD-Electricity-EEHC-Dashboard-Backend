<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentTranslation extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
         'title', 'desc'
    ];


    public function media()
    {
        return $this->hasMany(DocumentTranslationMedia::class, 'document_translation_id', 'id');
    }
    public function TSMedia()
    {
        return $this->hasMany(DocumentTranslationMedia::class, 'document_translation_id', 'id')->where('title_sound' ,'!=', null);
    }
     public function TVMedia()
    {
        return $this->hasMany(DocumentTranslationMedia::class, 'document_translation_id', 'id')->where('title_video' ,'!=', null);
    }
     public function DSMedia()
    {
        return $this->hasMany(DocumentTranslationMedia::class, 'document_translation_id', 'id')->where('desc_sound' ,'!=', null);
    }
     public function DVMedia()
    {
        return $this->hasMany(DocumentTranslationMedia::class, 'document_translation_id', 'id')->where('desc_video' ,'!=', null);
    }
}
