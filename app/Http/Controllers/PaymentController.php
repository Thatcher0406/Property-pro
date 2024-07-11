<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function initiate(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'amount' => 'required|numeric|min:1',
        ]);

        $phone = $this->formatPhoneNumber($request->phone);
        $amount = $request->amount;
        $accountReference = "ApartmentRent";

        $response = $this->makePayment($phone, $amount, $accountReference);

        // Handle the response as needed
        if ($response['ResponseCode'] == '0') {
            // Payment request accepted
            return redirect()->route('payments.success');
        } else {
            // Payment request failed
            return redirect()->route('payments.error');
        }
    }

    protected function formatPhoneNumber($phone)
    {
        if (substr($phone, 0, 1) == '0') {
            $phone = '254' . substr($phone, 1);
        } elseif (substr($phone, 0, 1) == '+') {
            $phone = substr($phone, 1);
        }
        return $phone;
    }

    protected function makePayment($phone, $amount, $accountReference)
    {
        $client = new Client();
        $url = config('mpesa.env') == 'sandbox' ? 'https://sandbox.safaricom.co.ke' : 'https://api.safaricom.co.ke';
        $accessToken = $this->getAccessToken();

        $lipaNaMpesaOnlineUrl = $url . '/mpesa/stkpush/v1/processrequest';

        $timestamp = Carbon::now()->format('YmdHis');
        $password = base64_encode(config('mpesa.shortcode') . config('mpesa.passkey') . $timestamp);

        $response = $client->post($lipaNaMpesaOnlineUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'BusinessShortCode' => config('mpesa.shortcode'),
                'Password' => $password,
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $amount,
                'PartyA' => $phone,
                'PartyB' => config('mpesa.shortcode'),
                'PhoneNumber' => $phone,
                'CallBackURL' => route('mpesa.callback'),
                'AccountReference' => $accountReference,
                'TransactionDesc' => 'Payment for Rent',
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    protected function getAccessToken()
    {
        $client = new Client();
        $url = config('mpesa.env') == 'sandbox' ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials' : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $response = $client->get($url, [
            'auth' => [config('mpesa.consumer_key'), config('mpesa.consumer_secret')],
        ]);

        $body = json_decode($response->getBody(), true);
        return $body['access_token'];
    }

    public function handleCallback(Request $request)
    {
        // Handle Mpesa callback logic here
        $response = json_decode($request->getContent(), true);
        // Save the response data to your database
        return response()->json(['status' => 'success']);
    }

    public function success()
    {
        return view('payments.success');
    }

    public function error()
    {
        return view('payments.error');
    }
}

