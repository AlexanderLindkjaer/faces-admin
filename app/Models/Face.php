<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FilesTrait;

class Face extends Model
{
    use FilesTrait;

    protected $guarded = [];

    protected $directory_name = 'faces';


    public function img()
    {
      return $this->hasOne(File::class, 'id', 'img_id');
    }

    public function getUrlAttribute()
    {
      return $this->img->getDownloadUrl();
    }

    public function shoutOuts()
    {
      return $this->hasMany(ShoutOut::class);
    }
}
