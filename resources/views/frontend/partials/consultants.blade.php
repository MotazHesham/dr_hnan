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
                    @foreach($consultants as $consultant)
                    @php
                        $image = $consultant->photo ? $consultant->photo->getUrl('preview2') : '';
                    @endphp
                    <div class="col-lg-3 col-md-6">
                        <div class="team-info">
                            <figure class="team-img"><a href="#"><img
                                        src="{{ $image }}" alt="news imag"></a>
                            </figure>
                            <div class="detail">
                                <h3><a target="_blanc" href="{{ $consultant->cv ? $consultant->cv->getUrl() : '#' }}"> {{ $consultant->user ? $consultant->user->name : '' }}</a></h3>
                                <p class="just">
                                    {{ $consultant->specialization ?? '' }}
                                </p> 
                                <h6 class="just" > 
                                    <?php echo nl2br($consultant->description ?? ''); ?>
                                </h6>

                            </div>
                        </div>
                    </div> 
                    @endforeach 
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
