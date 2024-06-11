<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcedureTranslationMedia extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'procedure_translation_id', 'desc_sound', 'desc_video'
   ];

}
