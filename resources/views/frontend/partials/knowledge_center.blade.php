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
                                    @foreach($articles as $article)
                                    @php
                                        $file = $article->file ? $article->file->getUrl() : '';
                                    @endphp 
                                        <tr>
                                            <td data-label="عنوان المقالة">{{ $article->title }}</td>
                                            <td data-label="الكاتب ">{{ $article->writer }}</td>
                                            <td data-label="التاريخ">{{ $article->date }}</td>
                                            <td data-label="تحميل"><a href="{{ $file }}">تحميل</a></td>
                                        </tr> 
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div id="tab-content-2" class="tab-content">


                            <div class="row"> 
                                @foreach($books as $book)
                                @php
                                    $file = $book->file ? $book->file->getUrl() : '';
                                    $image = $book->photo ? $book->photo->getUrl() : '';
                                @endphp 
                                    <div class="col-md-3">
                                        <div class="filedownload"><img src="{{ $image }}"
                                                class="img-fluid">
                                            <h4><a href="{{ $file }}">{{ $book->name }}</a></h4>
                                        </div>
                                    </div> 
                                @endforeach

                            </div>
                        </div>
                        <div id="tab-content-3" class="tab-content">

                            <div class="row">
                                @foreach($samples as $sample)
                                @php
                                    $file = $sample->file ? $sample->file->getUrl() : ''; 
                                @endphp 
                                <div class="col-md-3">
                                    <div class="filedownload"><img
                                            src="{{ asset('frontend/assets/img/file_icon__.png') }}"
                                            class="img-fluid">
                                        <h4><a href="{{ $file }}">{{ $sample->name }}</a></h4>
                                    </div>
                                </div> 
                                @endforeach
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
