<?php

namespace App\Http\Controllers;

use App\Page;
use App\Main;
use App\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $googleSheetOpenMessage = ADMIN::SPREADSHEET_MESSAGE;
        if (!config('app.google_sheets_open_flg')) {
            $googleSheetOpenMessage = ADMIN::STG_SPREADSHEET_MESSAGE;
        }

        return view('admin/index')
        ->with('mains', Main::All())
        ->with('pages', Page::All())
        ->with('googleSheetOpenMessage', $googleSheetOpenMessage)
        ->with('googleSheetUrl', config('app.google_sheets_url'));
    }
}