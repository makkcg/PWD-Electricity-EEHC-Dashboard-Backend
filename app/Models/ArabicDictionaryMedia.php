<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicDictionaryMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'foundation_id' , 'arabic_dictionary_id' , 'image' , 'video'
    ];
}
