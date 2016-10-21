<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests;

class ContactController extends Controller
{
    public function create(Request $request){
      $data = $request->input('contact');
      $contact = new Contact($data);
      if ($contact->save())
        $response = "success";
      else {
        $response = "Contact was invalid and was not saved";
      }
      return $response;
    }
}
