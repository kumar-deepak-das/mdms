<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MyMail;

class MailController extends Controller
{
    
    public function sendMail()
    {
        $mailData = [
            'subject' => 'Registration Success',
            'name' => 'Deepak',
            'body' => [
                'Your Registration is Successfull for the KIIT Math Olympiad 2024.',
                'Your Password is 123',
                'Use the bellow URL to login and complete you application',
                'https://olympiads.kiit.ac.in/form/login',
            ]
        ];

        Mail::to('das.dpk@gmail.com')->send(new MyMail($mailData));

        echo ('Email Send');
    }
}
