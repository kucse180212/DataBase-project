<?php

namespace App\Http\Controllers;

use App\Admin;
use App\bus;
use App\company;
use App\customer;
use App\seat;
use Illuminate\Http\Request;
use App\User;
use Omnipay\Omnipay;
use App\Payment;
use App\payment_sytem;
use Illuminate\Support\Facades\Bus as FacadesBus;

class postController extends Controller
{
    //

    public function sview()
    {
        $people = ['Edwin','jose','james','maria'];
        return view('show_my_view',compact('people'));
    }
    public function show_post($id,$name)
    {
        return view('spost',compact('id','name'));
    }
    public function login()
    {
        return view('spost');
    }
    public function verify(Request $request)
    {
        if($request->asa =='Admin')
        {
        $user = Admin::where('email',$request->email)->where('password',$request->password)->first();
        return view('learning/admin_f1page',compact('user'));
        }
        $user =customer::where('email',$request->email)->where('password',$request->password)->first();
        return view('learning/customer_f1page',compact('user'));

    }
    public function save_customer(Request $request)
    {
      $user=new customer();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->phone_number=$request->phone_number;
      $user->Bus_id=0;
      $user->save();
      $account=new payment_sytem();
      $account->phone_number=$user->phone_number;
      $account->balance=10000;
      $account->save();
      return view('learning/customer_f1page',compact('user'));

    }
    public function save_Admin(Request $request)
    {
      $user=new Admin();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->phone_number=$request->phone_number;
      $user->Company_id=0;
      $user->save();
      $account=new payment_sytem();
      $account->phone_number=$user->phone_number;
      $account->balance=0;
      $account->save();
      return view('learning/admin_f1page',compact('user'));

    }
    public function checkticket(Request $request,$post_id)
   {
    $user = bus::where('starting_place', $request->starting_place)->where('Destination', $request->Destination)
    ->where('starting_Date',$request->Starting_Date)->where('available_seat','>',$request->N_O_T)->get();
    if(!empty($user)){

       return view('learning/show_ticket',['ticket'=>$user],['user'=> $post_id]);
    }

   }

   public function finalcheck($post_id,$post_id2)
   {
       echo $post_id;
       echo $post_id2;
       $seat=seat::where('bus_id',$post_id)->where('user_id','')->get();

      return view('learning/finalcheck',['seat'=>$seat],['user'=>$post_id2]);
   }
   public function place($post_id)
   {


      return view('learning/buy_ticket',['user'=>$post_id]);
   }


   public function index()
    {
        return view('learning/payment');
    }



    public function add_company($post_id)
    {
        $user=Admin::where('email',$post_id)->first();
        if(!empty($user)){
        return view('learning/addcompany',['user'=>$user]);
        }
    }

    public function save_company(Request $request ,$post_id)
    {
      $user=Admin::where('email',$post_id)->first();
      $company=new company();
      $company->COMPANY_NAME=$request->name;
      $company->Rating=$request->rating;
      $company->phone_number=$request->phone_number;
      $company->save();
      $user->company_id=$company->id;
      $user->save();
      return view('learning/admin_f1page',['user'=>$user]);
    }

    public function return($post_id)
    {
      $user=Admin::where('email',$post_id)->first();
      if(!empty($user))
      {
        return view('learning/admin_f1page',['user'=>$user]);
      }
      $user=customer::where('email',$post_id)->first();
      if(!empty($user))
      {
        return view('learning/customer_f1page',compact('user'));
      }
    }

    public function check_buses($post_id)
    {
        $user=Admin::where('email',$post_id)->first();
        $bus=bus::where('company_id',$user->company_id)->first();
        return view('learning/check_buses',['user'=>$user],['ticket',$bus]);

    }

    public function add_buses($post_id)
    {
        $user=Admin::where('email',$post_id)->first();
        return view('learning/add_buses',['user'=>$user]);
    }

    public function save_bus(Request $request ,$post_id)
    {
        echo $request->starting_date;
      $user=Admin::where('email',$post_id)->first();
      $bus=new bus();
      $bus->company_id=$user->company_id;
      $bus->starting_place=$request->starting_place;
      $bus->Destination=$request->Destination;
      $bus->starting_time="09:10:00";
      $bus->starting_Date=$request->starting_date;
      $bus->total_seat=$request->total_seat;
      $bus->available_seat=$request->total_seat;
      $bus->save();
      for($i=0;$i!=$request->total_seat;$i++)
      {
        $seat=new seat();
        $seat->price=$request->price;
        $seat->Bus_id=$bus->id;
        $seat->user_id='';
        $seat->seat_number=''; //....yet to update''''
        $seat->save();

      }
      return view('learning/add_buses',['user'=>$user]);
    }

    public function confirm_tickets($post_id,$post_id2,Request $request)
    {
        $user=customer::where('email',$post_id)->first();
        $seat=seat::where('id',$post_id2)->first();
        $bus=bus::where('id',$seat->Bus_id)->first();
        $user->bus_id=$seat->Bus_id;
        $user->save();
        $bus->available_seat=$bus->available_seat - $request->N_O_T ;
        $Admin=Admin::where('company_id',$bus->company_id)->first();
        $user_account=payment_sytem::where('phone_number',$user->phone_number)->first();
        $user_balance=$user_account->balance;
        $seat_price=$request->N_O_T * $seat->price;
        $user_balance=$user_balance - $seat_price;
        $Admin_account=payment_sytem::where('phone_number',$Admin->phone_number)->first();
        echo $Admin->name;
        $Admin_balance=$Admin_account->balance;
        $Admin_balance=$Admin_balance+ $seat_price ;
        $Admin_account->balance=$Admin_balance;
        $Admin_account->save();
        $user_account->balance=$user_balance ;
        $user_account->save();
        $seats= seat::where('id',$post_id2)->get();
         $x=(int)0;
       for($x=0;$x!=$request->N_O_T;$x++)
       {
         $seat=seat::where('user_id','')->first();
         $seat->user_id=$user->id;
         $seat->save();
       }

        return view('learning/done',['user'=>$post_id],['balance'=>$user_balance]);





    }




















}




// public function charge(Request $request)
//     {
//         if ($request->input('stripeToken')) {

//             $gateway = Omnipay::create('Stripe');
//             $gateway->setApiKey(env('STRIPE_SECRET_KEY'));

//             $token = $request->input('stripeToken');

//             $response = $gateway->purchase([
//                 'amount' => $request->input('amount'),
//                 'currency' => env('STRIPE_CURRENCY'),
//                 'token' => $token,
//             ])->send();

//             if ($response->isSuccessful()) {
//                 // payment was successful: insert transaction data into the database
//                 $arr_payment_data = $response->getData();

//                 $isPaymentExist = Payment::where('payment_id', $arr_payment_data['id'])->first();

//                 if(!$isPaymentExist)
//                 {
//                     $payment = new Payment;
//                     $payment->payment_id = $arr_payment_data['id'];
//                     $payment->payer_email = $request->input('email');
//                     $payment->amount = $arr_payment_data['amount']/100;
//                     $payment->currency = env('STRIPE_CURRENCY');
//                     $payment->payment_status = $arr_payment_data['status'];
//                     $payment->save();
//                 }

//                 return "Payment is successful. Your payment id is: ". $arr_payment_data['id'];
//             } else {
//                 // payment failed: display message to customer
//                 return $response->getMessage();
//             }
//         }
//     }
