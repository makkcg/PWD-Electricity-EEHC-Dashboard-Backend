<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Foundation extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['name','desc'];

    protected $fillable = [
        'name','desc','website','map' ,'phone','email','landline', 'creator_id'
    ];

    public function images()
    {
        return $this->hasMany(FoundationImage::class, 'foundation_id', 'id');
    }

    public function sounds()
    {
        return $this->hasMany(FoundationSound::class, 'foundation_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany(FoundationVideo::class, 'foundation_id', 'id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'foundation_id', 'id');
    }

}
