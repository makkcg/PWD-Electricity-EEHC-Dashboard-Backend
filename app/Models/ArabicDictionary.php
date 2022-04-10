<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicDictionary extends Model
{
    use HasFactory;

    protected $fillable = [
         'word' ,'column'
    ];

    public function foundation()
    {
        return $this->belongsToMany(Foundation::class, 'arabic_dictionary_foundations');
    }

    public function media()
    {
        return $this->hasMany(ArabicDictionaryMedia::class, 'arabic_dictionary_id', 'id');
    }
}
