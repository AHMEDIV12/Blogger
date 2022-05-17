<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('tab_name')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/about.css') }}"> -->

    @stack('extra-css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Start Navbar -->
  
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="../index.html">
                <img src="{{ asset('imgs/5cb00c46-6dfd-4273-aeea-244b18ea7a2b.jpg') }}" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
                aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="main">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="@if(Request::is('/')) active @endif nav-link p-2 p-lg-3 fw-bold" aria-current="page" href="{{ url('/') }}">الرئيسيه</a>
                    </li>
                    <li class="nav-item">
                        <a class="@if(Request::is('/about')) active @endif nav-link p-2 p-lg-3 fw-bold" href="{{ url('/about') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="@if(str_contains(Request::url(), '/doctors')) active @endif nav-link p-2 p-lg-3 fw-bold" href="{{ url('doctors') }}"> تواصل مع طبيب</a>
                    </li>
                    <li class="nav-item">
                        <a class="@if(str_contains(Request::url(), '/contactus')) active @endif nav-link p-2 p-lg-3 fw-bold" href="{{ url('contactus') }}">تواصل معنا</a>
                    </li>
                    @auth()
                        @if ((auth()->user()->category == 'admin'))
                            <li class="nav-item">
                                <a class="@if(str_contains(Request::url(), '/admin/users')) active @endif nav-link p-2 p-lg-3 fw-bold" href="{{ url('admin/users') }}"> 
                                    لوحة التحكم 
                                </a>
                            </li>
                        @endif
                    @endauth
                    <li class="nav-item p-2 p-lg-3">
                        <input class="form-control rounded-pill" list="datalistOptions" id="exampleDataList"
                                placeholder="ابحث عن طبيبك..." onchange="location = this.value;">

                        <datalist id="datalistOptions">
                            @if (doctor()->count() > 0 )
                                @foreach(doctor() as $doctor )
                                    <option class="dropdown-item form-control rounded-pill" name="{{route('web.doctors.show' , $doctor->id) }}" value="http://127.0.0.1:8000/doctors/{{$doctor->id}}"> {{$doctor->name}}</option>
                                @endforeach
                            @else
                            <option value="د/ بدر">
                            <option value="د/ محمد">
                            <option value="د/ ابراهيم">
                            <option value="د/ مريم">
                            <option value="د/ اميره">
                            @endif
                        </datalist>
                    </li>
                
                </ul>
                @auth
                <div class="dropdown">
                    <button class="btn rounded-pill main-btn dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i> {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu text-start" aria-labelledby="dropdownMenu2">
                        <li><a href="{{ route('profile.show', auth()->user()->id) }}" class="dropdown-item" type="button">الملف الشخصي</a></li>
                        <li>
                            <a href="{{ route('logout') }}" class="dropdown-item" 
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >تسجيل خروج</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <a class="btn rounded-pill main-btn" id="navbar-btn" style="margin-left: 5px;"
                    href="{{ route('login') }}">دخول</a>
                <a class="btn rounded-pill main-btn" href="{{ route('register') }}">تسجيل</a>
                @endauth
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
            <h1 class="text-center" id="kalam"><h1>
    <!-- START PAGE CONTENT -->
    @yield('content')
    <!-- END   PAGE CONTENT -->

    <!-- Start Footer -->
    <div class="footer pt-5 pb-5 text-white-50 text-center text-md-end">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="info mb-5">
                        <a href="../index.html"><img src="{{ asset('imgs/doooc.png') }}" alt="" class="mb-4 w-25" /></a>
                        <p class="mb-5 lh-lg">
                            المنصه العربيه الاكبر التي تعتني بتقديم المحتوى الطبي الموثوق بأقلام آلاف
                            الأطباء المعتمدين .
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="links">
                        <h5 class="text-light">الروابط</h5>
                        <ul class="list-unstyled lh-lg p-0">
                            <li><a href="../index.html" class="text-decoration-none">الرئيسيه</a></li>
                            <li><a href="doctors.html" class="text-decoration-none">طاقم الأطباء</a></li>
                            <li><a href="contactUs.html" class="text-decoration-none">تواصل معنا</a></li>
                            <li><a href="diseases.html" class="text-decoration-none">الأمراض</a></li>
                            <li><a href="drugs.html" class="text-decoration-none">الأدويه</a></li>
                            <li><a href="medical-examination.html" class="text-decoration-none">اكشف</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="links">
                        <h5 class="text-light">عن الموقع</h5>
                        <ul class="list-unstyled lh-lg p-0">
                            <li><a href="about.html" class="text-decoration-none">معلومات عنا</a></li>
                            <li><a href="login.html" class="text-decoration-none">تسجيل الدخول</a></li>
                            <li><a href="register.html" class="text-decoration-none">انشاء حساب</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact">
                        <h5 class="text-light">التواصل</h5>
                        <p class="lh-lg">تواصل معنا عبر هذه الروابط</p>

                        <ul class="d-flex mt-3 list-unstyled gap-4 p-0" id="icons">
                            <li>
                                <a class="d-block text-light" href="https://www.facebook.com/badrmohaned162"><i
                                        class="fa-brands fa-facebook fa-lg facebook rounded-circle p-2"></i></a>
                            </li>
                            <li>
                                <a class="d-block text-light" href="https://twitter.com/Badr_mohamed123"><i
                                        class="fa-brands fa-twitter fa-lg twitter rounded-circle p-2"></i></a>
                            </li>
                            <li>
                                <a class="d-block text-light"
                                    href="https://www.linkedin.com/in/badr-mohamed-621747206"><i
                                        class="fa-brands fa-linkedin fa-lg linkedin rounded-circle p-2"></i></a>
                            </li>
                            <li>
                                <a class="d-block text-light" href="https://www.youtube.com/"><i
                                        class="fa-brands fa-youtube fa-lg youtube rounded-circle p-2"></i></a>
                            </li>
                        </ul>
                        <div class="copyright">
                            Created By <span>Creative Group</span>
                            <div>&copy; 2022 - <span>DOC LINE</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer -->

    <!-- scroll to top button -->
    <button id="scroll"><i class="fa-solid fa-angles-up"></i></button>
    <!-- end of scroll to top button -->

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    @stack('js')
</body>

    <script>
        let array= "ay kalam fady "
        let y = document.getElementById('kalam')
        function setlocalStorage(){ localStorage.setItem('user', array)
    } 
        let x = localStorage.getItem('user')
            setlocalStorage();

            y.innerHTML = localStorage.getItem('user')

        console.log(x)
    </script>
</html>