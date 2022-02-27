<?php

namespace App\Http\Controllers;

use App\Models\Helpers;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        return view('donations');
    }

    function get_name()
    {
        return "HMAC-SHA1";
    }

    public function build_signature($request, $consumer, $token)
    {

        $base_string = $request->get_signature_base_string();
        $request->base_string = $base_string;

        $key_parts = array(
            $consumer->secret,
            ($token) ? $token->secret : ""
        );

        $key_parts = OAuthUtil::urlencode_rfc3986($key_parts);
        $key = implode('&', $key_parts);

        return base64_encode(hash_hmac('sha1', $base_string, $key, true));
    }

    public function sendRequest(Request $request, Helpers $helpers)
    {
        // dd($request->all());
        $token = $params = NULL;

        $consumer_key = 'L6S84emBwk8wv5U7PeRL3gJwVf/tbuhF';
        $consumer_secret = 't0aJpipvXXm9lCOkS2Hs5ZnJgeA=';
        $signature_method = new OAuthSignatureMethod_HMAC_SHA1();

        $iframelink = 'https://www.pesapal.com/API/PostPesapalDirectOrderV4';


        //form variables
        $amount = number_format($request->amount, 2);
        $desc = 'Payment Req for ' . $request->first_name;
        $type = 'MERCHANT';
        $reference = $helpers->generateTransId();
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $phonenumber = $request->phonenumber;

        $callback_url = 'https://a39d-105-161-212-142.ngrok.io';


        //prepare xml request
        $post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchemainstance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"" . $amount . "\" Description=\"" . $desc . "\" Type=\"" . $type . "\" Reference=\"" . $reference . "\" FirstName=\"" . $first_name . "\" LastName=\"" . $last_name . "\" Email=\"" . $email . "\" PhoneNumber=\"" . $phonenumber . "\" xmlns=\"http://www.pesapal.com\" />";

        $post_xml = htmlentities($post_xml);


        //send the request
        $consumer = new OAuthConsumer($consumer_key, $consumer_secret);
        //post transaction to pesapal
        $iframe_src = OAuthRequest::from_consumer_and_token(
            $consumer,
            $token,
            "POST",
            $iframelink,
            $params
        );

        $iframe_src->set_parameter("oauth_callback", $callback_url);
        $iframe_src->set_parameter("pesapal_request_data", $post_xml);
        $iframe_src->sign_request($signature_method, $consumer, $token);

        // return view('iframe', compact('iframe_src'));

        return $iframe_src;
    }

    public function getParametersForm()
    {
        return view('parameters');
    }

    public function setParameters(Request $request)
    {
        info($request->consumer_key);
        info($request->consumer_secret);

        $key1 = 'CONSUMER_KEY';
        $value1 = $request->consumer_key;

        $key2 = 'CONSUMER_SECRET';
        $value2 = $request->consumer_secret;

        $path = base_path('.env');

        file_put_contents($path, str_replace(
            $key1 . '=' . env($key1),
            $key1 . '=' . $value1,
            file_get_contents($path)
        ));

        file_put_contents($path, str_replace(
            $key2 . '=' . env($key2),
            $key2 . '=' . $value2,
            file_get_contents($path)
        ));

        return response()->json(['parameters set successfully']);
    }

    public function saveToDb()
    {
        $reference = null;
        $pesapal_tracking_id = null;
        if (isset($_GET['pesapal_merchant_reference']))
            $reference = $_GET['pesapal_merchant_reference'];
        if (isset($_GET['pesapal_transaction_tracking_id']))
            $pesapal_tracking_id = $_GET['pesapal_transaction_tracking_id'];
        //store $pesapal_tracking_id in your database against the order with orderid = $reference

    }
}
