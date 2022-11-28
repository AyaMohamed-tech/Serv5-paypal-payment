<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\ExpressCheckout;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PayPalController extends Controller
{
    public function welcome(){
        return view('front.welcome');
    }
    public function payment(){
        $data = [];
        $data['items']=[
            [
                'name'        => 'samsung',
                'price'       => 100,
                'description' => 'Samsung Galaxy',
                'qty'         => 1
            ]
        ];
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = 100;

        $provider = new ExpressCheckout();
        $response = $provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data,true);
        return redirect($response['paypal_link']);
    }

    public function success(Request $request){
        $provider = new ExpressCheckout();
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING'])) {

           return Redirect::route('welcome')
           ->with('success','Your Payment was successfully,thanks^^');
        }

        return Redirect::route('welcome')
           ->with('danger','Please try again later...');

    }

    public function cancel(){

        return Redirect::route('welcome')
        ->with('danger','Payment cancelled!');
    }

}
