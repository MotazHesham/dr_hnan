<!-- Start News Section -->
<section class="ms-partners-section ms-slide  body-bg">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-3">
                <div class="about-banner">

                </div>
            </div>

            <div class="col-md-9">
                <div class="section-title">
                    <h2>شركاء النجاح <span></span></h2>
                </div>
                <div class="row m-b-minus-24px">
                    @foreach ($partners as $partner)
                        @php
                            $image = $partner->photo ? $partner->photo->getUrl('preview') : '';
                        @endphp
                        <div class="col-lg-3 col-md-6">
                            <div class="team-info">
                                <figure class="team-img"><a href="#"><img src="{{ $image }}"
                                            alt="news imag"></a>
                                </figure>
                                <div class="detail">
                                    <h3>
                                        <a target="_blanc" href="{{ $partner->website ?? '#' }}">
                                            {{ $partner->name ?? '' }}
                                        </a>
                                    </h3>  
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> 
        </div> 
    </div>
</section>
<!-- End News Section -->
