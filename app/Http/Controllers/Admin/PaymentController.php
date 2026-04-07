<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth, Mail, File, DB,Exception;
use Yajra\DataTables\DataTables;
use App\Models\GlobalFranchiseFees;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
// use Ixudra\Curl\Facades\Curl;




class PaymentController extends Controller
{





    public function checkout_old(Request $request)
    {

        // dd($request);

        $payment_id=isset($payment_id)&&!empty($payment_id)?$payment_id:NULL;

        $global_franchise_fees= GlobalFranchiseFees::select('global_franchise_fees')->first();

        $amount=isset($global_franchise_fees->global_franchise_fees)
                &&!empty($global_franchise_fees->global_franchise_fees)
                ?$global_franchise_fees->global_franchise_fees:NULL;

       

        $uuid = Str::uuid()->toString();
                    $timestamp = Carbon::now()->format('YmdHisv');
                    $merchant_transaction_id = $uuid . '_' . $timestamp . '_' . mt_rand(1000, 9999);
                    $merchant_transaction_id = substr($merchant_transaction_id, 0, 36);
                    $total=1;
                    $data = array (
                        'merchantId' => 'M1P6FJRT04JJ',
                        'merchantTransactionId' => $merchant_transaction_id,
                        'merchantUserId' => 'INNOVERSION'.$payment_id,
                        'amount' => $amount * 100,
                        'redirectUrl' => url(route('admin.response')),
                        'redirectMode' => 'POST',
                        'callbackUrl' => url(route('admin.response')),
                        'paymentInstrument' =>
                        array (
                        'type' => 'PAY_PAGE',
                        ),
                    );

                    $encode = base64_encode(json_encode($data));

                    $saltKey = 'c5beafef-b2bf-4474-800f-af0373e0bb7e';
                    $saltIndex = 1;

                    $string = $encode.'/pg/v1/pay'.$saltKey;
                    $sha256 = hash('sha256',$string);

                    $finalXHeader = $sha256.'###'.$saltIndex;
                    $url = "https://api.phonepe.com/apis/hermes/pg/v1/pay";

                    $response = Curl::to($url)
                            ->withHeader('Content-Type:application/json')
                            ->withHeader('X-VERIFY:'.$finalXHeader)
                            ->withData(json_encode(['request' => $encode]))
                            ->post();
                   $rData = json_decode($response);
                    return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
    }



