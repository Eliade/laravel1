<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Article extends Model
{
    protected $fillable = [
        'nom', 'slug', 'extrait','contenu'
    ];

    public function setSlugAttribute($value) {

        if(empty($value)){

            $this->attributes['slug'] = Str::slug($this->nom);
        }

    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
