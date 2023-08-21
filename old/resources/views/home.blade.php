<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta content="width=device-width, initial-scale=1 , minimum-scale=1.0" name="viewport" />

    <title>مكتب د.حنان درويش عابد </title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- site Favicon -->
    <link rel="icon" href="{{asset('assets/img/favicon/favicon.png')}}" sizes="32x32" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery.fancybox.min.css')}}" />

    <!-- Main Style -->
    <link href="assets/fonts/transfonter.org-20230331-210459/stylesheet.css" rel="stylesheet">

    <link rel="stylesheet" id="main_style" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />


    <link href="assets/css/model.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


    <!----animate--->
{{--    <link rel="stylesheet" href="assets/css/animate.css">--}}
{{--    <script src="assets/js/wow.min.js"></script>--}}
{{--    <script>--}}
{{--        new WOW().init();--}}
{{--    </script>--}}
    <!----animate--->

</head>

<body class="body-bg" style="overflow: scroll;">


<!-- On change section animation -->
<div class="logo">   <img src="assets/img/logo-colored.png" >   </div>

<div class="logo-colored">   <img src="assets/img/logo-colored.png" >   </div>



<div id="overlay_shine"></div>

<!-- Loader -->
<div id="ms-overlay">
    <div class="ms-roller">
        <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
    </div>
</div>


<style>
    body { overflow-x: hidden;}
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
    }

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
                <li><a href="javascript:void(0)" class="navs-link nav-home" data-section="ms-home"><i class="fa fa-home"></i><span>الرئيسية</span></a><span class="noty"><span>الرئيسية</span></span></li>
                <li><a href="javascript:void(0)" class="navs-link nav-about" data-section="ms-about-section"><i class="fa fa-user"></i><span>من نحن</span></a><span class="noty"><span>من نحن</span></span></li>

                <li><a href="javascript:void(0)" class="navs-link nav-team" data-section="ms-team-section"><i class="fa fa-users"></i><span> مستشارينا</span></a><span class="noty"><span>مستشارينا </span></span></li>

                <li><a href="javascript:void(0)" class="navs-link nav-experience" data-section="ms-experience-section"><i class="fa fa-briefcase"></i><span>خدماتنا</span></a><span class="noty"><span>خدماتنا</span></span></li>
                <li><a href="javascript:void(0)" class="navs-link nav-training" data-section="ms-training-section"><i class="fa fa-leanpub"></i><span>تدريب</span></a><span class="noty"><span>تدريب</span></span></li>


                <li><a href="javascript:void(0)" class="navs-link nav-news" data-section="ms-news-section"><i class="fas fa-newspaper"></i><span>الاخبار</span></a><span class="noty"><span>الاخبار</span></span></li>
                <li><a href="javascript:void(0)" class="navs-link nav-join" data-section="ms-join-section"><i class="fa fa-handshake-o"></i><span>انضم الينا</span></a><span class="noty"><span>انضم الينا</span></span></li>

                <li><a href="javascript:void(0)" class="navs-link nav-know" data-section="ms-knowledge-section"><i class="fa fa-book"></i><span>مركز المعرفة </span></a><span class="noty"><span> مركز المعرفة</span></span></li>

                <li><a href="javascript:void(0)" class="navs-link nav-contact" data-section="ms-contact-section"><i class="fa fa-envelope"></i><span>تواصل معنا</span></a><span class="noty"><span>تواصل معنا</span></span></li>
            </ul>
        </div>
    </nav>
    <ul class="ms-social">
        <li><a class="ms-btn-1" href="https://www.instagram.com/hdacsa2023_/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        <li><a class="ms-btn-1" href="https://twitter.com/hdacsa2023" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a class="ms-btn-1" href="https://www.linkedin.com/in/hd-ac-sa-31b232277/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
    </ul>
</header>

<div class="header-overlay"></div>
<a href="javascript:void(0)" class="nav-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
<!-- End Header navigation section -->

