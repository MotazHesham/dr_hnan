<!-- Start Experience & Education section -->
<section class="ms-pricelist-section ms-slide  body-bg">

    <div class="container-fluid d-block">

        <div class="row">
            <div class="col-md-3">
                <div class="about-banner">

                </div>
            </div>

            <div class="col-md-9">
                <div class="section-title">
                    <h2> طلب استشارة مجانية <span> </span></h2>
                </div>
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-7">
                        <form action="{{ route('frontend.quotations') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="fname" name="the_company"
                                    placeholder="اسم الجهة الطالبة " required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="umail" name="name" placeholder=" الاسم" required>
                            </div>
                            <div class="form-group"> 
                                <select name="position" id="">
                                    @foreach(\App\Models\Quotation::POSITION_SELECT as $key => $label)
                                    <option value="{{$key}}">{{ $label }}</option> 
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="fname" name="phone_number" placeholder=" هاتف " required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="umail" name="email" placeholder=" بريد الكتروني" required>
                            </div>


                            <div class="form-group">

                                <select name="service_id" id="" required>
                                    @foreach(\App\Models\Service::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '') as $id => $entry)
                                        <option value="{{ $id }}">{{ $entry }}</option>
                                    @endforeach 
                                </select>
                            </div>



                            <button type="submit" class="btn btn-dark"> طلب استشارة مجانية</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
<!-- Start Contact Section -->