    public function checkout(Request $request)
    {
        // dd($request);

        $payment_id=isset($payment_id)&&!empty($payment_id)?$payment_id:NULL;

        $global_franchise_fees= GlobalFranchiseFees::select('global_franchise_fees')->first();

        $amount=isset($global_franchise_fees->global_franchise_fees)&&!empty($global_franchise_fees->global_franchise_fees)?$global_franchise_fees->global_franchise_fees:NULL;

        $url = 'https://api-public-2.mtarget.fr/messages';

        

        $transactionID = "MNM".Str::random(15);


        $data = [
            // "merchantId" => "M1P6FJRT04JJ",
            "merchantTransactionId" => $transactionID,
            "merchantUserId" => 'INNOVERSION'.$payment_id,
            "amount" => $amount * 100,
            "redirectUrl" => route('admin.response'),
            "redirectMode" => "POST",
            "callbackUrl" => route('admin.response'),
            // 'mobileNumber' => '8866282385',
            "paymentInstrument" =>
                        array (
                        'type' => 'PAY_PAGE',
                        ),
           
        ];

        $encode = base64_encode(json_encode($data));
        // $salt_key = 'c5beafef-b2bf-4474-800f-af0373e0bb7e';
        $salt_index = 1;
        $string = $encode . '/pg/v1/pay' . $salt_key;
        $sha256 = hash('sha256', $string);

        $x_header =   $sha256 . '###' . $salt_index;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            // CURLOPT_URL => 'https://api.phonepe.com/apis/hermes/pg/v1/pay',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(['request' => $encode]),
            CURLOPT_HTTPHEADER => array(
                'content-type: application/json',
                'accept:application/json',
                'X-VERIFY: ' . $x_header
            ),
        ));
        
        $response = curl_exec($curl);

            // dd($response);

        curl_close($curl);
        $result  = json_decode($response);
      

        if ($result->success) {
            // dd("In",$result);
            return redirect()->to($result->data->instrumentResponse->redirectInfo->url);
        }
    }


    public function phonepeResponse_old(){

        //dd($request);
        return view('admin.pages.PhonePePayment.confirm_payment');
        
    }


    public function phonepeResponse(Request $request)
    {
        dd($request);

        $input = $request->all();
        // $saltKey = 'c5beafef-b2bf-4474-800f-af0373e0bb7e';
        $saltIndex = 1;
        $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;
        $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
                ->withHeader('Content-Type:application/json')
                ->withHeader('accept:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withHeader('X-MERCHANT-ID:'.$input['merchantId'])
                ->get();

        $responseArray = json_decode($response, true);

        dd($responseArray); 


        $resultArray = [
            'success' => $responseArray['success'],
            'code' => $responseArray['code'],
            'message' => $responseArray['message'],
            'merchantId' => $responseArray['data']['merchantId'],
            'merchantTransactionId' => $responseArray['data']['merchantTransactionId'],
            'transactionId' => $responseArray['data']['transactionId'],
            'amount' => $responseArray['data']['amount'],
            'state' => $responseArray['data']['state'],
            'responseCode' => $responseArray['data']['responseCode'],
            'type' => $responseArray['data']['paymentInstrument']['type'],
            'pgTransactionId' => $responseArray['data']['paymentInstrument']['pgTransactionId'] ?? null,
            'pgServiceTransactionId' => $responseArray['data']['paymentInstrument']['pgServiceTransactionId'] ?? null,
            'bankTransactionId' => $responseArray['data']['paymentInstrument']['bankTransactionId'] ?? null,
            'utr' => $responseArray['data']['paymentInstrument']['utr'] ?? null,
            'upiTransactionId' => $responseArray['data']['paymentInstrument']['upiTransactionId'] ?? null,
            'cardNetwork' => $responseArray['data']['paymentInstrument']['cardNetwork'] ?? null,
            'accountType' => $responseArray['data']['paymentInstrument']['accountType'] ?? null,
            'cardType' => $responseArray['data']['paymentInstrument']['cardType'] ?? null,
            'bankTransactionId' => $responseArray['data']['paymentInstrument']['bankTransactionId'] ?? null,
            'pgAuthorizationCode' => $responseArray['data']['paymentInstrument']['pgAuthorizationCode'] ?? null,
            'arn' => $responseArray['data']['paymentInstrument']['arn'] ?? null,
            'bankId' => $responseArray['data']['paymentInstrument']['bankId'] ?? null,
            'brn' => $responseArray['data']['paymentInstrument']['brn'] ?? null,
            'booking_from' => 'hotel_booking',

        ];
        
        if($resultArray['success']==true)
        {
            $bookingDetails = $request->session()->get('hotel_booking_details');
            $userDetails = $request->session()->get('user_data');


            $randomNumber = random_int(100000, 999999);
            $bookingId = 'SHBI'.$randomNumber;
            $pnr_number = $randomNumber = random_int(100000000, 999999999);
            $data1 = [
                'hotel_id' => $bookingDetails['hotel_id'],
                'booking_id' => $bookingId,
                'pnr_number' => $pnr_number,
                'id' => session('u_id'),
                'room_type_id' => $bookingDetails['room_id'],
                'room_selected' => $bookingDetails['meal_plan_type'],
                'from_date' => $bookingDetails['from_date'],
                'to_date' => $bookingDetails['to_date'],
                'city_id' => $bookingDetails['city_id'],
                'location' => $bookingDetails['location'],
                'tax_percentage' => $bookingDetails['cgst'] + $bookingDetails['sgst'],
                'tax_amount' => session()->get('new_tax_amount'),
                'no_of_person' => $bookingDetails['no_of_person'],
                'amount_paid' => session()->get('new_amount_paid'),
                'no_of_rooms' => $bookingDetails['no_of_rooms'],
                'order_id' => $bookingDetails['order_id'],
                'redeem_points'=>session()->get('reedeem_point'),
                'discount' => session()->get('discount'),
                'invoice_id' => $bookingDetails['invoice_id'],
                'code'=> session()->get('code'),
                'discount_promo'=> session()->get('discount_promo'),
                'type'=>'Hotel',
                'residence_of'=> session()->get('residence_of'),
                'guest_list'=> [
                    "name" => session()->get('guest_name'),
                    "age" => 0,
                    "contact_no" => session()->get('guest_number'),
                ]
            ];
            $url1 = config('api.url').'web_hotel_booking';
            $ch = curl_init();
            $headers = array();
            $headers[] = "Content-Type: application/json";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $url1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data1));
            $result = curl_exec($ch);
            $result = json_decode($result, TRUE);
     
            curl_close($ch);
                 $resultArray['b_id'] = $result['b_id'];

            $url1 = config('api.url').'transaction_details';
            $ch = curl_init();
            $headers = array("Content-Type: application/json");
            $formData = $resultArray;
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $url1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($formData));  // Convert form data to JSON
            $result1 = curl_exec($ch);
            $result1 = json_decode($result1, TRUE);
            curl_close($ch);

            if($result['status_code']==200)
            {
                $email = session('guest_email');
                //  Mail::send('email/cybratic_otp_welcome',["name"=>$request->guest_name], function($message) use ($email){
                //         // $message->parameters($url);
                //          $message->to($email);
                //          $message->subject('Welcome Sybratic Card User');
                //       });
                 session()->forget('hotel_booking_details');

                 session()->forget('otp');
                 if(!session('user_id'))
                 {
                       return redirect()->route('login')->with(['message'=>'Hotel Booked Successfully']);

                 }
                 else
                 {

                      return redirect()->route('dashboard')->with(['message'=>'Hotel Booked Successfully']);
                 }

            }


        }
    }

    public function phonepeSuccess(){

        return view('admin.pages.PhonePePayment.confirm_payment');
        
    }

}
