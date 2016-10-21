<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests;

class ContactController extends Controller
{
    public function create(Request $request){
      $data = $request->input('contact');
      $email = $request->input('contact.email');
      $contact = Contact::firstOrCreate(['email' => $email], $data);
      return $contact;
    }
}
