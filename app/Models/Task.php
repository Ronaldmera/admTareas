<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'content', 'status', 'end_date'];
    protected $casts = [
        'end_date' => 'datetime',
        'created_at' => 'datetime', // opcional, Laravel ya lo hace pero por claridad
    ];
    

    //relacion usuarios con tareas, uno a muchos
   public function user(){
        return $this-> belongsTo('App\Models\User');
    }
}
