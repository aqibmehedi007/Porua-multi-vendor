<?php

namespace App\Http\Controllers\API\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Transaction;
use \App\TransactionDetail;
use App\Http\Resources\API\Transaction\TransactionResource;
use App\Http\Resources\API\User\UserPurchasedBookResource;
use App\Http\Resources\API\Book\BookResource;
use Braintree;

class TransactionController extends Controller
{
    
    // this method is called after getting response from payment gateway
    public function saveTransaction(Request $request){

        // return response()->json(['status' => true , 'request' => $request->toArray() ]);

        $user = \Auth::user();
        
        $other_detail = json_decode($request->transaction_detail,true);
        // $other_detail = $request->transaction_detail ;

        // $data['datetime'] = date('Y-m-d H:i:s');
        $data['other_transaction_detail'] = $request->transaction_detail;
        $data['user_id']  = $user->id;
        $data['payment_type'] = $request->type;
        $data['total_amount'] = $request->total_amount;

        // return response()->json(['status' => true , 'request' => $request->toArray(), 'data' => $data ]);

        $data['txn_id']  = $other_detail['TXN_PAYMENT_ID'];
        $data['payment_status'] = $other_detail['STATUS'];
		
		$this_order_id  = $other_detail['TXN_ORDER_ID'];

        // return response()->json(['status' => true , 'request' => $request->toArray(), 'data' => $data ]);

        $data['transaction_id'] = substr($this_order_id, 8);

        // return response()->json(['status' => true , 'request' => $request->toArray(), 'data' => $data, 'this_order_id' => $this_order_id ]);

        $transaction_detail = json_decode($request->order_detail,true);
        // $transaction_detail = $request->order_detail;

        // $result  = Transaction::Create($data);

        // update instead of create
        $result  = Transaction::Where('transaction_id', $data['transaction_id'])->update($data);

        // return response()->json(['status' => true , 'request' => $request->toArray(), 'data' => $data, 'result' => $result ]);

        // foreach ($transaction_detail as $key => $value) {
            // $td['transaction_id']     = $result->transaction_id;
            // $td['book_id']   = $value['book_id'];
            // $td['user_id']   = $user->id;
            // $td['price'] = $value['price'];
            // $td['discount'] = $value['discount'];
            // TransactionDetail::create($td);

                $cart_data = \App\UserCartMapping::where('user_id',$user->id)->delete();
                // if($cart_data != null){
                //     $cart_data->delete();
                // }

                // $book_data = \App\Book::where('book_id',$value['book_id'])->first();
        // }


        if($other_detail['STATUS'] == "TXN_SUCCESS" || $other_detail['STATUS'] == "approved" ){
                return response()->json(['status' => true ,'message' => trans('messages.save_form',['form' => 'Transaction']) ]);
        }else{
            return response()->json(['status' => false ,'message' => trans('messages.transaction_fail') ]);
        }
    }

