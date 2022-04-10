<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Branch extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['name','desc','note','address'];

    protected $fillable = [
        'foundation_id' , 'creator_id', 'city_id', 'map' , 'pwd_status', 'phone1' , 'phone2' ,
        'landline1' , 'landline2', 'email', 'name','desc','note','address'
    ];

    public function foundation()
    {
        return $this->belongsTo(Foundation::class, 'foundation_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(BranchImage::class, 'branch_id', 'id');
    }

    public function sounds()
    {
        return $this->hasMany(BranchSound::class, 'branch_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany(BranchVideo::class, 'branch_id', 'id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'branch_services')->where('parent_id', null);
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }
}
