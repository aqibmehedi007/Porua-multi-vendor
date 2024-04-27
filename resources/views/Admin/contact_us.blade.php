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
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body py-lg-5">
		 <p>
Welcome to saifursbooks.com Privacy Policy
Porua, accessible from https://phplaravel-785839-3676821.cloudwaysapps.com/ one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Porua and how we use it.
If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.

You are advised to read the Privacy Policy carefully. By accessing the services provided by phplaravel-785839-3676821.cloudwaysapps.com you agree to the collection and use of your data by phplaravel-785839-3676821.cloudwaysapps.com in the manner provided in this Privacy Policy.

This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collected in Porua. This policy is not applicable to any information collected offline or via channels other than this website.

Consent
By using our website, you hereby consent to our Privacy Policy and agree to its terms.
Information we collect
The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information. If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide. When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.
How we use your information
We use the information we collect in various ways, including to:

    Provide, operate, and maintain our website.
    Improve, personalize, and expand our website.
    Understand and analyze how you use our website.
    Develop new products, services, features, and functionality.
    Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes.
    Send you emails.
    Find and prevent fraud.

Log Files
 Porua follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting service's analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking user's; movement on the website, and gathering demographic information. Our Privacy Policy was created with the help of the Privacy Policy Generator and the Disclaimer Generator.
Cookies and Web Beacons
Like any other website,  Porua use's; cookies;. These cookies are used to store information including visitor's; preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the user's; experience by customizing our web page content based on visitor's; browser type and/or other information.
Google Double Click DART Cookie
Google is one of the third-party vendors on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to Porua and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL: https://policies.google.com/technologies/ads.
Content Liability
Removal of links from our website If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly. We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date. As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.
</p>
                </div>
            </div>
        </div>
    </div>
@endsection
