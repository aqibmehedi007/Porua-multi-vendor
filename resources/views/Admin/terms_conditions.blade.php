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
                            <h2>Terms & Conditions</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body py-lg-5">
                    <p>By downloading or using this Porua app, these terms will automatically apply to you.
                    You should read them carefully before using the app. </p>
                    <p>You're not allowed to copy or modify the app, any part of the app, or our trademarks in any way.
                        You're not allowed to attempt to extract the source code of the app, and you also shouldn't try to translate the app into
                        other languages or make derivative versions. The app itself and all the trademarks, copyright, database rights, and
                        other intellectual property rights related to it still belong to Technosoft Integration.
                        Technosoft Integration is committed to ensuring that the app is as valuable and efficient as possible.
                        For that reason, we reserve the right to make changes to the app or to charge for its services at any time and for any reason.
                        We will only charge you for the app or its services if we make it very clear to you exactly what you're paying for.
                    </p>

                    <p>The Porua app stores and processes personal data that you have provided to us to provide our Service.
                        It's your responsibility to keep your phone and access to the app secure. We therefore recommend that you do not jailbreak or root your phone,
                        which is the process of removing software restrictions and limitations imposed by your device's official operating system.
                        It could make your phone vulnerable to malware/viruses/malicious programs,
                        compromise your phone's security features, and it could mean that the Porua app won't work properly or at all.</p>

                    <p>You should be aware that there are certain things that Technosoft Integration will not take responsibility for.
                        Certain functions of the app will require the app to have an active internet connection.
                        The connection can be Wi-Fi or provided by your mobile network provider.
                        Still, Technosoft Integration can only take responsibility
                        for the app working at full functionality if you have access to Wi-Fi and you have all of your data allowance left.</p>

                    <p>If you're using the app outside of an area with Wi-Fi,
                        you should remember that the terms of the agreement with your mobile network provider will still apply.
                        As a result, you may be charged by your mobile provider for the cost of data for the duration of the connection while accessing the app
                        or other third-party charges. In using the app, you're accepting responsibility for any such charges, including roaming data charges,
                        if you use the app outside of your home territory (i.e., region or country) without turning off data roaming.
                        If you are not the bill payer for the device on which you're using the app,
                        please be aware that we assume that you have received permission from the bill payer to use the app.
                        Along the same lines, Technosoft Integration can only sometimes take responsibility for the way you use the app, i.e.,
                        You need to make sure that your device stays charged. If it runs out of battery and you can't turn it on to avail of the Service,
                        Technosoft Integration cannot accept responsibility.</p>

                    <p>With respect to Technosoft Integration's responsibility for your use of the app, when you're using the app,
                        it's essential to bear in mind that although we endeavor to ensure that it is updated and always correct,
                        we do rely on third parties to provide information to us so that we can make it available to you.
                        Technosoft Integration accepts no liability for any loss, direct or indirect; you experience because of relying wholly on this app functionality.</p>

                    <p>We may wish to update the app. The app is currently available on Android & iOS – the requirements for both systems
                        (and for any additional systems we decide to extend the availability of the app to) may change.
                        You'll need to download the updates if you want to keep using the app.
                        Technosoft Integration does not promise that it will constantly update the app so that it is relevant to you and works with the
                        Android & iOS versions that you have installed on your device.
                        However, you promise always to accept updates to the application when offered to you;
                        we may also wish to stop providing the app and may terminate your use of it at any time without giving notice of termination to you.
                        Unless we tell you otherwise, upon any termination,
                        (a) the rights and licenses granted to you in these terms will end;
                        (b) you must stop using the app and (if needed) delete it from your device.</p>

                    <h3><strong>Changes to This Terms and Conditions: </strong></h3>
                    <p>We may update our Terms and Conditions from time to time. Thus, you are advised to review this page periodically for any changes.
                        We will notify you of any changes by posting the new Terms and Conditions on this page.
                        These changes are effective immediately after they are posted on this page </p>

                    <h3><strong>Contact Us:</strong></h3>
                    <p>If you have any questions or suggestions about our Terms and Conditions,
                        do not hesitate to contact us at info@porua.org</p>
                </div>
            </div>
        </div>
    </div>
@endsection