<!-- Home section -->
<section class="ms-home ms-slide home-section "  >
    <div class="container-fluid p-0">
        <div class="ms-row">
            <div class="col-lg-12 col-md-12 border-content">
                <div class="profile-img " id="particles-js">

                    <div class="profile-detail" >
                        <h1>

                            <span>  برامج متخصصة لتطوير جودة الحياة المؤسسية </span>
                            <br />

                            <div data-text></div>


                            <div class="home-programs  wow   bounceInLeft" class="" data-wow-duration="1s" data-wow-delay="4s "> برنامج الحوكمة  </div>
                            <div class="home-programs  wow   bounceInRight" class="" data-wow-duration="1s" data-wow-delay="3s "> برنامج تطوير الأعمال والتمييز المؤسسي</div>
                            <div class="home-programs  wow   bounceIn" class="" data-wow-duration="1s" data-wow-delay="2s ">   برنامج  الجودة وتطوير الأداء</div>
                            <div class="home-programs  wow   bounceInRight " class="" data-wow-duration="1s" data-wow-delay="1s "> برنامج     تطوير الموارد البشرية</div>



                        </h1>


                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- Home section End -->

<!-- About section -->
<section class="ms-about-section ms-slide  body-bg">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-3">
                <div class="about-banner">

                </div>
            </div>


            <div class="col-md-9">
                <div class="row">
                    <div class="section-title">
                        <h2>من<span> نحن </span></h2>
                    </div>
                    <p style="">
                        في عالمِ أعمالٍ تنافسيٍ جداً، ولِدَ مكتب حنان درويش عابد للاستشارات الإدارية بترخيص من قبل وزارة التجارة والاستثمار ، يضم نخبة متخصصة من الخبراء والمستشارين لديهم نفس الطموح والإصرار على تحقيق قفزات تشغيلية وإنتاجية لعملائنا، من خلال قدرتنا الكاملة على وضع كل أداة من أدوات التشغيل والإنتاج في مكانها الصحيح، وبأساليب علميّة احترافيّة بعيدة تماماً عن الفكر التقليدي، إيماناً منّا بأنّ التقليد هو مفهوم يعاكس تماماً القدرات التي توفرها ثقافة الإبداع والابتكار.
                        ونفتخر بخدمة القطاع العام والخاص والقطاع الربحي بجودة وعمق وسرعة.

                    </p>

                    </p>
                    <div class="row"  style="padding: 0 ; margin: 0;">
                        <div class="col-md-6">
                            <div class="about-content">
                                <div class="icon"> <img src="assets/img/vision.svg"></div>
                                <h4>الرؤية</h4>
                                <p>الوصول بعملائنا إلى منطقة الأمان في مواجهة حدة تناُفسّية الأسواق
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="about-content">
                                <div class="icon"> <img src="assets/img/message.svg"></div>
                                <h4>الرسالة</h4>
                                <p>
                                    تقديم استشارات إدارية وممكِّنات متميزة لتحقيق جودة الحياة  لعملائنا

                                </p>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="about-content">
                                <div class="icon"> <img src="assets/img/goal.svg"></div>
                                <h4>القيم</h4>
                                <p>
                                <ol type="A">
                                    <option>الالتزام بالعقود</option>
                                    <option>الشفافية في المعلومة</option>
                                    <option>القوة والأمانة في تقديم الاستشارات وتنفيذها</option>
                                </ol>




                                </p>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="about-content">
                                <div class="icon"> <img src="assets/img/target.svg"></div>
                                <h4>كلمة المدير العام
                                </h4>
                                <p style="text-align: center;">
                                    تعتبر جودة الحياة المؤسسية المحرك الأبرز من بين كل محركات النجاح المؤسسي. ونحن إذ ندرك في مكتب الاستشارات الإدارية قيمة هذا المعنى معرفيّاً وتطبيقيّاً، فإننا ننظر إلى مفهوم جودة الحياة على أنه رسالة نحملها لكل عملاءنا، لنأخذ بأيديهم إلى حيث البرامج والمبادرات التي يمكن أن تقدم لهم الجديد والمميّز والمُبتَكَر، في عالمِ أعمالٍ معاصر لكنه مزدحم جداً بالتنافُسيّة، ومما لا يخفى علينا أن تلك التنافُسيّة قد باتت تمثل الكثير من التحديات الكبرى والوجودية للشركات وللمؤسسات.
                                    وفي هذا الإطار، نرحب بكم معنا في رحلة استشارية ستكون حتماً ثريّة ومليئة بالفرص القابلة للتحقيق، وندرك أننا قادرون بإذن الله على أن نقدم لكم أفكاراً تناسب كل سوق، ومبنيّة على دراسات تقوم على أسس علمية ومعرفية نستطيع من خلالها أن نواجه معكم جميع تحديات المنافسة في جميع الأسواق، ليس فقط عبر فكر إداري حديث، ولكن أيضاً من خلال طرق وأساليب ستفاجئ المنافسين من حيث الابتكار والتجديد.


                                </p>


                                <div class="manager_cv">
                                    <a href="{{URL::asset('/laraview/#../cv.pdf') }}"  target="_blank">
                                        <h4>
                                            <span>السيرة الذاتية لدكتورة حنان عابد </span></h4>
                                    </a>
                                </div>


                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Service Block start -->

    </div>
