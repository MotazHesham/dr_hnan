@extends('layouts.frontend')
@section('content')
    <!-- On change section animation -->
    <div class="logo"> <img src="{{ asset('frontend/assets/img/logo-colored.png') }}"> </div>

    <div class="logo-colored"> <img src="{{ asset('frontend/assets/img/logo-colored.png') }}"> </div>



    <div id="overlay_shine"></div>

    <!-- Loader -->
    <div id="ms-overlay">
        <div class="ms-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <style>
        body {
            overflow-x: hidden;
        }

        .profile-detail .item {
            visibility: hidden;
            display: none;
        }

        .profile-detail h2 {
            font-size: 30px;
            margin: 0;
            color: #3a3a3a;
            text-align: left;
        }

        >.profile-detail div {
            min-height: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: flex-end;
            font-weight: bold;
            color: orange;

            &:after {
                content: "";
                width: 10px;
                height: 4px;
                display: block;
                background: black;
                color: orange;
                margin-bottom: 4px;
                margin-left: 2px;
                animation-duration: 350ms;
                animation-name: fade;
                animation-direction: alternate;
                animation-iteration-count: infinite;
            }
        }
        }

        @keyframes fade {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>

    <!-- Header navigation section -->
    <header>
        <div class="sidebar-title">
            <h5>القائمة</h5>
            <a href="javascript:void(0)" class="nav-close"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        <nav class="ms-navigation">
            <div>
                <ul>
                    <li><a href="javascript:void(0)" class="navs-link nav-home" data-section="ms-home"><i
                                class="fa fa-home"></i><span>الرئيسية</span></a><span
                            class="noty"><span>الرئيسية</span></span></li>
                    <li><a href="javascript:void(0)" class="navs-link nav-about" data-section="ms-about-section"><i
                                class="fa fa-user"></i><span>من نحن</span></a><span class="noty"><span>من
                                نحن</span></span></li>

                    <li><a href="javascript:void(0)" class="navs-link nav-team" data-section="ms-team-section"><i
                                class="fa fa-users"></i><span> مستشارينا</span></a><span class="noty"><span>مستشارينا
                            </span></span></li>
                    <li><a href="javascript:void(0)" class="navs-link nav-team" data-section="ms-partners-section"><i
                                class="fa fa-handshake"></i><span> شركاء النجاح</span></a><span class="noty"><span>شركاء النجاح
                            </span></span></li>

                    <li><a href="javascript:void(0)" class="navs-link nav-experience"
                            data-section="ms-experience-section"><i
                                class="fa fa-briefcase"></i><span>خدماتنا</span></a><span
                            class="noty"><span>خدماتنا</span></span></li>
                    <li><a href="javascript:void(0)" class="navs-link nav-training" data-section="ms-training-section"><i
                                class="fa fa-leanpub"></i><span>تدريب</span></a><span
                            class="noty"><span>تدريب</span></span></li>


                    <li><a href="javascript:void(0)" class="navs-link nav-news" data-section="ms-news-section"><i
                                class="fas fa-newspaper"></i><span>الاخبار</span></a><span
                            class="noty"><span>الاخبار</span></span></li>
                    <li><a href="javascript:void(0)" class="navs-link nav-join" data-section="ms-join-section"><i
                                class="fa fa-handshake-o"></i><span>انضم الينا</span></a><span class="noty"><span>انضم
                                الينا</span></span></li>

                    <li><a href="javascript:void(0)" class="navs-link nav-know" data-section="ms-knowledge-section"><i
                                class="fa fa-book"></i><span>مركز المعرفة </span></a><span class="noty"><span> مركز
                                المعرفة</span></span></li>

                    <li><a href="javascript:void(0)" class="navs-link nav-contact" data-section="ms-contact-section"><i
                                class="fa fa-envelope"></i><span>تواصل معنا</span></a><span class="noty"><span>تواصل
                                معنا</span></span></li>
                </ul>
            </div>
        </nav>
        <ul class="ms-social">
            <li><a class="ms-btn-1" href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </li>
            <li><a class="ms-btn-1" href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a class="ms-btn-1" href="#" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </li>
        </ul>
    </header>

    <div class="header-overlay"></div>
    <a href="javascript:void(0)" class="nav-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
    <!-- End Header navigation section -->

    <!-- Home section -->
    <section class="ms-home ms-slide home-section ">
        <div class="container-fluid p-0">
            <div class="ms-row">
                <div class="col-lg-12 col-md-12 border-content">
                    <div class="profile-img " id="particles-js">

                        <div class="profile-detail">
                            <h1>

                                <span> برامج متخصصة لتطوير جودة الحياة الوظيفية </span>
                                <br />

                                <div data-text></div>


                                <div class="home-programs  wow   bounceInLeft" class="" data-wow-duration="1s"
                                    data-wow-delay="4s "> برنامج الحوكمة </div>
                                <div class="home-programs  wow   bounceInRight" class="" data-wow-duration="1s"
                                    data-wow-delay="3s "> برنامج تطوير الأعمال والتميز المؤسسي</div>
                                <div class="home-programs  wow   bounceIn" class="" data-wow-duration="1s"
                                    data-wow-delay="2s "> برنامج الجودة وتطوير الأداء</div>
                                <div class="home-programs  wow   bounceInRight " class="" data-wow-duration="1s"
                                    data-wow-delay="1s "> برنامج تطوير الموارد البشرية</div>



                            </h1>


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Home section End -->

    
    @include('frontend.partials.about_us')
    @include('frontend.partials.services')
    @include('frontend.partials.news')
    @include('frontend.partials.consultants')
    @include('frontend.partials.partners')
    @include('frontend.partials.courses')
    @include('frontend.partials.quotations') 
    @include('frontend.partials.knowledge_center') 
    @include('frontend.partials.joining') 
    @include('frontend.partials.contact_us') 

@endsection
