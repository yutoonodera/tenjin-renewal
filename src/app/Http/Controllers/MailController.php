<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        //送り先
        $to = [
            [
                'email' => 'yutoonodera620218@gmail.jp',
                'name' => 'Test',
            ]
        ];
        Mail::to($to)->send(new SendMail('movee', 'yutoonodera0218@gmail.jp'));
    }
}