</section>
<!-- About section End -->

<!-- Start Experience & Education section -->
<section class="ms-experience-section ms-slide  body-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="section-title">
                <h2>ماذا <span>نقدم</span></h2>

            </div></div>
        <div class="row">                <h4 class="text-center">برامج متخصصة لتطوير جودة الحياة المؤسسية</h4>
        </div>
        <br /><br />

        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 col-md-10 col-sm-12">
                <div class="text-center">

                    <!-- Image Map Generated by http://www.image-map.net/ -->
                    <img src="assets/img/services.jpg" usemap="#image-map" style="margin-bottom: 50px;"  class="img-fluid">

                    <map name="image-map">
                        <area target="" alt="1" title="1" data-popup-open="popup-1" href="#" coords="258,87,778,9" shape="rect">
                        <area target="" alt="2" title="2" data-popup-open="popup-3" href="#" coords="298,110,765,163" shape="rect">
                        <area target="" alt="3" title="3" data-popup-open="popup-4" href="#" coords="771,263,354,196" shape="rect">
                        <area target="" alt="4" title="4" data-popup-open="popup-5" href="#" coords="396,291,778,348" shape="rect">
                    </map>
                </div></div>




        </div>



    </div>
</section>
<!-- End Experience & Education Section -->



<!-- Start News Section -->
<section class="ms-news-section ms-slide  body-bg">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-3">
                <div class="about-banner">

                </div>
            </div>

            <div class="col-md-9">
                <div class="section-title">
                    <h2>احدث <span>الاخبار</span></h2>
                </div>
                <div class="row m-b-minus-24px">
                    <div class="col-lg-4 col-md-6">
                        <div class="news-info">
                            <figure class="news-img"><a href="#"><img src="assets/img/news/1.jpg" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>يناير 30,2023  </label>
                                <h3><a href="#">عنوان الموضوع</a></h3>
                                <p class="text-length">"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى.</p>
                                <div class="more-info">
                                    <a href="#">المزيد<span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="news-info">
                            <figure class="news-img"><a href="#"><img src="assets/img/news/2.jpg" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>يناير 30,2023  </label>
                                <h3><a href="#">عنوان الموضوع</a></h3>
                                <p class="text-length">"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى.</p>
                                <div class="more-info">
                                    <a href="#">المزيد<span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="news-info">
                            <figure class="news-img"><a href="#"><img src="assets/img/news/3.jpg" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>يناير 30,2023  </label>
                                <h3><a href="#">عنوان الموضوع</a></h3>
                                <p class="text-length">"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى.</p>
                                <div class="more-info">
                                    <a href="#">المزيد<span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="ms-pagination">
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="dots">...</li>
                                <li><a href="#">9</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>
</section>
<!-- End News Section -->


<!-- Start News Section -->
<section class="ms-team-section ms-slide  body-bg">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-3">
                <div class="about-banner">

                </div>
            </div>

            <div class="col-md-9">
                <div class="section-title">
                    <h2>مستشارينا <span></span></h2>
                </div>
                <div class="row m-b-minus-24px">
                    <div class="col-lg-4 col-md-6">
                        <div class="team-info">
                            <figure class="team-img"><a href="#"><img style="height: 300px;width: 300px;" src="assets/img/team/1.jpg" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <h3><a href="#"> أ.د/ أحمد درويش عابد
                                    </a></h3>
                                <p>أستاذ الإحصاء التطبيقي
                                </p>
                               <h6>
                                   &#9642;	أستاذ بقسم التحليل الكمي تفرغ جزئي  –كلية الاعمال – جامعة الملك سعود.
                                   <br>
                                   &#9642;	مستشار غير متفرغ  سابقا لدي مصلحة التقاعد.
                               </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-info">
                            <figure class="team-img"><a href="#"><img style="height: 300px;width: 300px;" src="assets/img/team/2.jpg" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <h3><a href="#"> د.م محمد عبد الرحيم ناقرو
                                    </a></h3>
                                <p>دكتوراه  إدارة اعمال
                                </p>
                                <h6>
                                    &#9642;  مقيم جائزة الملك عبدالعزيز للجودة.
                                    <br>
                                    &#9642;مقيم جائزة التميز في العمل الخيري، الأفكار الإبداعية.
                                    <br>
                                    &#9642;	 مستشار التميز المؤسسي و الإبداع لجهات متعددة.
                                </h6>
                            </div>
                        </div></div>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-info">
                            <figure class="team-img"><a href="#"><img style="height: 300px;width: 300px;" src="assets/img/team/3.png" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <h3><a href="#"> د/حنان درويش عابد
                                    </a></h3>
                                <p>دكتوراه علم نفس اداري
                                </p>
                                <h6>
                                    &#9642;  خبير تطوير مؤسسي.
                                    <br>
                                    &#9642;استشاري جودة ايزو 2015 9002.
                                    <br>
                                    &#9642;	 الحزام الأسود سيجما 6.
                                    <br>
                                    &#9642;	 مستشار بمؤسسة الجودة والتميز الدولية.
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-info">
                            <figure class="team-img"><a href="#"><img style="height: 300px;width: 300px;" src="assets/img/team/4.png" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <h3><a href="#"> أ. /عبدالله الزبيدي
                                    </a></h3>
                                <p>ماجستير إدارة اعمال
                                </p>
                                <h6>
                                    &#9642;  مستشار حوكمة المنظمات غير الربحية.
                                    <br>
                                    &#9642;مستشار التخطيط الإستراتيجي باستخدام بطاقة الأداء المتوازن.
                                    <br>
                                    &#9642;	 خبرة أكثر من 14سنة في القطاع غير الربحي.
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-info">
                            <figure class="team-img"><a href="#"><img style="height: 300px;width: 300px;" src="assets/img/team/3.png" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <h3><a href="#"> أ. فاتن علي عابد

                                    </a></h3>
                                <p>ماجستير نظم دعم القرار
                                </p>
                                <h6>
                                    &#9642;  مطوره برامج مختصه بالأنظمة الخبيرة الداعمة والمساندة لاتخاذ القرار.
                                    <br>
                                    &#9642;حاصله على شهاده جينيس للبرمجة.

                                </h6>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-info" >
                            <figure class="team-img"><a href="#"><img style="height: 300px;width: 300px;" src="assets/img/team/3.png" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <h3><a href="#"> أ. أنوار عباس الساري




                                    </a></h3>
                                <p>بكالوريوس إدارة اعمال
                                </p>
                                <h6>
                                    &#9642;    أخصائي حوكمة معتمد.
                                    <br>
                                    &#9642;عضو الجمعية السعودية للحوكمة.
                                    <br>
                                    &#9642;مستشارة حوكمة للجمعيات الاهلية.
                                    <br>
                                    &#9642;مستشارة حوكمة للجمعيات التعاونية.
                                    <br>
                                    &#9642;حاصلة على الشهادة المهنية  ICCGO مسؤول حوكمة الشركات.
                                    <br>
                                    &#9642;سفيرة التميز المؤسسي لجائزة الملك عبدالعزيز للجودة.
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="ms-pagination">
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="dots">...</li>
                                <li><a href="#">9</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>
</section>
<!-- End News Section -->

<!-- Start News Section -->
<section class=" ms-training-section ms-slide  body-bg">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-3">
                <div class="about-banner">

                </div>
            </div>

            <div class="col-md-9">
                <div class="section-title">
                    <h2> <span>ورش التدريب</span></h2>
                </div>
                <div class="row m-b-minus-24px">
                    <div class="col-lg-4 col-md-6">
                        <div class="news-info">
                            <figure class="news-img"><a href="#"><img src="assets/img/news/1.jpg" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>يناير 30,2023  </label>
                                <h3><a href="#">عنوان الدورة التدريبية</a></h3>
                                <p class="auther"> اسم المدرب </p>
                                <p class="text-length">"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى.</p>
                                <div class="more-info">
                                    <a data-popup-open="popup-2" href="#">اشترك الان<span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="news-info">
                            <figure class="news-img"><a href="#"><img src="assets/img/news/2.jpg" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>يناير 30,2023  </label>
                                <h3><a href="#">عنوان الدورة التدريبية</a></h3>
                                <p class="auther"> اسم المدرب </p>

                                <p class="text-length">"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى.</p>
                                <div class="more-info">
                                    <a data-popup-open="popup-2" href="#">اشترك الان<span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="news-info">
                            <figure class="news-img"><a href="#"><img src="assets/img/news/3.jpg" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>يناير 30,2023  </label>
                                <h3><a href="#">عنوان الدورة التدريبية</a></h3>
                                <p class="auther"> اسم المدرب </p>

                                <p class="text-length">"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى.</p>
                                <div class="more-info">
                                    <a data-popup-open="popup-2" href="#">اشترك الان<span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="ms-pagination">
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="dots">...</li>
                                <li><a href="#">9</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>
