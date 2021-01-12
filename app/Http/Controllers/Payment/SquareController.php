<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

class SquareController extends Controller
{


    public function __construct()
    {
        $accessToken = 'EAAAED1qruHGkG95LH5HOxIWzo-G1DG6MLTKvQrxhHsEzQ6bDFnIQPRg5s9bXebw'; // from square dashboard
        $this->locationId = env('SQUARE_LOCATION_ID', 'LRNGX3T75HM3Z');
        $defaultApiConfig = new \SquareConnect\Configuration();
        $defaultApiConfig->setHost("https://connect.squareupsandbox.com");
        $defaultApiConfig->setAccessToken($accessToken);
        $this->defaultApiClient = new \SquareConnect\ApiClient($defaultApiConfig);
    }


    // public function addCustomer($request) {

    //     $name = "XXXX";
    //     $email = "xxxx@gmail.com";

    //     $customer = new \SquareConnect\Model\CreateCustomerRequest();
    //     $customer->setGivenName($name);
    //     $customer->setEmailAddress($email);



    //     $customersApi = new \SquareConnect\Api\CustomersApi($this->defaultApiClient);

    //     try {
    //         $result = $customersApi->createCustomer($customer);
    //         $id = $result->getCustomer()->getId();
    //         return $id;

    //     } catch (Exception $e) {
    //         return "";
    //         Log::info($e->getMessage());
    //         //echo 'Exception when calling CustomersApi->createCustomer: ', $e->getMessage(), PHP_EOL;
    //     }

    //     return "";
    // }


    // public function createPayment(Request $request){


    //     $customerId = $this->addCustomer($request);

    //     $body = new \SquareConnect\Model\CreateCustomerCardRequest();
    //     $body->setCardNonce($request->nonce); // nonce get from SqPaymentForm one time token




    //     $customersApi = new \SquareConnect\Api\CustomersApi($this->defaultApiClient);
    //     $result = $customersApi->createCustomerCard($customerId, $body);

    //     $data['card_id'] = $result->getCard()->getId(); // save this card_id for take payment
    //     $data['card_brand'] = $result->getCard()->getCardBrand();
    //     $data['card_last_four'] = $result->getCard()->getLast4();
    //     $data['card_exp_month'] = $result->getCard()->getExpMonth();
    //     $data['card_exp_year'] = $result->getCard()->getExpYear();

    //     $payment_body = new \SquareConnect\Model\CreatePaymentRequest();

    //     $amountMoney = new \SquareConnect\Model\Money();

    //     # Monetary amounts are specified in the smallest unit of the applicable currency.
    //     # This amount is in cents. It's also hard-coded for $1.00, which isn't very useful.
    //      $amountMoney->setAmount(100);
    //     $amountMoney->setCurrency("USD");
    //     $payment_body->setCustomerId($customerId);
    //     $payment_body->setSourceId($data['card_id']);
    //     $payment_body->setAmountMoney(100);
    //     $payment_body->setLocationId( $this->locationId );
    //     $payment_body->setDelayDuration(false);

    //     // # Every payment you process with the SDK must have a unique idempotency key.
    //     // # If you're unsure whether a particular payment succeeded, you can reattempt
    //     // # it with the same idempotency key without worrying about double charging
    //     // # the buyer.
    //     $payment_body->setIdempotencyKey(uniqid());

   
    //     $payments_api = new \SquareConnect\Api\PaymentsApi($this->defaultApiClient);

    //     try {
    //         $result = $payments_api->createPayment($payment_body);
    //         $transaction_id = $result->getPayment()->getId();
    //         return $transaction_id;
    //     } catch (\SquareConnect\ApiException $e) {
           
    //         return collect($e->getResponseBody())->toJson();
    //     }
    //    // $transactionId = $result->getPayment()->getId(); //save this transactionId



    //         // if(Str::contains($e->getMessage(), '[HTTP/2 400]'))
    //         // return  response()->json(json_decode(Str::after($e->getMessage(), '[HTTP/2 400] ')));




    //     return response()->json([$data]);
    // }

    public function refund($paymentId)
    {
        $refundApi = new \SquareConnect\Api\RefundsApi($this->defaultApiClient);
        $body = new \SquareConnect\Model\RefundPaymentRequest(); // \SquareConnect\Model\RefundPaymentRequest | An object containing the fields to POST for the request.  See the corresponding object definition for field details.
        $amountMoney = new \SquareConnect\Model\Money();

        # Monetary amounts are specified in the smallest unit of the applicable currency.
        # This amount is in cents. It's also hard-coded for $1.00, which isn't very useful.
        $amountMoney->setAmount(100);
        $amountMoney->setCurrency("USD");

        $body->setPaymentId($paymentId);
        $body->setAmountMoney($amountMoney);
        $body->setIdempotencyKey(uniqid());
        $body->setReason('wrong order');
        try {
            $result = $refundApi->refundPayment($body);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling RefundsApi->refundPayment: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function addCustomer() {

        $name = "XXXX";
        $email = "xxxx@gmail.com";

        $customer = new \SquareConnect\Model\CreateCustomerRequest();
        $customer->setGivenName($name);
        $customer->setEmailAddress($email);



        $customersApi = new \SquareConnect\Api\CustomersApi($this->defaultApiClient);

        try {
            $result = $customersApi->createCustomer($customer);
            $id = $result->getCustomer()->getId();
            return $id;

        } catch (Exception $e) {
            return "";
            Log::info($e->getMessage());
            //echo 'Exception when calling CustomersApi->createCustomer: ', $e->getMessage(), PHP_EOL;
        }

        return "";
    }

    public function createPayment(Request $request)
    {
        $cardNonce = $request->nonce;

        $customersApi = new \SquareConnect\Api\CustomersApi($this->defaultApiClient);
        $customerId = $this->addCustomer();

        $body = new \SquareConnect\Model\CreateCustomerCardRequest();
        $body->setCardNonce($cardNonce);

        $result = $customersApi->createCustomerCard($customerId, $body);

        $card_id = $result->getCard()->getId();
        $card_brand = $result->getCard()->getCardBrand();
        $card_last_four = $result->getCard()->getLast4();
        $card_exp_month = $result->getCard()->getExpMonth();
        $card_exp_year = $result->getCard()->getExpYear();
        $key =  $this->charge($customerId, $card_id);

       return  response()->json([
           'status'=>true,
           'message'=>"Transaction has been successfully.",
       ]);

    }

    public function charge($customerId, $cardId)
    {

        $payments_api = new \SquareConnect\Api\PaymentsApi($this->defaultApiClient);
        $payment_body = new \SquareConnect\Model\CreatePaymentRequest();

        $amountMoney = new \SquareConnect\Model\Money();

        # Monetary amounts are specified in the smallest unit of the applicable currency.
        # This amount is in cents. It's also hard-coded for $1.00, which isn't very useful.
        $amountMoney->setAmount(100);
        $amountMoney->setCurrency("USD");
        $payment_body->setCustomerId($customerId);
        $payment_body->setSourceId($cardId);
        $payment_body->setAmountMoney($amountMoney);
        $payment_body->setLocationId($this->locationId);

        # Every payment you process with the SDK must have a unique idempotency key.
        # If you're unsure whether a particular payment succeeded, you can reattempt
        # it with the same idempotency key without worrying about double charging
        # the buyer.
        $payment_body->setIdempotencyKey(uniqid());

        try {
            $result = $payments_api->createPayment($payment_body);
            $transaction_id = $result->getPayment()->getId();
            return $transaction_id;
        } catch (\SquareConnect\ApiException $e) {
            echo "Exception when calling PaymentsApi->createPayment:";
            var_dump($e->getResponseBody());
        }

    }



   

}
