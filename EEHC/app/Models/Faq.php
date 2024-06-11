<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Faq extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['q_and_a'];

    protected $fillable = [
        'q_and_a','order' , 'creator_id','service_id'
    ];

    public function images()
    {
        return $this->hasMany(FaqImage::class, 'faq_id', 'id');
    }

    public function service()
    {
        return $this->hasOne(Service::class,'id','service_id');
    }
}
