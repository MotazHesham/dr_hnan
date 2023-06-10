<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>مكتب د.حنان درويش عابد </title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- site Favicon -->
    <link rel="icon" href="{{ asset('frontend/assets/img/favicon/favicon.png') }}" sizes="32x32" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/jquery.fancybox.min.css') }}" />

    <!-- Main Style -->
    <link href="{{ asset('frontend/assets/fonts/transfonter.org-20230331-210459/stylesheet.css') }}" rel="stylesheet">

    <link rel="stylesheet" id="main_style" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" />


    <link href="{{ asset('frontend/assets/css/model.css') }}" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

    <!----animate--->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <!----animate--->

</head>

<body class="body-bg">


    @yield('content')

    
    <div class="price-requist">
        <a href="javascript:void(0)" class="navs-link nav-join" data-section="ms-pricelist-section">
            طلب عرض سعر
        </a>
    </div>



    <div class="social-desktop">
        <ul class="">
            <li><a class="ms-btn-1" href="{{ $about_us->instagram }}" target="_blank"><i class="fa fa-instagram"
                        aria-hidden="true"></i></a></li>
            <li><a class="ms-btn-1" href="{{ $about_us->twitter }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </li>
            <li><a class="ms-btn-1" href="{{ $about_us->linkedin }}" target="_blank"><i class="fa fa-linkedin"
                        aria-hidden="true"></i></a></li>
            <li><a class="ms-btn-1" href="{{ $about_us->facebook }}" target="_blank"><i class="fa fa-facebook"
                        aria-hidden="true"></i></a></li>
        </ul>
    </div>
    <!-- Theme Custom Cursors -->
    <div class="ms-cursor"></div>
    <div class="ms-cursor-2"></div>

    <!-- Plugins JS -->
    <script src="{{ asset('frontend/assets/js/plugins/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/fontawesome.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/tilt.jquery.js') }}"></script>
    <!-- theme particles script ------>
    <script src="{{ asset('frontend/assets/js/plugins/particles.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/app.js') }}"></script>
    <!-- Main Js -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>


    <script>
        Dropzone.options.cvDropzone = {
            url: '{{ route('frontend.joinings.storeMedia') }}',
            maxFilesize: 5, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5
            },
            success: function(file, response) {
                $('form').find('input[name="cv"]').remove()
                $('form').append('<input type="hidden" name="cv" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="cv"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            }, 
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
    
                return _results
            }
        }
    </script>
    <script>
        $(function() {
            //----- OPEN
            $('[data-popup-open]').on('click', function(e) {
                var targeted_popup_class = jQuery(this).attr('data-popup-open');
                $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

                e.preventDefault();
            });

            //----- CLOSE
            $('[data-popup-close]').on('click', function(e) {
                var targeted_popup_class = jQuery(this).attr('data-popup-close');
                $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

                e.preventDefault();
            });
        });
    </script>

    <div class="popup" data-popup="popup-1">
        <div class="popup-inner sponsors_inner">

            <div class="experiense">
                <h4>1 .برنامج تطوير الموارد البشرية </h4>
                <ul class="timeline">
                    <li class="timeline-item">
                        <div class="timeline-block">

                            <div class="timeline-content">
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى
                                    زيادة عدد الحروف التى يولدها التطبيق.
                                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما
                                    تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع
                                    على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم
                                    الموقع.</p>
                            </div>
                        </div>
                    </li>


                </ul>
            </div>

            <a class="popup-close " data-popup-close="popup-1" href="#">x</a>
        </div>


    </div>


    <div class="popup" data-popup="popup-2">
        <div class="popup-inner sponsors_inner">

            <div class="experiense">
                <h4>تسجيل الاشتراك بالدورة التدريبية </h4>


                <small>قريبااا ...</small>

                {{-- <form>
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
                </form> --}}
            </div>

            <a class="popup-close " data-popup-close="popup-2" href="#">x</a>
        </div>


    </div>


    @include('sweetalert::alert')


</body>

</html>
