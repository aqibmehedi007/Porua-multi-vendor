@extends('layouts.master')

@section('content')
<style>
    .text-right {
        text-align: right;
    }
    .table-border-top-none{
        border-top: none !important;
    }
</style
    {{-- New Design --}}
    <div class="row">
        <div class="col-xl-12 order-xl-1 mb-5 mb-xl-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header bg-secondary border-0">
                            <h3>{{ trans('messages.transaction') }} {{ trans('messages.detail') }}</h3>
                        </div>
                        <div class="card-body">
                            {{-- first part --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group focused">
                                        {!!Form::label('User',trans('messages.User').' : ',array('class'=>'form-control-label'))!!}
                                        <label>{{isset($user_data->name)? $user_data->name :'-'}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group focused">
                                        {!!Form::label('email',trans('messages.email').' :',array('class'=>'form-control-label'))!!}
                                        <label>{{isset($user_data->email) ? $user_data->email:'-'}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group focused">
                                        {!!Form::label('date_time',trans('messages.date_time').' : ',array('class'=>'form-control-label'))!!}
                                        <label>{{isset($transaction_data->datetime)? $transaction_data->datetime :'-'}}</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group focused">
                                        {!!Form::label('amount',trans('messages.amount').' : ',array('class'=>'form-control-label'))!!}
                                        <label>{{isset($transaction_data->total_amount)? money($transaction_data->total_amount) :'-'}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group focused">
                                        {!!Form::label('transaction_id',trans('messages.transaction_id').' :',array('class'=>'form-control-label'))!!}
                                        <label>{{isset($transaction_data->txn_id) ? $transaction_data->txn_id :'-'}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group focused">
                                        {!!Form::label('transaction_status',trans('messages.transaction_status').' :',array('class'=>'form-control-label'))!!}
                                        <label>{{isset($transaction_data->payment_status) ? $transaction_data->payment_status :'-'}}</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group focused">
                                        {!!Form::label('payment_type',trans('messages.payment_type').' : ',array('class'=>'form-control-label'))!!}
                                        <label>{{isset($transaction_data->payment_type_string)? $transaction_data->payment_type_string :'-'}}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group focused">
                                        {!!Form::label('order_id',trans('messages.order_id').' : ',array('class'=>'form-control-label'))!!}
                                        <label>{{isset($transaction_data->order_id)? $transaction_data->order_id :'-'}}</label>
                                    </div>
                                </div>                                

                            </div>
                        </div>

                        {{-- middle part --}}
                        <div class="card-header bg-secondary border-0">
                            <h3>{{ trans('messages.book') }} {{ trans('messages.information') }}</h3>  
                        </div>
                        <div class="card-body" style="padding-top:0;">
                            <div class="row">
                                <table class="table">
                                    <tr style="font-weight: bold;">
                                        <td>SL</td>
                                        <td>Image</td>
                                        <td>Book Name</td>
                                        <td class="text-right">Price (Tk.)</td>
                                        <td class="text-right">Discount (Tk.)</td>
                                        <td class="text-right">Discounted Price (Tk.)</td>
                                    </tr>
                                    @foreach ($transaction_details as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td>
                                                <img class="img-rounded dashboard-image" border="0" width="40" src="{{ getSingleMedia($book_list[$key], 'front_cover' ,null) }}" alt="logo" />
                                            </td>
                                            <td> {{ $book_list[$key]->name }} </td>
                                            <td class="text-right"> {{ isset($item->price)? $item->price :'-' }} </td>
                                            <td class="text-right"> {{ isset($item->discount)? $item->price * $item->discount / 100 :'-' }} </td>
                                            <td class="text-right"> {{ isset($item->price)? $item->price - $item->price * $item->discount / 100 :'-' }} </td>
                                            
                                        </tr>
                                    @endforeach
                                </table>

                                {{-- last part --}}
                                <table class="table">
                                    <tr >
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right" style="font-weight: bold;">{{ trans('messages.sub') }} {{ trans('messages.total') }}</td>
                                        <td class="text-right">{{ isset($total['price'])? money($total['price']) :'-' }}</td>
                                    </tr>
                                    <tr >
                                        <td class="table-border-top-none"></td>
                                        <td class="table-border-top-none"></td>
                                        <td class="table-border-top-none"></td>
                                        <td class="table-border-top-none"></td>
                                        <td class="table-border-top-none"></td>
                                        <td class="text-right table-border-top-none" style="font-weight: bold;">{{ trans('messages.discount') }}</td>
                                        <td class="text-right table-border-top-none">{{ isset($total['discount'])? money($total['discount']) :'-' }}</td>
                                    </tr>
                                    <tr style="font-weight: bold;">
                                        <td class="table-border-top-none"></td>
                                        <td class="table-border-top-none"></td>
                                        <td class="table-border-top-none"></td>
                                        <td class="table-border-top-none"></td>
                                        <td class="table-border-top-none"></td>
                                        <td class="text-right table-border-top-none"><h2>{{ trans('messages.total') }}</h2></td>
                                        <td class="text-right table-border-top-none"><h2> {{ isset($total['price'])? money($total['price'] - $total['discount']) :'-' }} </h2> </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    
@endsection