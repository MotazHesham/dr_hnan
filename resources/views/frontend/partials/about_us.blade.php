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
                    <div class="row" style="padding: 0 ; margin: 0;">
                        <div class="col-md-6">
                            <div class="about-content">
                                <div class="icon"> <img src="{{ asset('frontend/assets/img/vision.svg') }}"></div>
                                <h4>الرؤية</h4>
                                <p>
                                    <?php echo nl2br($about_us->vision ?? ''); ?>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="about-content">
                                <div class="icon"> <img src="{{ asset('frontend/assets/img/message.svg') }}"></div>
                                <h4>الرسالة</h4>
                                <p>
                                    <?php echo nl2br($about_us->message ?? ''); ?>
                                </p>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="about-content">
                                <div class="icon"> <img src="{{ asset('frontend/assets/img/goal.svg') }}"></div>
                                <h4>القيم</h4>
                                <p> 
                                    <?php echo nl2br($about_us->morals ?? ''); ?>
                                </p>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="about-content">
                                <div class="icon"> <img src="{{ asset('frontend/assets/img/target.svg') }}"></div>
                                <h4>كلمة المدير العام
                                </h4>

                                <p> 
                                    <?php echo nl2br($about_us->manager_word ?? ''); ?>
                                </p>

                                <div class="manager_cv">
                                    <a href="{{ $about_us->cv->getUrl() }}" data-section="hanan_cv" target="_blank">
                                        <h4>
                                            <span>السيرة الذاتية لدكتورة حنان عابد </span>
                                        </h4>
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