</section>
<!-- End News Section -->




<!-- Start Experience & Education section -->

<section class="ms-join-section ms-slide  body-bg" >

    <div class="container-fluid d-block">

        <div class="row">
            <div class="col-md-3">
                <div class="about-banner">

                </div>
            </div>

            <div class="col-md-9">
                <div class="section-title">
                    <h2> انضم الينا <span> </span></h2>
                </div>
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-7">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="fname" placeholder=" الاسم ">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="umail" placeholder=" الهاتف">
                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control" id="umail" placeholder=" بريد الكتروني">
                            </div>


                            <div class="form-group">

                                <select name="" id="">
                                    <option value=""> الجنس</option>
                                    <option value="">ذكر  </option>
                                    <option value="">انثى</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <select name="" id="">
                                    <option value=""> الجنسية</option>
                                    <option value="">سعودي  </option>
                                    <option value="">غير سعودي</option>
                                </select>
                            </div>


                            <div class="form-group">

                                <select name="" id="">

                                    <option value="">ماجستير </option>
                                    <option value="">دكتوراة </option>
                                    <option value="">اخرى </option>

                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="fname" placeholder=" عدد سنوات الخبرة ">
                            </div>




                            <div class="form-group">

                                ارفاق السيرة الذاتية

                                <label for="file-upload" class="custom-file-upload1">
                                    <i class="fa fa-cloud-upload"></i> اختار الملف
                                </label>
                                <input id="file-upload" type="file"/>
                            </div>

                            <br/>

                            <button type="submit" class="custom-btn ms-btn" >انضم الينا</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
<!-- Start Contact Section -->



<!-- Start Experience & Education section -->
<section class="ms-pricelist-section ms-slide  body-bg" >

    <div class="container-fluid d-block">

        <div class="row">
            <div class="col-md-3">
                <div class="about-banner">

                </div>
            </div>

            <div class="col-md-9">
                <div class="section-title">
                    <h2> طلب عرض سعر  <span> </span></h2>
                </div>
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-7">
                        <form method="post" action="{{route('sendPriceOrder')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="اسم الجهة الطالبة ">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="umail" id="umail" placeholder=" الاسم">
                            </div>
                            <div class="form-group">

                                <select name="manager" id="">
                                    <option value="مدير عام">مدير عام</option>
                                    <option value="مدير تنفيذي">مدير تنفيذي  </option>
                                    <option value="اخري">اخري</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" id="fname" placeholder=" هاتف ">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="umail" placeholder=" بريد الكتروني">
                            </div>


                            <div class="form-group">

                                <select name="service" id="">
                                    <option value=""> نوع الخدمة</option>
                                    <option value="برنامج الحوكمة">برنامج الحوكمة</option>
                                    <option value="برنامج تطوير الاعمال والتمييز المؤسسي">برنامج تطوير الاعمال والتمييز المؤسسي</option>
                                    <option value="برنامج الجودة وتطوير الاداء"> برنامج الجودة وتطوير الاداء  </option>
                                    <option value="برنامج تطوير الموارد البشرية">برنامج تطوير الموارد البشرية</option>
                                </select>
                            </div>



                            <button type="submit" class="custom-btn ms-btn"> طلب عرض سعر</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
<!-- Start Contact Section -->


