@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" >
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <div class="terms-wrapper">
        <div class="header animated fadeIn">
            <div class="parrallax-contents animated fadeInLeftBig">
                <h3 class="">Terms and Conditions</h3>
            </div>
        </div>
        <div class="terms-body container">
            <h4>RULES OF USAGE FOR BLUUMHEALTH</h4>
            <p>If you must post something to the web app such as content, comments, etc. <b>YOU
                    MUST NOT.</b></p>
            <ul style="list-style: unset;">
                <li><p>Participate in the use of strong, vulgar, obscene or otherwise harmful language against other users.</p></li>
                <li><p>Treat other users as less of individuals in your use of the web app and its services Be derogatory, racial, bias ethnically or otherwise, objectionable language for other users.</p></li>
                <li><p>Defame (i.e., something that is negative and untrue about another person or entity) Divulge another person&#39;s or entity&#39;s confidential or private information in the process of using the web app and its services.</p></li>
                <li><p>Encourage criminal conduct or be a part of fraudulent activities on the web app and its services.</p></li>
                <li><p>Advertise or solicit business for products or services other than those that are offered and promoted on the Site.</p></li>
                <li><p>Default from any of her rules of usage to have an enjoyable user experience on the web app.</p></li>
            </ul>
            <p><b>You also must comply with all applicable laws and contractual obligations when you use the Site.</b></p>
            <p><b>FOR CONTENTS,IDEAS AND CREATIVITY.</b></p>
            <p>We appeal to you not to send us your ideas/contents or any form of input into the
                    business. We are always constantly thinking, innovating and creating to give you the
                    service you deserve and desire, as we may have similar ideas of our own of what
                    you’ve sent to us. To avoid any disputes or disagreement between us relating to ideas
                    that you have submitted to us you agree that, if you send us your ideas/contents, you
                    are assigning to us the right to use them, and you waive and release us from claims
                    that we have used your ideas without your permission.</p>
            <p><b>IF YOU MUST SUBMIT A CONTENT:</b></p>
            <p><b>SUBMISSION GUIDELINES</b></p>
            <ul style="list-style: unset;">
                <li><p>We accept only electronic submissions via email ( bluumhealth@gmail.com )</p></li>
                <li><p>Please include a short biography in your submission.</p></li>
                <li><p>Your subject should include the genre you are submitting to and your full name. e.g. Article, Ciroma Thatcher).</p></li>
                <li><p>All submissions should be forwarded as attachments.</p></li>
                <li><p>We are interested in original, unpublished pieces.</p></li>
                <li><p>Please, send not more than 5 pieces in any genre per submission.</p></li>
                <li><p>Works in translation are also welcome as long we will have the rights to publish</p></li>
                <li><p>Should your work be published in a collection at a later date, we’d appreciate the standard acknowledgment.</p></li>
                <li><p>We acknowledge all submissions immediately they are sent, but wait for 7days at most to receive our feedback.</p></li>
                <li><p>If published by Bluum blog, please wait for 1week before making another submission.</p></li>
                
            </ul>
        </div>
    </div>
    @include('widgets.footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/bootstrap4.min.js') }}" ></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection