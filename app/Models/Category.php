<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];     //un champ proteger pour eviter les erreurs de mass assignment

    public function posts(){

        return $this->hasMany(Post::class);  //une categorie peut avoir plusieurs posts

    }

}
