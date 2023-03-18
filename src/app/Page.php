<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    const UPLOAD_DIR = 'movie/';
    const IMAGE_FILE_PREFIX = 'image';
    const SLASH = '/';
    protected $fillable = [
        'movie',
        'pagelink',
        'introductionlink',
    ];
}