<!-- About section -->
<section class="ms-knowledge-section  ms-slide  body-bg">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-3">
                <div class="about-banner">

                </div>
            </div>


            <div class="col-md-9">

                <div class="section-title">
                    <h2> <span>مركز المعرفة</span></h2>
                </div>

                <div class="tabs">
                    <input type="radio" name="tab" id="tab1" checked="checked">
                    <label for="tab1">المقالات</label>
                    <input type="radio" name="tab" id="tab2">
                    <label for="tab2">الكتب</label>
                    <input type="radio" name="tab" id="tab3">
                    <label for="tab3">النماذج</label>

                    <div class="tab-content-wrapper">
                        <div id="tab-content-1" class="tab-content">
                            <table>
                                <thead>
                                <tr>
                                    <th scope="col">عنوان المقالة</th>
                                    <th scope="col">الكاتب </th>
                                    <th scope="col">التاريخ</th>
                                    <th scope="col">تحميل</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="hover-text" data-label="عنوان المقالة">

                                        عنوان المقالة
                                        <span class="tooltip-text" id="top">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</span>

                                    </td>
                                    <td data-label="الكاتب ">اسم الكاتب</td>
                                    <td data-label="التاريخ">4/2023</td>
                                    <td data-label="تحميل"><a href="#">تحميل</a></td>
                                </tr>
                                <tr>
                                    <td data-label="عنوان المقالة">عنوان المقالة</td>
                                    <td data-label="الكاتب ">اسم الكاتب</td>
                                    <td data-label="التاريخ">4/2023</td>
                                    <td data-label="تحميل"><a href="#">تحميل</a></td>
                                </tr>
                                <td data-label="عنوان المقالة">عنوان المقالة</td>
                                <td data-label="الكاتب ">اسم الكاتب</td>
                                <td data-label="التاريخ">4/2023</td>
                                <td data-label="تحميل"><a href="#">تحميل</a></td>
                                </tr>
                                <tr>
                                    <td data-label="عنوان المقالة">عنوان المقالة</td>
                                    <td data-label="الكاتب ">اسم الكاتب</td>
                                    <td data-label="التاريخ">4/2023</td>
                                    <td data-label="تحميل"><a href="#">تحميل</a></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <div id="tab-content-2" class="tab-content">


                            <div class="row">
                                <div class="col-md-3">
                                    <div class="filedownload hover-text" ><img src="assets/img/book.jpg" class="img-fluid">       <span class="tooltip-text" id="left">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</span>

                                        <h4><a href="#">اسم الكاتب</a></h4>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/book.jpg" class="img-fluid">
                                        <h4><a href="#">اسم الكاتب</a></h4>
                                    </div>
                                </div>




                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/book.jpg" class="img-fluid">
                                        <h4><a href="#">اسم الكاتب</a></h4>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/book.jpg" class="img-fluid">
                                        <h4><a href="#">اسم الكاتب</a></h4>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/book.jpg" class="img-fluid">
                                        <h4><a href="#">اسم الكاتب</a></h4>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/book.jpg" class="img-fluid">
                                        <h4><a href="#">اسم الكاتب</a></h4>
                                    </div>
                                </div>



                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/book.jpg" class="img-fluid">
                                        <h4><a href="#">اسم الكاتب</a></h4>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/file_icon__.png" class="img-fluid">
                                        <h4><a href="#">اسم الكاتب</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-content-3" class="tab-content">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/file_icon__.png" class="img-fluid">
                                        <h4><a href="#">اسم النموذج</a></h4>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">اسم النموذج</a></h4>
                                    </div>
                                </div>




                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">اسم النموذج</a></h4>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">اسم النموذج</a></h4>
                                    </div>
                                </div>



                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">اسم النموذج</a></h4>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">اسم النموذج</a></h4>
                                    </div>
                                </div>




                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">اسم النموذج</a></h4>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="filedownload"><img src="assets/img/file_icon__.png" class="img-fluid">
                                        <h4> <a herf="#">اسم النموذج</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Service Block start -->

    </div>
</section>
<!-- About section End -->

<!-- Start Contact Section -->
<section class="ms-contact-section ms-slide  body-bg">
    <div class="container-fluid d-block">

        <div class="row">
            <div class="col-md-3">
                <div class="about-banner">

                </div>
            </div>

            <div class="col-md-8">
                <div class="section-title">
                    <h2>تواصل  <span>معنا </span></h2>
                </div>



                <ul class="ms-social">
                    <li><a  href="https://www.instagram.com/hdacsa2023_/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a  href="https://twitter.com/hdacsa2023" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a  href="https://www.linkedin.com/in/hd-ac-sa-31b232277/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>

                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="fname" placeholder="الاسم ">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="umail" placeholder="البريد الاكتروني">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" placeholder="الجوال">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="الرسالة"></textarea>
                    </div>
                    <button type="submit" class="custom-btn ms-btn">ارسال</button>
                </form>

                <div class="row p-t-80 ms-contact-detail m-tb-minus-12">
                    <div class="col-xs-12 col-sm-6 col-lg-4 p-tp-12">
                        <div class="ms-box">
                            <div class="detail">
                                <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <div class="info">
                                    <h3 class="title">البريد والموقع الالكتروني</h3>
                                    <p>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp info@hdac.sa
                                    </p>
                                    <p>
                                        <i class="fa fa-globe" aria-hidden="true"></i> &nbsp www.hdac.sa
                                    </p>
                                </div>
                            </div>
                            <div class="space"></div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-lg-4 p-tp-12">
                        <div class="ms-box">
                            <div class="detail">
                                <div class="icon"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                <div class="info">
                                    <h3 class="title">الجوال</h3>
                                    <p>
                                        <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp 00966535497257
                                    </p>
                                    <!--                                        <p>-->
                                    <!--                                            <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp  (+91)-987654XXXX-->
                                    <!--                                        </p>-->
                                </div>
                            </div>
                            <div class="space"></div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-lg-4 p-tp-12 m-auto">
                        <div class="ms-box">
                            <div class="detail">
                                <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <div class="info">
                                    <h3 class="title">العنوان</h3>
                                    <p>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> المملكة العربية السعودية
                                    </p>
                                    <p>جده</p>
                                </div>
                            </div>
                            <div class="space"></div>
                        </div>
                    </div>
                    <!-- /Boxes de Acoes -->
                </div>
            </div>
        </div>



    </div>
</section>
<!-- End Contact Section -->



<div class="price-requist" >
    <a href="javascript:void(0)" class="navs-link nav-join" data-section="ms-pricelist-section">
        طلب عرض سعر
    </a>
</div>



<div class="social-desktop">
    <ul class="">
        <li><a class="ms-btn-1" href="https://www.instagram.com/hdacsa2023_/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        <li><a class="ms-btn-1" href="https://twitter.com/hdacsa2023" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a class="ms-btn-1" href="https://www.linkedin.com/in/hd-ac-sa-31b232277/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
    </ul>
</div>


<!-- Theme Custom Cursors -->
<div class="ms-cursor"></div>
<div class="ms-cursor-2"></div>

<!-- Plugins JS -->
<script src="assets/js/plugins/jquery-3.5.1.min.js"></script>
<script src="assets/js/plugins/bootstrap.bundle.min.js"></script>
<script src="assets/js/plugins/jquery.fancybox.min.js"></script>
<script src="assets/js/plugins/mixitup.min.js"></script>
<script src="assets/js/plugins/fontawesome.js"></script>
<script src="assets/js/plugins/tilt.jquery.js"></script>
<!-- theme particles script ------>
<script src="assets/js/plugins/particles.min.js"></script>
<script src="assets/js/plugins/app.js"></script>
<!-- Main Js -->
<script src="assets/js/main.js"></script>


<script>
    $(function() {
        //----- OPEN
        $('[data-popup-open]').on('click', function(e)  {
            var targeted_popup_class = jQuery(this).attr('data-popup-open');
            $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

            e.preventDefault();
        });

        //----- CLOSE
        $('[data-popup-close]').on('click', function(e)  {
            var targeted_popup_class = jQuery(this).attr('data-popup-close');
            $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

            e.preventDefault();
        });
    });
</script>

<div class="popup" data-popup="popup-1">
    <div class="popup-inner sponsors_inner">

        <div class="experiense">
            <h4>4 .برنامج الحوكمة                        </h4>
            <ul class="timeline">
                <li class="timeline-item">
                    <div class="timeline-block">

                        <div class="timeline-content">
                            <p>
                                نقدم مجموعة متكاملة من خدمات الحوكمة لعملائنا، لحماية حقوق المساهمين، ولضمان وجود ضوابط وعمليات داخليّة كافية ومتاحة للمساعدة في الحفاظ على النمو المستدام للمنشأة. ويتمتع مستشارونا المتخصِّصون بمعرفة واسعة لمساعدة عملائنا على تطوير معايير للحوكمة تتماشى مع استراتيجيّة وأهداف المؤسسة .

                            </p>
                        </div>
                    </div>
                </li>


            </ul>
        </div>

        <a class="popup-close " data-popup-close="popup-1" href="#">x</a>
    </div>
