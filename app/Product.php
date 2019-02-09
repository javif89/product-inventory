<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','brand'];
    protected $hidden = ['pivot'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function variants() {
        return $this->hasMany(Variant::class);
    }
}
