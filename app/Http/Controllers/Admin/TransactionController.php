<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Transaction;
use \App\TransactionDetail;
use \App\Book;
use \App\UserAddress;
use \App\User;
use Datatables;

class TransactionController extends Controller
{
    public function index()
    {
        $pageTitle="Sales";
        return view('Admin.users.user-transaction-list',compact('pageTitle'));
    }

    public function list($user_id = "", $limit="")
    {
        $transactiondata =  Transaction::orderBy("transaction_id","DESC");
        if($user_id != "" && $user_id != "-1"){
            $transactiondata->where("user_id", $user_id);
        }
        if($limit != ""){
            $transactiondata->take($limit);
        }
        $transactiondata->whereNull("deleted_at");

        $transactiondata->withTrashed();
        return Datatables::eloquent($transactiondata)
        ->editColumn('created_at', function ($transactiondata) {
            return isset($transactiondata->created_at) ? date('Y-m-d',strtotime($transactiondata->created_at)) : '-';
        })
        ->editColumn('txn_order_id', function ($transactiondata) {
            $tran_detail_temp = json_decode($transactiondata->other_transaction_detail);
            return optional($tran_detail_temp)->TXN_ORDER_ID;
        })
        ->editColumn('txn_id', function ($transactiondata) {
            return optional($transactiondata)->txn_id;
        })
        ->editColumn('order_by', function ($transactiondata) {
            return ucwords(optional($transactiondata->getUser)->name);
        })
        ->editColumn('total_amount', function ($transactiondata) {
            return money(optional($transactiondata)->total_amount);
        })

        ->editColumn('payment_type', function ($transactiondata) {
            $payment_type = $transactiondata->payment_type;
            if($transactiondata->txn_id != "null" && $transactiondata->txn_id != null) {
                switch($payment_type){
                    case 1 :
                        return 'SSL COMMERZ';
                        break;
                    case 2 :
                        return 'Paypal';
                        break;
                    default :
                        return "-";
                        break;
                }
            }
        })
        ->filterColumn('order_by', function($transactiondata, $keyword) {
            $transactiondata->orWhereHas('getUser',function($q) use($keyword){
                $q->where('name','like',"%{$keyword}%");
            });
        })
        ->editColumn('payment_status' , function ($transactiondata){
            $payment_status = ucwords(str_replace("_"," " ,$transactiondata->payment_status));
            if($payment_status != null && $transactiondata->payment_type == 1){
                $payment_status = $payment_status;
            }
            if($transactiondata->txn_id == "null" || $transactiondata->txn_id == null) {
                $payment_status = trans('messages.transaction_fail');
            }
            return $payment_status;
        })

        ->editColumn('action', function ($transactiondata) {
            return '
                <a href="'.route('transactions.view',['id'=>$transactiondata->transaction_id]).' " title = "'. trans('messages.view') .'" class="btn btn-sm btn-info mr-05">
                    <i class="fa fa-eye "></i>
                </a>';
        })

        ->addIndexColumn()
        ->rawColumns(['image','transaction', 'book_name','order_by','action','payment_status'])
        ->toJson();
    }

    public function view($id){
        $pageTitle =  trans('messages.form_detail', ['form' => trans('messages.transaction')]);
        // language file changed only in "en", all the others also needs to be changed

        $transaction_data = Transaction::where('transaction_id', $id)->first();
        $user_data = User::where('id', $transaction_data->user_id)->first();

        $transaction_data->payment_status = ucwords(str_replace("_"," " ,$transaction_data->payment_status));

        $tran_detail_temp = json_decode($transaction_data->other_transaction_detail);
        $transaction_data['order_id'] = $tran_detail_temp->TXN_ORDER_ID;

        $payment_type = $transaction_data->payment_type;
        if($transaction_data->txn_id != "null" && $transaction_data->txn_id != null) {
            switch($payment_type){
                case 1 :
                    $transaction_data->payment_type_string = 'SSL COMMERZ';
                    break;
                case 2 :
                    $transaction_data->payment_type_string = 'Paypal';
                    break;
                default :
                    $transaction_data->payment_type_string = "-";
                    break;
            }
        }

        // transaction detail to get list of book ids
        $transaction_details = TransactionDetail::where('transaction_id', $transaction_data->transaction_id)->get();
        $book_ids = [];
        $total['price'] = 0;
        $total['discount'] = 0;
        foreach ( $transaction_details as $value){
            array_push($book_ids, $value->book_id);
            $total['price'] += $value->price;
            $total['discount'] += $value->price * $value->discount / 100;
        }
        $book_list = Book::whereIn('book_id', $book_ids)->select(['book_id', 'name', 'front_cover'])->get();        
        // $book_list = Book::whereIn('book_id', $book_ids)->get();        

        // dd($id, $pageTitle, $transaction_data->toArray(), $user_data->toArray(), $transaction_details->toArray(), $book_ids, $book_list->toArray(), $total);
        return view("Admin.users.user-transaction-view", compact('transaction_data', 'user_data', 'pageTitle', 'transaction_details', 'book_list', 'total'));
    }

    public function updatePaymentStatus($id,$status,Request $request)
    {
        $auth_user=authSession();
        if($auth_user->is('demo_admin') || $auth_user->is('demo_admin')){
            return redirect()->back()->withSuccess(trans('messages.demo_permission_denied'));
        }
        $result = Transaction::where('transaction_id',$id)->update(['status' => $status]);

        if($result) {
            $message = trans('messages.update_form',['form' => 'Payment status ']);
        } else {
            $message =  trans('messages.not_updated',['form' => 'Payment']);
        }

        return redirect(route('transactions.index'))->withSuccess($message);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $pageTitle = "Shipping Address";
        $address = UserAddress::where('user_address_id',$id)->first();

        // $address = Transaction:: where('transaction_id',$id)->first()->shipping_address;
        
        return view('Admin.users.transaction-shipping-address',compact('pageTitle','address'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
