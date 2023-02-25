<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    const UPLOAD_DIR = 'uploads/main/';
    const IMAGE_FILE_PREFIX = 'image';
    const UNIQUE_ERROR = 'URLがすでに存在しているので別のURLでお願いします';
    const CONTACT = 'contact';
    const SLASH = '/';
    const SLASH_ONE = '/1/';
    const SLASH_TWO = '/2/';
    protected $fillable = [
        'title',
        'url',
        'thumbnail',
        'content01',
        'image01',
        'content02',
        'image02',
    ];
}
