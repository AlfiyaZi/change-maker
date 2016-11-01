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
        $contact = Contact::firstOrCreate($data);
        $friends = $request->input('friends');
        if (count($friends) > 0) {
          foreach ($friends as $friend){
            $contact->friends()->firstOrCreate($friend);
          }
        }
        $post->comments()->saveMany($comments);
      } else {
        return array("errors" => $contact->errors());
      }
    }
}
