<?php

namespace App\Http\Controllers;

use App\Interfaces\ContactRepositoryInterface;
use App\Http\Requests\NewContactRequest;
use App\Main;

class ContactController extends Controller
{
    /** @var ContactRepositoryInterface */
    private $contactRepository;

    /**
     *
     */
    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    public function newForm()
    {
        $sheets = \App\GoogleSheet::instance();

        $sheet_id = config('app.google_sheets_id');
        $range = 'A1:H1';
        $response = $sheets->spreadsheets_values->get($sheet_id, $range);
        $values = $response->getValues();
        $url_array = parse_url(url()->previous());
        $accessLog = [
            \Request::ip(),            // アクセスのあったIPアドレス
            'contact',                      // アクセスしたURL
            $url_array['path'],         // アクセス元URL
            now()->toDateTimeString(), // アクセス日時
        ];

            $values = new \Google_Service_Sheets_ValueRange();
            $values->setValues([
                'values' => $accessLog
            ]);
            $params = ['valueInputOption' => 'USER_ENTERED'];
            $sheets->spreadsheets_values->append(
                $sheet_id,
                'A1',
                $values,
                $params
            );

        return redirect()->away(config('app.google_form_url'));
    }

    public function new(NewContactRequest $request)
    {
        $this->contactRepository->create($request);
        return redirect()->route('display.index');
    }
}
