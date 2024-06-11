<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Service extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['title','desc'];

    protected $fillable = [
       'id' ,'title','desc','parent_id', 'creator_id'
    ];

    public function branch()
    {
        return $this->belongsToMany(Branch::class, 'branch_services','service_id','branch_id');
    }

    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id', 'id');
    }


    public function subServices()
    {
        return $this->hasMany(Service::class, 'parent_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'service_id', 'id')->orderBy('order', 'ASC');
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'service_id', 'id')->orderBy('order', 'ASC');
    }

    public function procedures()
    {
        return $this->hasMany(Procedure::class, 'service_id', 'id')->orderBy('order', 'ASC');
    }

    public function regulations()
    {
        return $this->hasMany(Regulation::class, 'service_id', 'id');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }
}