    // save transaction before gateway response
    public function userTransactionId(Request $request){

        // return response()->json(['status' => true , 'request' => $request ]);

        $user = \Auth::user();
        
        // return response()->json(['status' => true , 'user' => $user ]);

        $other_detail = json_decode($request->transaction_detail,true);

        $data['datetime'] = date('Y-m-d H:i:s');
        $data['other_transaction_detail'] = $request->transaction_detail;
        $data['user_id']  = $user->id;
        $data['payment_type'] = 0;
        // $data['total_amount'] = $request->total_amount;

        // $data['txn_id']  = $other_detail['TXNID'];
        // $data['payment_status'] = $other_detail['STATUS'];
        $data['payment_status'] = "Unpaid";

        $transaction_detail = json_decode($request->order_detail,true);

        // return response()->json(['status' => true , 'data' => $data, 'transactionDetail' => $transaction_detail ]);

        $result  = Transaction::Create($data);

        $txn_order_id = date('Ymd', $result->dateTime) . $result->transaction_id;


        // $result  = Transaction::Where('transaction_id', $data['transaction_id'])->update($result);

        // return response()->json(['status' => true , 'data' => $data , 'result' => $result ]);

        // foreach ($transaction_detail as $key => $value) {
        
        $cart_data = \App\UserCartMapping::where('user_id',$user->id)->get();
        // return response()->json(['status' => true , 'data' => $data , 'result' => $result, 'cart_data' => $cart_data ]);

        $total_book_price = 0;
        $total_discount_book_price = 0;

        foreach ($cart_data as $key => $value) {
            $td['transaction_id']     = $result->transaction_id;
            $td['book_id']   = $value['book_id'];
            $td['user_id']   = $user->id;
            
            $book_data = \App\Book::where('book_id',$value['book_id'])->first();
            $td['price'] = $book_data['price'];
            $td['discount'] = $book_data['discount'];

            $total_book_price += $book_data['price'] - $book_data['price'] * $book_data['discount'] / 100;
            $total_discount_book_price +=  $book_data['price'] * $book_data['discount'] / 100;

            TransactionDetail::create($td);

                // $cart_data = \App\UserCartMapping::where('book_id',$value['book_id'])->where('user_id',$user->id)->first();
                // if($cart_data != null){
                //     $cart_data->delete();
                // }

                // $book_data = \App\Book::where('book_id',$value['book_id'])->first();
        }

        $data['total_amount'] = $total_book_price;
        $data['discount'] = $total_discount_book_price;

        $transaction_detail_generate['TXN_ORDER_ID'] = $txn_order_id;
        $transaction_detail_generate['TXNID'] = null;
        $transaction_detail_generate['STATUS'] = null;
        $transaction_detail_generate['TXN_PAYMENT_ID'] = null;

        $data['other_transaction_detail'] = json_encode($transaction_detail_generate);

        $result2  = Transaction::Where('transaction_id', $result['transaction_id'])->Update($data);

        $result  = Transaction::Where('transaction_id', $result['transaction_id'])->first();

        unset($result['transaction_id'], $result['deleted_at'], $result['other_transaction_detail'], $result['payment_status'], $result['txn_id'], $result['payment_type'], $result['total_amount'], $result['discount'], $result['datetime']);
        $result['txn_order_id'] = $txn_order_id;

        return response()->json(['status' => true ,'message' => trans('messages.save_form',['form' => 'Transaction']), 'data' => $result ]);

        if($other_detail['STATUS'] == "TXN_SUCCESS" || $other_detail['STATUS'] == "approved" ){
                return response()->json(['status' => true ,'message' => trans('messages.save_form',['form' => 'Transaction']), 'data' => $result ]);
        }else{
            return response()->json(['status' => false ,'message' => trans('messages.transaction_fail') ]);
        }
    }

    public function getTransactionDetail(Request $request){
        $user = \Auth::user();
    
        $data = TransactionDetail::where('user_id',$user->id)->with(['getBook','getTransaction'])->paginate(1000);
        
        $transaction_data    =   TransactionResource::collection($data);

        return response()->json(['status' => true , 'data' => $transaction_data]);
    }

    public function getUserPurchaseBookList() {
        $user = \Auth::user();
    
        $data = TransactionDetail::where('user_id', $user->id)
            ->whereHas('getTransaction', function ($q) {
                $q->where(function ($query) {
                    $query->where('payment_status', 'TXN_SUCCESS')
                        ->orWhere('payment_status', 1);
                });
            })
            ->get();
    
        $purchase_data = UserPurchasedBookResource::collection($data);
        $message = trans('messages.list_form_title', ['form' => 'Purchase Book']);
    
        return response()->json(["status" => true, "message" => $message, 'data' => $purchase_data]);
    }
    

    public function checkSumGenerator(Request $request){
        $order_data = $request->all();

        $data = paytm_checksum($order_data);
        return response()->json(['status' => true , 'data' => $data]);
    }

    public function generateClientToken(Request $request){

        $gateway = new Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);
        $user = \Auth::user()->id;

        $client_token = $gateway->clientToken()->generate([
            'merchantAccountId' => env('BRAINTREE_Merchant_Account_Id')
        ]);
        return response()->json(['status' => true ,'message' => '','data' => $client_token]);
    }

    public function braintreePaymentProcess (Request $request){
        $gateway = new Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);
        $user = \Auth::user()->id;
        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->payment_method_nonce,
            'merchantAccountId' => env('BRAINTREE_Merchant_Account_Id'),
            'options' => [
              'submitForSettlement' => True
            ]
        ]);

        return response()->json(['status' => true ,'message' => '','data' => $result]);


    }
}
