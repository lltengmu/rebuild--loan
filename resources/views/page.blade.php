<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="{{ config('app.assets_path') }}/assets/bootstrap-4.6.1-dist/css/bootstrap.css">

<style>
    body {
        background-color: gainsboro;
        color: #333333;
        background-color: white;
    }

    .header {
        width: 100% !important;
        height: 150px;
        position: fixed;
        z-index: 999;
        top: 0;
        box-shadow: 0px 7px 15px 0px rgb(0 0 0 / 40%);
    }

    #navbarText {
        margin-top: 2%;
    }

    #navbarText ul:first-child>li {
        list-style: none;
        display: inline-block;
        cursor: pointer;
        padding: 30px 40px;

    }


    #navbarText>ul {
        flex-direction: row;
    }

    #navbarText a {
        color: #333333;
        text-decoration: none;
    }

    .container {
        margin-top: 150px;
    }

    .carousel-indicators li {
        border-radius: 100%;
        width: 15px !important;
        height: 15px !important;
        margin-left: 7px !important;
        margin-right: 7px !important;
        background-color: white !important;
        opacity: 1;
    }

    .carousel-indicators .active {
        opacity: 1;
        background-color: red !important;
    }

    .parent>ul {
        display: none;
        padding-left: 20px;
        position: absolute;
        list-style: none;
        cursor: pointer;
        background: white;
        top: 116px;
        left: auto;
        width: 275px;
        z-index: 100;
        transition: opacity .5s linear;
        margin-left: -43px;
        margin-top: 34px;
        padding: 0;
        box-shadow: 0px 15px 30px 0px rgb(0 0 0 / 40%);
    }

    .parent>ul>li {
        padding: 7px 43px;
        text-align: left;
        background: white;
    }

    .parent>ul>li:first-child {
        border-top: 15px solid white;
    }
</style>

<body>
    <div class="header  bg-white">
        <nav class="navbar-light">
            <a class="navbar-brand text-center" style="width: 100%">Fully Great Asia</a>
            <div class="text-center" id="navbarText">
                <ul>
                    <li class="parent"><span>???????????? </span>
                        <ul>
                            <li><a href="https://www.uaf.com.hk/tc/loans">??????????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/loans/welcome-offer">??????????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/loans/yesua-mobileapp">UA??????Click?????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/loans/imoney-loan">i-Money ?????????????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/loans/no-show-loan">???NO SHOW???????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/loans/ecash-revolving-loan">e-Cash ??????????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/loans/debts-consolidation-loan">???????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/loans/personal-tax-loan">????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/loans/property-owners-loan">??????????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/loans/sme-loan">???????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/loans/decoration-loan">UA x ???????????????????????????????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/loans/student-loan">?????????????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/loans/corporate-tax-loan">?????????????????????</a></li>
                            <li><a href="http://www.uaf.com.hk/owl" target="_blank">Overseas Workers Loans</a></li>
                        </ul>
                    </li>
                    <li class="parent"><span>???????????? </span>
                        <ul>
                            <li><a href="https://www.uaf.com.hk/loans-confirmation" target="_blank">????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/login/#/tc/prioritised-approval"
                                    target="_blank">????????????????????????</a></li>
                        </ul>
                    </li>
                    <li class="parent"><a href="https://www.uaf.com.hk/tc/bonus-points-program"
                            target="_blank">???FUN????????????
                        </a></li>
                    <li class="parent"><a href="https://www.uaf.com.hk/tc/members-get-members-program"
                            target="_blank">??????????????? </a></li>
                    <li class="parent"><a href="https://www.uaf.com.hk/tc/loans/docs-submission">?????????????????? </a></li>
                    <li class="parent"><span>???????????? </span>
                        <ul>
                            <li><a href="https://www.uaf.com.hk/tc/journey-of-innovation-yes-ua">UA ????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/about-us/company-overview">????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/about-us/latest-news">????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/about-us/corporate-social-responsibility">??????????????????</a>
                            </li>
                            <li><a href="https://www.uaf.com.hk/tc/about-us/company-activities">????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/about-us/uaf-china" target="_blank">????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/about-us/job-openings">????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/about-us/contact-us">????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/about-us/cooperation-opportunities">????????????</a></li>
                            <li><a href="https://www.uaf.com.hk/tc/about-us/branches">????????????</a></li>
                        </ul>
                    </li>
                    {{-- <li class="fixedShow"><a href="https://www.uaf.com.hk/tc/about-us/branches">???????????? </a></li> --}}
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="{{ url('form') }}"><img
                                    src="{{ config('app.assets_path') }}{{ $imgsrc[0]->template_photo }}"
                                    class="d-block w-100 rounded" width="100%" style="max-width: 100%" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <a href="{{ url('form') }}"><img
                                    src="{{ config('app.assets_path') }}{{ $imgsrc[0]->template_photo }}"
                                    class="d-block w-100 rounded" width="100%" style="max-width: 100%" alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <a href="{{ url('form') }}"><img
                                    src="{{ config('app.assets_path') }}{{ $imgsrc[0]->template_photo }}"
                                    class="d-block w-100 rounded" width="100%" style="max-width: 100%" alt="..."></a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 text-center">
                <h1 class="text-break">
                    {{ $imgsrc[0]->template_text }}
                </h1>
            </div>
        </div>
    </div>
    <script src="{{ config('app.assets_path') }}/assets/js/jQuery3.6.0.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/bootstrap-4.6.1-dist/js/bootstrap.js"></script>
</body>
<script>
    $('.parent').mousemove(function() {
        $(this).children('ul').show();
    })
    $('.parent').mouseout(function() {
        $(this).children('ul').hide();
    });
</script>

</html>
