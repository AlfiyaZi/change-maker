<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests;

class ContactController extends Controller
{
    public function create(Request $request){
      $data = $request->input('contact');
      $contact = new Contact();
      if($contact->validate($data)){
        return Contact::firstOrCreate(['email' => $data['email']], $data);
      } else {
        return $contact->errors();
      }
    }
}
