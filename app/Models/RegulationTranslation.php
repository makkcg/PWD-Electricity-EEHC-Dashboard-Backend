<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegulationTranslation extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;

    public $fillable = ['desc'];

    public function media()
    {
        return $this->hasMany(RegulationTranslationMedia::class, 'regulation_translation_id', 'id');
    }
    public function DSMedia()
    {
        return $this->hasMany(RegulationTranslationMedia::class, 'regulation_translation_id', 'id')->where('desc_sound' ,'!=', null);
    }

    public function DVMedia()
    {
        return $this->hasMany(RegulationTranslationMedia::class, 'regulation_translation_id', 'id')->where('desc_video' ,'!=', null);
    }
}
