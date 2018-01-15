<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal;// as PayPal;
use Redirect;
use App\Service;
use App\Transaction;
use App\RequestServices;
use Auth;
use Session;

class PaymentController extends Controller
{
    private $_apiContext;

    public function __construct()
    {
        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));

    }
//    public function getCheckout(){
//        echo 'abc';
//    }

    public function index(){
        return view('application.funder.form');
    }

    public function checkout($id){
        $service = Service::find($id);
//        dd($service);
        $payer = PayPal::Payer();
        $payer->setPaymentMethod('paypal');

        $itemItemPrice = $service->cost;
        $item = PayPal::Item();
        $item->setQuantity(1);
        $item->setName($service->service);
        $item->setPrice($itemItemPrice);
        $item->setCurrency('USD');

        $itemList = PayPal::ItemList();
        $itemList->setItems(array($item));

        $totalAmount = $service->cost;
        $amount = PayPal::Amount();
        $amount->setCurrency('USD');
        $amount->setTotal($totalAmount);

        $transaction = PayPal::Transaction();
        $transaction->setAmount($amount);
        $transaction->setItemList($itemList);
        $transaction->setDescription($service->description);

        $redirectUrls = PayPal:: RedirectUrls();
        $redirectUrls->setReturnUrl(action('PaymentController@getDone'));
        $redirectUrls->setCancelUrl(action('PaymentController@getCancel'));

        $payment = PayPal::Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);
        $redirectUrl = $response->links[1]->href;

        return Redirect::to( $redirectUrl );
    }

    public function getDone(Request $request)
    {

        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');

        $payment = PayPal::getById($id, $this->_apiContext);

        $paymentExecution = PayPal::PaymentExecution();

        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);


        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'description' => $payment,
            'type' => 'services'
        ]);
        if($transaction){
            $id = session('request_services');
            $service = RequestServices::where('id', $id)->update([
                'status' => 1,
                'transaction_id' => $transaction->id
            ]);
            session()->forget('request_services');
        }
        if($transaction){

            Session::flash('success', 'Payment successfully done, pending for admin approval');
            return redirect()->route('request_services_page');
        }
        else{
            Session::flash('error', 'Payment was unsuccessful!');
            return redirect()->route('request_services_page');
        }

    }

    public function getCancel()
    {
        // Curse and humiliate the user for cancelling this most sacred payment (yours)
        session()->forget('request_services');
        return redirect()->route('request_services_page');
    }


    public function pending_payment($id){

        session()->put('request_services', $id);
        $service = RequestServices::find($id);
        return redirect()->route('checkout', ['id' => $service->service_id]);

    }
}
