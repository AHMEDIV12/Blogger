@extends('layouts.main')

@section('content')
<!-- Main Title -->
    <div class="container">
        <div class="top1">
            <div class="one">
                <h3>من نحن</h3>
            </div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
    </div>
<!-- End Main Title -->

<!-- Start About Section  -->
<section class="about">
    <div class="container">
        <div class="item-two">
            <div class="row">
                <div class="col-lg-7">
                    <h2>فكرة إنشاء موقع علاجك الطبي :</h2><br>
                    <p class="text-black-50">لمعرفة قصة إنشاء موقع علاجك الطبي، يجب أن نذهب في رحلة خاطفة عن مسيرة
                        الطبيب
                        العربي ابن سينا. ابن
                        سينا هو أحد العلماء المسلمين القدماء المؤثرين في تقدم علوم الطب، حيث استفادت دول العالم
                        الأخرى من
                        كتاباته. فيعتبر كتابه القانون في الطب مرجعاً مهماً، ويشكل اللبنة الأساسية لتطور علم الطب في
                        ذلك
                        العصر.
                        لا يزال شغف ابن سينا حي في نفس كل مسلم وعربي. إن تمييز وإبداع الأطباء العرب والمسلمين لدليل
                        على ذلك.
                    </p>
                    <h2>هدف إنشاء موقع علاجك الطبي :</h2> <br>
                    <p class="text-black-50">رفع مستوى الوعي الصحي للقارئ العربي عن كل ما يتعلق بالأمراض وكيفية
                        التعامل
                        معها.</p>
                </div>
                <div class="col-lg-5">
                    <div class="image">
                        <img src="../imgs/about-us-image.jpg" alt="doctor image" class="w-100">
                    </div>
                </div>
            </div>
            <hr>
            <div class="Features-2 text-center py-4">
                <h2> مميزات موقع علاجك الطبي :</h2>
            </div>
            <div class="row py-3">
                <div class="col-md-4">
                    <div class="Features text-center py-3 my-3 pt-4 pb-4">
                        <i class="fas fa-bookmark icon "></i>
                        <h3 class=" py-3">التميز</h3>
                        <h5 class="text-black-50">يضم فريق الموقع مجموعة من الأطباء المتمييزين وبتخصصات متعددة.</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Features text-center py-3 my-3 pt-4 pb-4">
                        <i class="fas fa-book-reader icon"></i>
                        <h3 class=" py-3">العلم</h3>
                        <h5 class="text-black-50">يستمد موقع علاجك الطبي المعلومات الواردة فيه من عدة مصادر علمية
                            عالمية </h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Features text-center py-3 my-3 pt-4 pb-4">
                        <i class="fas fa-chalkboard icon"></i>
                        <h3 class=" py-3">الاستفادة</h3>
                        <h5 class="text-black-50">يشكل الموقع أول مرجع مفيد للمريض يساعد على زيادة مساهمته في العلاج
                            .</h5>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="sections">
                <h2 class=" py-3 my-2">اقسام موقع علاجك الطبي : </h2>
                <h5 class=" py-3 my-2 text-light">ينقسم موقع علاجك الطبي إلى ٤ أقسام رئيسية، يحتوي كل قسم على
                    قوائم المواضيع
                    التي يمكن تصفحها:</h5>
                <ul style="margin-bottom: 0;">
                    <li>الامراض :</li>
                    <p class="text-light">يحتوي على موسوعة متكاملة عن جميع الأمراض. أسباب المرض وأعراضه. بالإضافة
                        إلى تفاصيل عن طرق
                        العلاج وأساليب الوقاية منها. يحتوي أيضاً على معلومات قيمة عن الحالات التي تستدعي مراجعة
                        الطبيب. وما اختصاص الطبيب الأنسب للتعامل مع هذه الحالات.</p>
                    </li>
                    <li>الفحوصات :</li>
                    <p class="text-light">موسوعة خاصة بكل فحص طبي فهناك جزء خاص بترجمة الفحوصات والتحاليل
                        المخبرية. فيساعدك على فهم
                        تفسير نتائج الفحوصات وتساعدك على فهم كيفية تشخيص الأطباء للمرض.</p>
                    <li>الحمية الغذائية :</li>
                    <p class="text-light">يتطرق هذا الجزء من الموقع بالحميات الغذائية الخاصة بالأمراض. (مثلاً
                        حمية مرضى الكلى).</p>
                    <li>الادوية :</li>
                    <p class="text-light mb-0 pb-3">يتضمن قائمة بأهم الأدوية وشرح تفصيلي عن كل دواء. ومعلومات عن سبب
                        استخدام الدواء، طريقة تناول
                        الدواء وأهم النصائح التحذيرية المتعلقة بالدواء.</p>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection