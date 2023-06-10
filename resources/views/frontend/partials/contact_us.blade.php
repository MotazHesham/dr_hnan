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
                    <h2>تواصل <span>معنا </span></h2>
                </div>



                <ul class="ms-social">
                    <li><a href="{{ $about_us->instagram }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="{{ $about_us->twitter }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="{{ $about_us->linkedin }}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="{{ $about_us->facebook }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                </ul>

                <form action="{{ route('frontend.contact_us') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="fname" placeholder="الاسم " name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="umail" placeholder="البريد الاكتروني" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" placeholder="الجوال" name="phone" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="الرسالة" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">ارسال</button>
                </form>

                <div class="row p-t-80 ms-contact-detail m-tb-minus-12">
                    <div class="col-xs-12 col-sm-6 col-lg-4 p-tp-12">
                        <div class="ms-box">
                            <div class="detail">
                                <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <div class="info">
                                    <h3 class="title">البريد والموقع الالكتروني</h3>
                                    <p>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp
                                        {{ $about_us->email }}
                                    </p>
                                    <p>
                                        <i class="fa fa-globe" aria-hidden="true"></i> &nbsp {{ $about_us->website}}
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
                                        <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp {{ $about_us->phone_number }}
                                    </p>
                                    <p>
                                        <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp {{ $about_us->phone_number_2 }}
                                    </p>
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
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> 
                                        
                                        <?php echo nl2br($about_us->address ?? ''); ?>
                                        
                                    </p> 
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
