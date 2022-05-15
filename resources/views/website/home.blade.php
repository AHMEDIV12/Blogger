@extends('layouts.main')

@section('content')
    <!-- Start Slider -->
    <div class="slider">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('imgs/slide3.png') }}" class="d-block w-100" alt="doctor image slider" id="slide-overlay">
                    <div class="carousel-caption d-md-block">
                        <h1>“الطبيب يساعد، والله يشفي”</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('imgs/slide2.png') }}" class="d-block w-100" alt="doctor image slider" id="slide-overlay">
                    <div class="carousel-caption d-md-block">
                        <h1>“أهم الأبطال نسميهم بالأطباء”</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('imgs/slide1.png') }}" class="d-block w-100" alt="doctor image slider" id="slide-overlay">
                    <div class="carousel-caption d-md-block">
                        <h1>“ان وجود الطبيب هو بداية العلاج”</h1>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Main Title -->
    <div class="container">
        <div class="top1">
            <div class="one">
                <h3>الاقسام</h3>
            </div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
    </div>
    <!-- End Main Title -->

    <!--Start section one-->
    <div class="section-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="item-section">
                        <img src="{{ asset('imgs/dies.jpg') }}" alt="" width="100%">
                        <div class="title-section p-3">
                            <h4 class="">الامراض</h4>
                            <p class="text-black-50">للتعرف علي الامراض الشائعه واعرضها والتي يمر به المريض اثناء المرض
                                وطريقه الوقايه منه</p>
                            <button><a href="{{route('show_diseases')}}">المزيد</a> </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="item-section">
                        <img src="{{ asset('imgs/ssalat.jpg') }}" alt="" width="100%">
                        <div class="title-section p-3">
                            <h4>طب وصحه</h4>
                            <p class="text-black-50">للتعرف علي كيفيه بناء صحه سليمه وفوائد ممارسه الرياضه والاضرار من
                                عادات خاطئه مثل التدخين
                            </p>
                            <button><a href="pages/medicine.html">المزيد</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="item-section">
                        <img src="{{ asset('imgs/handsome-.jpg') }}" alt="" width="100%">
                        <div class="title-section p-3">
                            <h4>الادوية</h4>
                            <p class="text-black-50">للتعرف علي الادويه ومواعيدها وفوائد الادويه واضرارها والمواد
                                الفعاله التي تؤدي الي حساسيه
                                المريض .</p>
                            <button><a href="{{route('drugs')}}">المزيد</a></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Main Title -->
    <div class="container">
        <div class="top1">
            <div class="one">
                <h3>التواصل مع الطبيب</h3>
            </div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
    </div>
    <!-- End Main Title -->

    <!-- Start section two -->
    <div class="section-two bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-6 col-md-12 contact1">
                    <h5>تحدث مع الطبيب الان وبخصوصيه تامه</h5>
                    <p>للمساعده ادخل الاعراض التي تعاني منها وسيتحدث الطبيب معك خلال دقائق</p>
                    <div class="icon">
                        <i class="far fa-check-circle"></i>
                        <p>استشاره طبيبه موثوقه</p>
                        <br>

                        <i class="far fa-check-circle "></i>
                        <p>افضل الاطباء في الوطن العربي </p>
                        <br>

                        <i class="far fa-check-circle"></i>
                        <p>خصوصيه تامه واجابة شامله </p>
                    </div>
                    <div class="item-3">
                        <button><a href="{{route('doctors')}}">التواصل الان</a></button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 contact2">
                    <div class="contact-img">
                        <img class="img-doc" src="{{ asset('imgs/i-love-my-job-so-much.jpg') }}" alt="Doc-online" width="100%"
                            height="500px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section two -->

    <!-- Main Title -->
    <div class="container">
        <div class="top1">
            <div class="one">
                <h3>أمراض شائعه</h3>
            </div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
    </div>
    <!-- End Main Title -->

    <!-- Start Section 3 -->
    <div class="section-three">
        <div class="container">
            <div class="row">
                <div class=" item-one col-lg-3 col-md-6 col-sm-12">
                    <div class="item-two1 item">
                        <i class="fa-solid fa-eye icon1" style="color: rgb(33, 75, 190);"></i>
                        <h3> امراض العيون</h3>
                        <p>يوجد الكثير من امراض العيون مثل مرض قصر النظر وطول النظر والتهاب الشبكيه قصر </p>
                    </div>

                </div>
                <div class="item-one col-lg-3 col-md-6  col-sm-12 ">
                    <div class="item-two2 item">
                        <i class="fa-solid fa-brain icon1" style="color: blueviolet;"></i>
                        <h3> امراض المخ والاعتصاب</h3>
                        <p> يوجد الكثير من امراض المخ والاعصاب مثل مرض الصرع و مرض ضمور النخاع الشوكي </p>
                    </div>

                </div>
                <div class="item-one col-lg-3 col-md-6  col-sm-12">
                    <div class="item-two3 item">
                        <i class="fa-solid fa-tooth icon1" style="color: rgb(37, 179, 37);"></i>
                        <h3> امراض الاسنان</h3>
                        <p>يوجد الكثير من امراض الاسنان مثل تسوس الاسنان وجفاف الفم والتهاب اللثه وسرطان الفم </p>
                    </div>

                </div>
                <div class=" item-one col-lg-3 col-md-6  col-sm-12">
                    <div class="item-two4 item">
                        <i class="fa-solid fa-heart-pulse icon1" style="color: rgb(228, 74, 189);"></i>
                        <h3> امراض القلب</h3>
                        <p>يوجد الكثير من امراض الفلب مثل مرض فشل القلب والنوبه القلبيه والسكته الدماغيه </p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class=" item-one col-lg-3 col-md-6 col-sm-12">
                    <div class="item-two4 item">
                        <i class="fa-solid fa-virus icon1" style="color: rgb(228, 74, 189);"></i>
                        <h3> فيرس كورونا</h3>
                        <p>هو فيرس جديد انتشر بشكل شائع وادي لوفاه ناس كثيره جدا ويجب الحرص منه </p>
                    </div>

                </div>
                <div class="item-one col-lg-3 col-md-6  col-sm-12 ">
                    <div class="item-two3 item">
                        <i class="fa-solid fa-wheelchair icon1 " style="color: rgb(37, 179, 37);"></i>
                        <h3> الشلل النصفي</h3>
                        <p> هو مرض ياثر علي جسم الانسان وهو عباره عن شلل لنصف الجسم وعمد القدره علي التحرك </p>
                    </div>

                </div>
                <div class="item-one col-lg-3 col-md-6  col-sm-12">
                    <div class="item-two2 item">
                        <i class="fa-solid fa-flask icon1" style="color: blueviolet;"></i>
                        <h3> التحليل</h3>
                        <p>يجب علي الانسان عمل تحليل كل فتره للوقايه من الامراض ولتجب حدوث مرض او عدوه والعلم بها للقضاء
                            عليها </p>
                    </div>

                </div>
                <div class=" item-one col-lg-3 col-md-6  col-sm-12">
                    <div class="item-two1 item">
                        <i class="fa-solid fa-suitcase-medical icon1" style="color: rgb(33, 75, 190);"></i>
                        <h3> الاسعافات الاوليه</h3>
                        <p>يجب علي كل انسان معرفه الاسعافات الاوليه لحمايه اي شخص قد يكون في خطر ومعرفه انقاذه </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Section 3 -->

    <!-- Main Title -->
    <div class="container">
        <div class="top1">
            <div class="one">
                <h3>اعداد الأصابات</h3>
            </div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
    </div>
    <!-- End Main Title -->

    <!--start section 4-->
    <div class="section-four pt-2">
        <div class="container">
            <div class="row">
                <div class=" item-one col-lg-3 col-md-6 col-sm-12">
                    <div class="item-two1 item-4">
                        <i class="fa-solid fa-eye icon1" style="color: rgb(33, 75, 190);"></i>
                        <h4>عدد الاصابه بقصر النظر</h4>
                        <h3>2255</h3>
                    </div>

                </div>
                <div class="item-one col-lg-3 col-md-6  col-sm-12 ">
                    <div class="item-two1 item-4">
                        <i class="fa-solid fa-virus icon1" style="color:  rgb(33, 75, 190);"></i>
                        <h5>عدد الاصابه بفيروس كورونا</h5>
                        <h3>5685</h3>
                    </div>

                </div>
                <div class="item-one col-lg-3 col-md-6  col-sm-12">
                    <div class="item-two1 item-4">
                        <i class="fa-solid fa-tooth icon1" style="color: rgb(33, 75, 190);"></i>
                        <h5>عدد الاصابه بتسوس الاسنان</h5>
                        <h3>58951</h3>
                    </div>

                </div>
                <div class=" item-one col-lg-3 col-md-6  col-sm-12">
                    <div class="item-two1 item-4">
                        <i class="fa-solid fa-heart-pulse icon1" style="color: rgb(33, 75, 190)"></i>
                        <h5>عدد الاصابه بالسكته القلبيه</h5>
                        <h3>852369</h3>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- End Section 4 -->
@endsection