<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Subscriber;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout($formation=null)
    {   
        //Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51KptyRFYhEIQwnhfKaEmwNfGD4t2ZDMnJJBttZs8C26m7hePBXrgK8XM3dtRX3mciKyTUqX00URoeAyQE4igHAgm00aFBcDrVO');

        $formation1=Formation::find($formation);
        $prix=$formation1->prix;		
		$amount = $prix;
		$amount *= $prix;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From Codehunger',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('Etudiant.credit-card',compact('intent','prix','formation'));

    }

    public function afterPayment(Request $request)
    {
          $formation=Formation::find($request->formationId);
          $formation->status="Vendu";
          $formation->update();
          $subscriber=new Subscriber();
    $subscriber->user_id=$request->userId;
    $subscriber->formation_id=$request->formationId;
    $datetime=new DateTime();
    $subscriber->created_at=$datetime->format('Y-m-d');
    $formation=Formation::find($request->formationId);
    $subscriber->progress=0;
    if(!Subscriber::where('user_id',$subscriber->user_id)->where('formation_id',$subscriber->formation_id)->exists()){
        $subscriber->save();
        $message="félécitation !, vous avez inscrit avec succès sur notre cours intitulé ".$formation->title;
        $data = [
                'subject' => $message,
                'id' => $subscriber->id,
            ];

            $subsc=User::where('id',$request->userId)->first();
            Mail::to($subsc->email)->send(new \App\Mail\ContactMail1($data));
    }
     

    return view("Etudiant.continueCourse",['formation'=>$formation]);
    
    }
}