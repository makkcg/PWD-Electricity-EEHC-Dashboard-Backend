<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoundationTranslation extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;

    public $fillable = ['name','desc'];

}
