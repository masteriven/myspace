<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'email',
        'content'
    ];
    protected $table = 'post';

    public function user(){
      return $this->belongsTo('App\Models\User','user_id');
    }
}
