<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoutOut extends Model
{
    protected $fillable = [
      'shout',
      'face_id',
      'active'
    ];

    public function face()
    {
      return $this->belongsTo(Face::class);
    }
}
