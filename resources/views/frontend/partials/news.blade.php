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
                    @foreach($news as $raw)
                    @php
                        $image = $raw->photo ? $raw->photo->getUrl('preview') : '';
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="news-info">
                            <figure class="news-img"><a href="#"><img
                                        src="{{ $image }}" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <label>{{ $raw->date }}</label>
                                <h3><a href="#">{{ $raw->name }}</a></h3>
                                <p class="text-length">
                                    <?php echo nl2br($raw->description ?? ''); ?>
                                </p>
                                <div class="more-info">
                                    <a href="#">المزيد<span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                    {{ $news->links() }}
                    {{-- <div class="col-md-12">
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
                    </div> --}}
                </div>
            </div>



        </div>

    </div>
</section>
<!-- End News Section -->
