<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class About extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['desc'];

    protected $fillable = [
        'desc' , 'creator_id'
    ];

    public function images()
    {
        return $this->hasMany(AboutImage::class, 'about_id', 'id');
    }

    public function sounds()
    {
        return $this->hasMany(AboutSound::class, 'about_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany(AboutVideo::class, 'about_id', 'id');
    }
}
