<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    const UPLOAD_DIR = 'uploads/page/';
    const IMAGE_FILE_PREFIX = 'image';
    const UNIQUE_ERROR = 'URLがすでに存在しているので別のURLでお願いします';
    const SLASH = '/';
    const SLASH_ONE = '/1/';
    const SLASH_TWO = '/2/';
    //ステータスをプルダウン、一覧で表示する変数
    const STATUS = [
        '1' => '公開',
        '0' => '下書き',
    ];
    protected $fillable = [
        'title',
        'url',
        'thumbnail',
        'content01',
        'image01',
        'content02',
        'image02',
        'status',
    ];
}