</div>
<div class="popup" data-popup="popup-3">
    <div class="popup-inner sponsors_inner">

        <div class="experiense">
            <h4>3 .برنامج تطوير الأعمال والتمييز المؤسسي                        </h4>
            <ul class="timeline">
                <li class="timeline-item">
                    <div class="timeline-block">

                        <div class="timeline-content">
                            <p>
                                دراسة حالة المؤسسة وعناصر قوتها، وفرص المنافسة، والمخاطر المحتملة، وإدارة الأولويات، وبناء الخطة الاستراتيجية، جنباً إلى جنب مع دراسة السوق، والجدوى الماليّة، وبيان متطلبات تحقيق المسؤولية الاجتماعية والبيئية، والضمانات القانونيّة، وتقييم المشاريع والفعاليات، وخدمات قواعد البيانات المرتبطة بإنشاء وإدخال وتنظيم وإدارة البيانات إحصائيّاً، واستخراج تقارير تَهُم متّخذي القرار في المؤسسة.

                            </p>
                        </div>
                    </div>
                </li>


            </ul>
        </div>

        <a class="popup-close " data-popup-close="popup-3" href="#">x</a>
    </div>
</div>
<div class="popup" data-popup="popup-4">
    <div class="popup-inner sponsors_inner">

        <div class="experiense">
            <h4>2 .برنامج الجودة وتطوير الأداء
            </h4>
            <ul class="timeline">
                <li class="timeline-item">
                    <div class="timeline-block">

                        <div class="timeline-content">
                            <p>
                                إعداد نظام إدارة الجودة، وتأهيل المنظّمة للحصول على الشهادات الدوليّة في الجودة، بالإضافة إلى تأهيل فِرَق العمل لتطبيق نُظُم الجودة المختلفة وتحسينها بشكل مستمر. كل ذلك، جنباً إلى جنب مع أتمتة جميع العمليات والإجراءات، بالإضافة إلى تطبيقات رقميّة تضمن تحقيق الجودة، ومتابعة العمليات داخل المؤسسة، للوصول بمؤسستك إلى مرحلة تتميّز فيها، وتصبح قادرة على المنافسة بنجاح في السوق.

                            </p>
                        </div>
                    </div>
                </li>


            </ul>
        </div>

        <a class="popup-close " data-popup-close="popup-4" href="#">x</a>
    </div>
</div>
<div class="popup" data-popup="popup-5">
    <div class="popup-inner sponsors_inner">

        <div class="experiense">
            <h4>1 .برنامج تطوير الموارد البشرية

            </h4>
            <ul class="timeline">
                <li class="timeline-item">
                    <div class="timeline-block">

                        <div class="timeline-content">
                            <p>
                                نقدم لكم خدمات وحلول تخصُّصية لتأسيس وتطوير ممارسات الموارد البشرية الفعّالة والناجحة، بهدف تعزيز قدرة مؤسستك على فهم أعمق لاستراتيجيّات إدارة الموارد البشرية، تعزيزاً لجودة الحياة المؤسسية وذلك عبر أتمتة العمليات للموظفين، من خلال التحوّل الرقمي الذي يواكب أحدث البرامج وصولاً إلى جعل الحياة الوظيفيّة المُحفِّزة للموظفين قابلة للاستدامة.

                            </p>
                        </div>
                    </div>
                </li>


            </ul>
        </div>

        <a class="popup-close " data-popup-close="popup-5" href="#">x</a>
    </div>
</div>


<div class="popup" data-popup="popup-2">
    <div class="popup-inner sponsors_inner">

        <div class="experiense">
            <h4>تسجيل الاشتراك بالدورة التدريبية                        </h4>




            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="fname" placeholder="الاسم ">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="umail" placeholder="البريد الاكتروني">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="phone" placeholder="الجوال">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ملاحظات"></textarea>
                </div>
                <button type="submit" class="custom-btn ms-btn-1">اشترك</button>
            </form>
        </div>

        <a class="popup-close " data-popup-close="popup-2" href="#">x</a>
    </div>


</div>




</body>

</html>
