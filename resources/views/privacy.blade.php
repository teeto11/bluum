@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" >
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <div class="privacy-wrapper">
        <div class="header animated fadeIn">
            <div class="parrallax-contents animated fadeInLeftBig">
                <h3 class="">Privacy Policy</h3>
            </div>
        </div>
        
        <div class="container">
            <div class="privacy-body container">
                <h4>BluumHealth Privacy Statement</h4>
                <h5><b>Background</b></h5>
                <p>Bluumhealth primarily cares about your data and wants you to be aware with how we
                    collect, use, and disclose information. This privacy data policy describes our practices in
                    connection with information that we or our service providers collect through the website
                    (hereinafter the &quot;Service&quot;) operated and controlled by us from which you are accessing
                    this Privacy Policy. By providing personal information to us or by using the Service, you
                    acknowledge that you have read and understand this privacy policy and usage.
                </p>
                <h5><b>It’s likely that we’ll need to update this Privacy Policy from time to time and whilst
                    we’ll notify you of any significant changes, you’re welcome to come back and check
                    it whenever you wish. <br><br>
                    This was last updated on the 8th of December, 2018
                 </b></h5>
                 <p>We may ask you to submit personal information in order for you to benefit from certain
                    features (such as newsletter subscriptions, tips/pointers, etc) or to participate in a
                    particular activity (such as surveys or other promotions). You will be informed what
                    information is required and what information is optional.
                </p>
                <p>When you use our Website, we gather certain information about you including details of
                    your operating system, browser version, domain name and IP address, the website
                    (URL) you came from and go to and the parts of the Website you visit. We may also
                    gather statistics, traffic patterns and related website information to help us in our
                    analytics and processes.
                </p>
                <h5>Cookies</h5>
                <p>We use cookies to identify you as a User and make your user experience easier,
                    customise our services, content and advertising; help you ensure that your account
                    security is not compromised, mitigate risk and prevent fraud; and to promote trust and
                    safety on our website. Cookies allow our servers to remember your account log-in
                    information when you visit our website, IP addresses, reference IDs, date and time of
                    visits, monitor web traffic and prevent fraudulent activities.
                </p>
                <h5>Safeguard</h5>
                <p>The safeguard of your details is very important to us, and we take all reasonable steps to
                    protect your details.  We cannot guarantee the safeguard of any details you disclose
                    online and any transmission of your details is at your own risk. You accept the inherent
                    security implications of providing information online and will not hold us responsible
                    for any breach of security unless we have been careless or in wilful default.
                </p>
                <h5>Disclaimer</h5>
                <p>All users of the Site are required to comply with these terms and Conditions and privacy
                    policy.
                </p>
                <p>Some sections of the Site consist of information posted by third parties. As a result,
                    Bluumhealth accepts no liability in respect of the accuracy or truthfulness of any advice,
                    information or data posted online or any responsibility for the consequences of your
                    acting in reliance on such information, neither does Bluumhealth necessarily endorse,
                    support, sanction, encourage or agree with the comments, opinions or statements posted
                    by users on the Site. Any information or material placed online by users, including
                    advice and opinions, is the view and responsibility of those users and does not
                    necessarily represent the view of Bluumhealth.
                </p>
                <p>It is solely your responsibility to evaluate the accuracy, completeness, usefulness and
                    fitness for any purpose of all details of opinions, advice, services and other information
                    provided on the Site. In particular, if you have a health problem during pregnancy, or if
                    your baby or child is ill, we strongly advise you to consult a doctor and not to rely on
                    advice contained on this site as it represents the opinions/views of third parties. Do not
                    use any medicines or tablets without first asking your doctor or pharmacist whether the
                    medication is safe for pregnant women or children.
                </p>
                <p>Feel free to contact us at any point if there are or</p>
                <ol style="list-style:decimal; padding: 5px 0px 5px 35px;">
                    <li><p>Questions or feedback about this notice</p></li>
                    <li><p>Would like us to stop using your information</p></li>
                </ol>
                <p><b>contact@bluumhealth.com</b></p>
            </div>
        </div>
    </div>
    @include('widgets.footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/bootstrap4.min.js') }}" ></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection