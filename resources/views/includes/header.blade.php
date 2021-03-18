{{-- Start Header --}}
<!-- Strt header top -->
<?php
$data = \App\Models\Settings::find(1);
$otherFiles = \App\Models\OtherMember::all();
 ?>


<div id="header-top">
    <div class="container">
      <div class="row">
       <div class="col-lg-8 col-sm-6">
         <ul class="nav-top list-unstyled">
            <li>
                <a href="{{route('zakat')}}">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calculator" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
  <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z"/>
</svg>
               حساب الزكاة</a>
            </li>
          {{-- <li>
              <i class="fa fa-user" aria-hidden="true"></i>
            <a target="_blank" href="{{ route('login') }}" >تسجيل دخول</a>
          </li> --}}
        </ul>
       </div>
       <div class="col-lg-4 line-fix col-sm-6" >
         <div class="top-lang">
              <form class="">
                   <!-- <select id="lang-switch">
                      <option value="ar">عربي</option>
                      <option value="en">English</option>
                  </select> -->
              </form>
          </div>



          <div class="top-mail">
                   <a href="mailto:{{$data->email ?? ' '}}"> {{$data->email ?? ''}}</a>
               <i class="fa fa-envelope" aria-hidden="true"></i>
          </div>
          <div class="top-tel">
               | <a href="tel:+055 283-1282" dir="ltr"> {{$data->phoneNumber ?? ''}}</a>
               <i class="fa fa-phone" aria-hidden="true"></i>
          </div>

       </div>
      </div>
    </div>
</div>
<!-- end header top -->
<!-- Start Navbar -->
<div class="container navbar-fix">
  <div class="main-cart">
    <a href="{{route('cart')}}">
      <div class="" style="position:relative;">

        <span class="count">{{\Session::get('cart')->totalQty ?? 0 }}</span>
      </div>
       <i class="fa fa-shopping-basket"></i>
      {{-- <i class="fa fa-chevron-down" aria-hidden="true"></i> --}}
    </a>
  </div>
  <div class="row">
    <div class="col-lg-10">
      <nav class="navbar navbar-expand-lg navbar-light">

        <a class="navbar-brand" href="{{route("/")}}" {{$data->foundationName  ?? ' '}} >
          <img class="brand-img"  src="@if( isset($data->foundationLogo) ) {{url( "uploads/settings/". $data->foundationLogo )}}
          @else alt=""
          @endif " class="dashboard-logo"  >

         </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">


            <li class="nav-item active">
              <a class="nav-link" href="{{route("/")}}">الرئيسية <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             من نحن
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                   <a class="dropdown-item" href="{{route('aboutus')}}/#about">من نحن</a>
                   <a class="dropdown-item" href="{{route('aboutus')}}/#word"> عن الجمعية</a>
                   <a class="dropdown-item"href="{{route('aboutus')}}/#member"> اعضاء مجلس الإداره</a>
                   @isset($otherFiles)
                    @foreach ($otherFiles as $file)
                      <a class="dropdown-item"href="{{ url( $file->memFile) }}"  target="_blank"> {{ $file->memName }} </a>
                    @endforeach
                   @endisset
             </div>
           </li>

            <li class="nav-item">
              <a href="{{route('ourproject')}}" class="nav-link">مشاريعنا</a>
            </li>

            {{-- <li class="nav-item">
              <a href="{{route('urgentproject')}}" class="nav-link">م علجلة</a>
            </li> --}}


            <li class="nav-item">
              <a href="{{route('paymethod')}}" class="nav-link">طرق التبرع</a>
            </li>
            <li class="nav-item">
              <a href="{{route('jobs.index')}}" class="nav-link">وظائف</a>
            </li>
            <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLinkLib" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             المكتبة الأعلامية
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkLib">
                    <a class="dropdown-item" href="{{route('allFiles')}}"> اللوائح والسياسات العامة </a>
                    <a class="dropdown-item"href="{{route('allReportFiles')}}">  التقارير المالية </a>
                    <a class="dropdown-item"href="{{route('associcFiles')}}">   محاضر الجمعية العمومية  </a>
                    <a class="dropdown-item"href="{{route('allreports')}}">{{ __('reports.reportTitle') }}</a>
                   <a class="dropdown-item" href="{{route('allVideos')}}"> البوم الفيديو </a>
                    <a class="dropdown-item"href="{{route('gallery')}}">البوم الصور</a>

                </div>
           </li>
            <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLinkSer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               الخدمات الالكترونية
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkSer">
                  <a class="dropdown-item" href="https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAAZ__vK183RUOFFDVzYxRlc0UEJRTDlNWTVTRDQzUDE2WC4u">   طلب عضو منتسب </a>
                  <a class="dropdown-item" href="https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAAZ__vK183RURjJWR1k1TUNKVVo4SFMzRlFOWVBaNjJZSC4u"> طلب عضو عامل   </a>
                  <a class="dropdown-item" target="_blank" href="https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAAZ__vK183RUODY0U05IMExGSFdXR0I0MVZNTUVVOFA3NC4u">  تقييم رضا المستفيدين والعملاء  </a>
                  <a class="dropdown-item" href="{{route("voluntary.index")}}"> بوابة المتطوعين</a>
                  <a class="dropdown-item" href="{{route('benfit.index')}}"> تسجيل مستفيد</a>
                  <a class="dropdown-item" href="{{route('dulni.index')}}">دلني على محتاج</a>
              </div>
           </li>
            <li class="nav-item">
              <a href="{{route('contact.index')}}" class="nav-link"> 
                 الاتصال بالجمعية
              </a>
            </li>
        </div>
      </nav>
    </div>


    <!--donation button-->
    <div class="col-lg-2 d-xs-none d-md-block phone-hidden" id="donate-now">
      <a href="{{route("cart")}}">
      <button class="custom-button" >
        <div id="ellipse"></div>
        <!-- <i class="fa fa-shopping-basket" aria-hidden="true"></i> -->
        <span>تبرع الآن</span>
      </button>
      </a>
    </div>
  </div>
</div>


<!-- End Navbar -->
{{-- End Header --}}
