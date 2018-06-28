<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * Defines mass-assignable fields
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'mime',
        'original_filename'
    ];

    /**
     * Declare a morphable model
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function fileable()
    {
        return $this->morphTo();
    }

    /**
     * Gets download url
     *
     * @return string
     */
    public function getDownloadUrl()
    {
        return route('files.download', [
            'id' => $this->id
        ]);
    }

    /**
     * Gets display url
     *
     * @return string
     */
    public function getDisplayUrl()
    {
        return route('files.download', [
            'id' => $this->id
        ]) . '?display=true';
    }

    /**
     * Gets delete url
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        return route('files.delete', [
            'id' => $this->id
        ]);
    }

    public function isImage()
    {
        return str_contains($this->mime, 'image/');
    }
    public function isPdf()
    {
        return $this->mime === 'application/pdf';
    }

}
