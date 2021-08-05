<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    public function user(){
      return $this->belongsTo('App\Models\User','user_id');
    }
}
