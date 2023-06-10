<!-- Start Experience & Education section -->

<section class="ms-join-section ms-slide  body-bg">

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
                        <form action="{{ route('frontend.joining')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="fname" placeholder=" الاسم " name="name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="umail" placeholder=" الهاتف" name="phone_number" required>
                            </div>


                            <div class="form-group">
                                <input type="email" class="form-control" id="umail" placeholder=" بريد الكتروني" name="email" required>
                            </div>

                            <div class="form-group">

                                <select name="gender" id="" required>
                                    @foreach(\App\Models\Joining::GENDER_SELECT as $key => $label)
                                        <option value="{{ $key }}"> {{ $label }}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">

                                <select name="nationality" id="" required>
                                    @foreach(\App\Models\Joining::NATIONALITY_SELECT as $key => $label)
                                        <option value="{{ $key }}"> {{ $label }}</option> 
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">

                                <select name="qualification" id="" required>
                                    @foreach(\App\Models\Joining::QUALIFICATION_SELECT as $key => $label)
                                        <option value="{{ $key }}"> {{ $label }}</option> 
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control" id="fname" name="experience_years"
                                    placeholder=" عدد سنوات الخبرة " required>
                            </div>




                            <div class="form-group mt-3">
                                <label class="required" for="cv">ارفاق السيرة الذاتية 
                                    <i class="fa fa-cloud-upload"></i>    </label>
                                <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone">
                                </div>  
                            </div>


                            <br /><br />
                            <button type="submit" class="btn btn-dark">انضم الينا</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
<!-- Start Contact Section -->


