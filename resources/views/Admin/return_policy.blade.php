@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-11 col-md-9">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent text-center">
                    <?php $setting =settingSession('set');?>
                    <div class="row">
                        <div class="col-md-12">

                            <img width="100px" src="{{ getSingleMedia($setting,'site_logo',null,'image',false) }}">
                        </div>
                        <div class="col-md-12">
                            <h2>Returns and Refunds Policy</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body py-lg-5">

                    <p>Please read this policy carefully. This is the Return and Refund Policy of Porua.</p>

                    <h3><strong> Digital products: </strong> </h3>
                    <p>You do not have to return anything as we sell digital products only.</p>

                    <p>
                        If you wish to get a refund, we issue refunds for digital products within two days of the original purchase of the product.<br>
                        Refunds may be issued only under certain circumstances.<br>
                        The eBook cover is different than the actual content of the eBook.<br>
                        If you are unable to read our eBook on your device.
                    </p>

                    <p>
                        Please note that eBooks are digital products.
                        To avoid fraud and invalid claims, we may refuse to provide a refund without showing any reason.
                    </p>

                    <p>We recommend you contact us if you need help with loading our products.</p>

                    <h3><strong>Contact us:</strong></h3>

                    <p>Please get in touch with us at email: info@porua.org
                        If you have any questions about our Returns and Refunds Policy.</p>

                    <p>Thank you for shopping at porua.org</p>

                </div>
            </div>
        </div>
    </div>
@endsection
