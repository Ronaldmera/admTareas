<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'content', 'status'];

    //relacion usuarios con tareas, uno a muchos
   public function user(){
        return $this-> belongsTo('App\Models\User');
    }
}
