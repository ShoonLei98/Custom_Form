<?php

namespace App\Http\Controllers;

use App\Mail\CustomFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from Custom Form',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to(auth()->user()->email)->send(new CustomFormMail($mailData));
           
    }
}
