<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use App\Mail\ContactMail;
use App\Models\User;

class EmailController extends Controller
{
    public function create()
    {
        return view('email');
    }

    public function sendEmail(Request $request)
    {
       

        $data = [
          'subject' => $request->subject,
          'name' => $request->name,
          'email' => $request->email,
          'message' => $request->message
        ];

        // FacadesMail::send('email-template', $data, function($message) use ($data) {
        //   $message->to("hajarfarsi59@gmail.com")
        //   ->subject($data['subject']);
        //   $message->from("salmafassi72@gmail.com");
        // });
        $admin=User::where('type',"App\Models\admin")->first();
        FacadesMail::to($admin->email)->send(new \App\Mail\ContactMail($data));

         return redirect("/accueil#contact-section")->with(['message' => 'E-mail envoyé avec succès !']);
        //dd("hh");
    }
}