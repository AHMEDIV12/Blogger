@extends('layouts.main')



@section('content')

    <!-- Main Title -->
    <div class="container">
        @auth
            @if((auth()->user()->category == 'admin') || (auth()->user()->category == 'doctor'))
                <div class="card-header">
                    <div class="row d-flex justify-content-evenly align-items-center">
                        <div class="col-6 d-flex justify-content-evenly align-items-center">
                            <a href="{{ route('drugs_create') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
        <div class="top1">
            <div class="one">
                <h3> اشهر الادوية</h3>
            </div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
    </div>
    <!-- End Main Title -->

    <!-- Start Medicine Cards -->
    <div class="container-fluid" style="border-top: 20px solid #ececec; text-align: center;">
        
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        <div class="container">
            <!-- اشهر الأدويه -->

            <!-- row of drugs -->
            @if ($drugs->count() > 0)
                <div class="row" style="padding-top: 20px;">
                    @foreach ($drugs as $drug)
                        <div class="col-sm-6 col-md-6 col-lg-4 pt-3">
                            <div class="card">
                                <div class="card-header">
                                    @auth
                                        @if((auth()->user()->category == 'admin') || (auth()->user()->category == 'doctor'))
                                            <div class=" btn-focus d-flex jusstify-content-start m-2 align-items-center">
                                                <a href="{{route('drugs_edit' , $drug->id )}}" class="ml-1">
                                                    <button  id="editproject"  class="edit-btn btn btn-warning btn-sm mr-2 btn d-flex justify-content-center align-items-center"  >
                                                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                                    </button>
                                                </a>

                                                <form action="{{route('drugs_delete' , $drug->id)}}" method="POST" class="mr-2">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm mr-2 d-flex justify-content-center align-items-center ">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                                <img src="{{$drug->img}}" width="354px" height="235px" alt="drug" class="card-img-top">
                                <div class="card-body">
                                    <h4 class="card-title">{{$drug->title}}</h4>
                                    <p class="card-text">{{$drug->desc}}</p>
                                    <a href="https://www.google.com/search?q={{$drug->title}}&oq={{$drug->title}}&aqs=chrome..69i57j0i10i433j0i10l8.4641j0j7&sourceid=chrome&ie=UTF-8" class="card-link">المزيد</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- first row of cards -->
                <div class="row" style="padding-top: 20px;">
                    <div class="col-sm-6 col-md-6 col-lg-4 pt-3">
                        <div class="card">
                            <img src="../imgs/drugs-images/comtrex.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">كومتركس</h4>
                                <p class="card-text">تستخدم اقراص كومتركس المغلفه لعلاج نزلات البرد والانفلونزا , فيعمل علي
                                    تسكين الألم, ويخفض الحراره , ويعالج الرشحوالعطس</p>
                                <a href="#" class="card-link">المزيد</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 pt-3">
                        <div class="card">
                            <img src="../imgs/drugs-images/omeprazole.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">اوميبرازول</h4>
                                <p class="card-text">أوميبرازول صوديوم، عبارة عن دواء يعمل على تثبيط عمل مضخة البروتون
                                    الموجودة في المعدة ويعمل على قمع إفراز حمض المعدة</p>
                                <a href="https://www.google.com/search?q=اوميبرازول&oq=اوميبرازول&aqs=chrome..69i57j0i10i433j0i10l8.4641j0j7&sourceid=chrome&ie=UTF-8" class="card-link">المزيد</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 pt-3">
                        <div class="card">
                            <img src="../imgs/drugs-images/fluoxetine.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">فلوكستين</h4>
                                <p class="card-text">فلوكسيتين هو مضاد للاكتئاب يؤثر على المواد الكيميائية الموجود في الدماغ
                                    والتي تكون غير متوازنة في الأشخاص المصابين بالاكتئاب</p>
                                <a href="#" class="card-link">المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- second row of cards -->
                <div class="row" style="padding-top: 20px;">
                    <div class="col-sm-6 col-md-6 col-lg-4 pt-3">
                        <div class="card">
                            <img src="../imgs/drugs-images/librax.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">ليبراكس</h4>
                                <p class="card-text">يعتبر ليبراكس Librax، من أشهر الأدوية المستخدمة في علاج متلازمة القولون
                                    العصبي، وتختلف جرعته من مريض لآخر، حسب العمر والحالة الصحية</p>
                                <a href="#" class="card-link">المزيد</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 pt-3">
                        <div class="card">
                            <img src="../imgs/drugs-images/penicillin.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">بنسيلين</h4>
                                <p class="card-text">البنسلين (Penicillin) هو نوع من أنواع المضادات الحيوية التي لا تزال تعد
                                    حتى يومنا هذا أحد أبرز الاكتشافات الطبية التي شهدها العالم خلال القرن العشرين</p>
                                <a href="#" class="card-link">المزيد</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4 pt-3">
                        <div class="card">
                            <img src="../imgs/drugs-images/clonidine.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">كلونيدين</h4>
                                <p class="card-text">يستخدم لعلاج ارتفاع ضغط الدم عن طريق خفض معدل ضربات القلب وتوسيع
                                    الأوعية الدموية حتى يتدفق الدم بسهولة أكبر عبر الجسم.</p>
                                <a href="#" class="card-link">المزيد</a>
                            </div>
                        </div>
                    </div>

                </div>

            @endif
        </div>
    <!-- End Medicine Cards -->

@endsection