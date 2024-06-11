<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Procedure extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['desc'];

    protected $fillable = [
        'desc', 'creator_id','service_id','order'
    ];

    public function images()
    {
        return $this->hasMany(ProcedureImage::class, 'procedure_id', 'id');
    }

    public function service()
    {
        return $this->hasOne(Service::class,'id','service_id');
    }
}
