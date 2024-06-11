<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcedureTranslation extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;

    public $fillable = ['desc'];

    public function media()
    {
        return $this->hasMany(ProcedureTranslationMedia::class, 'procedure_translation_id', 'id');
    }
    public function DSMedia()
    {
        return $this->hasMany(ProcedureTranslationMedia::class, 'procedure_translation_id', 'id')->where('desc_sound' ,'!=', null);
    }

    public function DVMedia()
    {
        return $this->hasMany(ProcedureTranslationMedia::class, 'procedure_translation_id', 'id')->where('desc_video' ,'!=', null);
    }
}
