<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todos extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['text', 'complete'];
    protected $dates = ['deleted_at'];

     // …
    public function categorie()
    {
        return $this->hasOne('App\Categorie');
    }


}
