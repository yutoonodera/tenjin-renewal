<?php

namespace App\Http\Controllers;

use App\Page;
use App\Main;
use App\Admin;
use App\Http\Requests\PageRequest;

class DisplayController extends Controller
{
    public function index()
    {
        return view('display/main')
        ->with('uploadDir', Main::UPLOAD_DIR)
        ->with('slash', Main::SLASH)
        ->with('slashOne', Main::SLASH_ONE)
        ->with('slashTwo', Main::SLASH_TWO)
        ->with('mains', Main::All())
        ->with('pages', Page::All())
        ->with('pages', Main::where('id', '=', '1')->get());
    }
    public function mainPage($url)
    {
        // $sheets = \App\GoogleSheet::instance();

        // $sheet_id = config('app.google_sheets_id');
        // $range = 'A1:H1';
        // $response = $sheets->spreadsheets_values->get($sheet_id, $range);
        // $values = $response->getValues();
        $url_array = parse_url(url()->previous());
        $accessLog = [
            \Request::ip(),            ////// アクセスのあったIPアドレス
            $url,                      ////// URL
            // $url_array['path'],         // アクセス元URL
            now()->toDateTimeString(), // アクセス日時
        ];

            // $values = new \Google_Service_Sheets_ValueRange();
            // $values->setValues([
            //     'values' => $accessLog
            // ]);
            // $params = ['valueInputOption' => 'USER_ENTERED'];
            // $sheets->spreadsheets_values->append(
            //     $sheet_id,
            //     'A1',
            //     $values,
            //     $params
            // );
        return view('display/main')
        ->with('uploadDir', Main::UPLOAD_DIR)
        ->with('slash', Main::SLASH)
        ->with('slashOne', Main::SLASH_ONE)
        ->with('slashTwo', Main::SLASH_TWO)
        ->with('mains', Main::All())
        ->with('pages', Main::where('url', '=', $url)->get());
    }
    public function privatePage($url)
    {
        //dd(Page::where('url', '=', $url)->get());
        return view('display/page')
        ->with('uploadDir', Page::UPLOAD_DIR)
        ->with('slash', Page::SLASH)
        ->with('slashOne', Page::SLASH_ONE)
        ->with('slashTwo', Page::SLASH_TWO)
        ->with('mains', Main::All())
        ->with('pages', Page::where('url', '=', $url)->get());
    }
}
