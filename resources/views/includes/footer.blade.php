<?php
$data  = \App\Models\Settings::find(1);
$about = \DB::table('about_associations')
          ->select('facebook','twitter','instagram','linkedin')
          ->get();
 ?>
<!-- Start Footer  -->
<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <p class="about">
          تهدف جمعية البر الخيرية بمحافظة
المويه إلى تقديم الخدمات التي
تحتاجها المحافظة والمراكز التابعة له
        </p>
        <div class="social">
          <div class="h6"> تابعنا عبر وسائل التواصل الاجتماعي:</div>
            <a target="_blank" href="{{$about[0]->facebook}}"><img src="{{url('design/facebook.png')}}"></a>
            <a target="_blank" href="{{$about[0]->twitter}}"><img src="{{url('design/twitter.png')}}"></a>
            <a target="_blank" href="{{$about[0]->instagram}}"><img src="{{url('design/instagram.png')}}"></a>
            <a target="_blank" href="{{$about[0]->linkedin}}"><img src="{{url('design/linkedin.png')}}"></a>	
        </div>
      </div>
      <div class="col-sm-3">
        <div class="contact-info fix-footer"> معلومات التواصل</div>
        <ul class="list-unstyled">

          <li ><a href="tel:+055 283-1282" dir="ltr">الهاتف:  {{$data->phoneNumber ?? ''}}</a></li>
          <li class="d-block">العنوان: {{$data->foundationTitle ?? ''}}  </li>
        </ul>
        <div class="pay-by">
          <div class="h6"> نقبل الدفع بواسطة</div>
          <a onclick="return false" href="#" data-toggle="tooltip"  offset="2" data-placement="bottom" title="Amazon" ><i class="fa fa-amazon fa-lg"></i></a>
          <a onclick="return false" href="#" data-toggle="tooltip"  offset="2" data-placement="bottom" title="Visa"><i class="fa fa-cc-visa fa-lg" aria-hidden="true"></i></a>
          <a onclick="return false" href="#" data-toggle="tooltip"  offset="2" data-placement="bottom" title="Paypal"><i class="fa fa-cc-paypal fa-lg"></i></a>
          <a onclick="return false" href="#" data-toggle="tooltip"  offset="2" data-placement="bottom" title="Creditcard"><i class="fa fa-credit-card fa-lg" aria-hidden="true"></i></i></a>
          <a onclick="return false" href="#" data-toggle="tooltip"  offset="2" data-placement="bottom" title="Mastercard"> <i class="fa fa-cc-mastercard fa-lg" aria-hidden="true"></i></a>
        </div>
        </div>
        <div class="col-sm-3">
          <div class="d-flex fix-footer menu-phone">القائمة </div>
          <ul class="list-unstyled">
            <li>
              <a href="{{url('aboutus')}}">من نحن</a>
            </li>
            <li>
              <a href="{{url('ourproject')}}">مشاريعنا</a>
            </li>
            <li>
              <a href="{{url('paymethod')}}" >طرق التبرع</a>
            </li>
            <li>
              <a href="{{url('jobs')}}">وظائف</a>
            </li>
            <li>
              <a href="{{url('contact')}}" > الاتصال بالجمعية  </a>
            </li>
          </ul>
        </div>

        <div class="col-sm-3">
					<div class="d-flex fix-footer menu-phone">مركز المساعدة </div>
					<ul class="list-unstyled">
            <li>
              <a href="#">شروط وسياسة التبرع</a>
            </li>
            <li>
              <!--<a href="#" >ارجاع واسترداد المنتجات  </a>-->
            </li>
            <li>
              <a href="#">سياسة الخصوصية</a>
            </li>
            <li>
              <a href="#" >  الدليل الارشادي</a>
            </li>
          </ul>
        </div>
    </div>
    <hr style="border-bottom:2px solid #DDD"/>
    <div class="copyright">
      <div class="footer-left">
          جميع الحقوق محفوظة لدى جمعية البر الخيرية بمحافظة الموية  تصميم نوافذ الابداع
       </div>

      <div class="footer-right">
        {{date('Y')}}
      </div>
    </div>
  </div>
</div>

<!-- End Footer  -->
