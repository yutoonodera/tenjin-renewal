<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    const SPREADSHEET_MESSAGE = '以下スプレッドシートでアクセス情報が閲覧できます。';
    const STG_SPREADSHEET_MESSAGE  = '以下スプレッドシートでアクセス情報が閲覧できますが、テスト環境のためアクセス制限をしております。一時的にアクセス情報権限を付与できますのでアクセス情報を見たい場合はご連絡ください。';
}
