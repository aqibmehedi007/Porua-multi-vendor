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
                            <h2>Privacy Policy</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body py-lg-5">
                        <p>This SERVICE is provided by Technosoft Integration and is intended for use as is.</p>

                        <p>This page is used to inform visitors regarding our policies regarding the collection, use, and disclosure of Personal Information
                            if anyone decides to use our Service.</p>

                        <p>If you choose to use our Service, you must agree to the collection and use of information in relation to this policy.
                             The personal information that we collect is used to provide and improve the service.
                             We will not share your information with anyone except as described in this Privacy Policy.</p>

                        <p>The terms used in this Privacy Policy have the same meaning as mentioned
                            in the Terms and Conditions and are accessible by porua.org unless otherwise defined in this Privacy Policy.</p>

                        <h3><strong>Information Collection and Use</strong></h3>

                        <p>We may require you to provide us with certain personally identifiable information, including but not limited to email,
                            phone number, name, and age, for a better experience while using our Service.
                            The information that we request will be retained by us and will used as described in this privacy policy.</p>

                        <p>The app does use third-party services that may collect information used to identify you.</p>

                        <p>Link to the privacy policy of third-party service providers used by the app</p>
                        <ol>
                            <li>Google Play Services</li>
                            <li style="padding-top:10px">Google Analytics for Firebase</li>
                            <li style="padding-top:10px">Firebase Crashlytics</li>
                            <li style="padding-top:10px">Mix panel Analytics</li>
                        </ol>

                        <p>For promotional purposes, we may use the book reviews that you write on our Service.</p>

                        <h3><strong>Log Data</strong></h3>

                        <p>We inform you that whenever you use our Service, in the case of an error in the app, we collect data and information (through third-party products).
                            This Log Data may include information such as your device Internet Protocol ("IP") address, device name, operating system version,
                            the configuration of the app when utilizing our Service, the time and date of your use of the Service, and other statistics.</p>

                        <h3><strong>Cookies</strong></h3>

                        <p>Cookies are files with a small amount of data that are commonly used as anonymous unique identifiers.
                            These are sent to your browser from the websites that you visit and are stored on your device's internal memory.</p>

                        <p>This Service does not use these "cookies" explicitly. However, the app may use third-party code and libraries that use "cookies"
                            to collect information and improve their services. You have the option to either accept or refuse these cookies and know when a
                            cookie is being sent to your device. If you choose to refuse our cookies,
                            you may not be able to use some portions of this Service.</p>

                        <h3><strong>Service Providers</strong></h3>

                        <p>We may employ third-party companies and individuals due to the following reasons:</p>

                        <ul>
                            <li>To facilitate our Service.</li>
                            <li style="padding-top:10px">To provide the Service on our behalf.</li>
                            <li style="padding-top:10px">To perform Service-related services; or</li>
                            <li style="padding-top:10px">To assist us in analyzing how our Service is used.</li>
                        </ul>

                        <p>We want to inform users of this Service that these third parties have access to your Personal Information.
                            The reason is to perform the tasks assigned to them on our behalf.
                            However, they are obligated not to disclose or use the information for any other purpose.</p>

                        <h3><strong>Security</strong></h3>

                        <p>We value your trust in providing us with your Personal Information.
                            Thus, we are striving to use commercially acceptable means of protecting it.
                            But remember that no method of transmission over the internet or method of electronic storage is 100% secure and reliable,
                            and we cannot guarantee its absolute security.</p>

                        <h3><strong>Links to Other Sites</strong></h3>

                        <p>This Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that we do not operate these external sites. Therefore, we strongly advise you to review the privacy policies of these websites.
                            We have no control over and assume no responsibility for the content,
                            privacy policies, or practices of any third-party sites or services.
                        </p>

                        <h3><strong>Children&rsquo;s Privacy</strong></h3>


                        <p>These Services do not address anyone under the age of 18.
                            We do not knowingly collect personally identifiable information from children under 18.
                            In the case we discover that a child under 18 has provided us with personal information,
                            we immediately delete this from our servers. If you are a parent or guardian and you are aware that
                            your child has provided us with personal information,
                            please get in touch with us so that we can take the necessary actions.
                        </p>

                        <h3><strong>Delete your information</strong></h3>

                        <p>Our Services give you the ability to delete certain information about you from within the Service. We retain some information to provide you with a better service. If, for any reason, you wish to delete all your data from our Service,
                            please email us the User ID/Phone/Email of your account to info@porua.org.
                            After proper verification, we'll execute your request within 7 days.
                        </p>

                       <h3><strong>Changes to This Privacy Policy</strong></h3>

                        <p>We may update our Privacy Policy from time to time. Thus, you are advised to review this page periodically for any changes.
                            We will notify you of any changes by posting the new Privacy Policy on this page.
                            These changes are effective immediately after they are posted on this page.
                        </p>

                        <h3><strong>Contact Us</strong></h3>

                        <p>If you have any questions or suggestions about our Privacy Policy,
                            do not hesitate to contact us at info@porua.org
                        </p>
                </div>
            </div>
        </div>
    </div>
@endsection
