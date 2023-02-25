<?php

namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Http\Requests\NewContactRequest;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    public function create(NewContactRequest $request)
    {
        return Contact::create($request->all())->save();
    }

    public function send(array $to)
    {
        return Mail::to($to)->send(new SendMail('movee', 'yutoonodera0218@gmail.jp'));
    }
}