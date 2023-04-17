<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];     //un champ proteger pour eviter les erreurs de mass assignment

    public static function boot(){

        parent::boot();

        self::creating(function ($post){


            $post->user()->associate(auth()->user()->id);
            $post->category()->associate(request()->category);

        });

        self::updating(function ($post){

            $post->category()->associate(request()->category);

        });

    }

    public function user(){

        return $this->belongsTo(User::class);     // un post appartient a un utilisateur

    }

    public function category(){

        return $this->belongsTo(Category::class);    //un post appartient a une categorie

    }

    public function getTitleAttribute($attribute){

        return Str::title($attribute);

    }

}
