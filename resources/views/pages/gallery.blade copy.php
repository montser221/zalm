@extends('layouts.app')

@section('title','    البوم الصور ')

@include('includes.header')
<div class="dulni">
  <!--Start Banner-->
  <div class="  px-0 banner" id="dulani-banner">
    <div class="dulni-inner">
      <div class="container">
        <div class="page-path">
          <p><a href="{{url("/")}}"> الرئيسية </a>/     البوم الصور       </p>
        </div>
      </div>
    </div>

  </div>
        <!-- End Banner-->

      <!-- Start Dullani Form-->
        <div class="gallery mx-auto">
          <div class="container" id="dulani-form-container">
            
            <h3 class="text-center mt-5 mb-2 main-color">       البوم الصور    </h3>
            <div class="text-center mt-3 mb-5"><img src="{{url('design/shape.png')}}"></div>

              <div class="gallery-images">
               <div class="img">
                <img src="http://127.0.0.1:8000/storage/uploads/images/My7DYIkyjTjPkOgAufArMHAhX487azctR07dLO04.jpeg" alt="" /> 
               </div>
               <div class="img">
                <img src="http://127.0.0.1:8000/storage/uploads/images/My7DYIkyjTjPkOgAufArMHAhX487azctR07dLO04.jpeg" alt="" /> 
               </div>
               <div class="img">
                <img src="http://127.0.0.1:8000/storage/uploads/images/My7DYIkyjTjPkOgAufArMHAhX487azctR07dLO04.jpeg" alt="" /> 
               </div>
              </div>
              <div class="gallery-images">
               <div class="img">
                <img src="http://127.0.0.1:8000/storage/uploads/images/My7DYIkyjTjPkOgAufArMHAhX487azctR07dLO04.jpeg" alt="" /> 
               </div>
               <div class="img">
                <img src="http://127.0.0.1:8000/storage/uploads/images/My7DYIkyjTjPkOgAufArMHAhX487azctR07dLO04.jpeg" alt="" /> 
               </div>
               <div class="img">
                <img src="http://127.0.0.1:8000/storage/uploads/images/My7DYIkyjTjPkOgAufArMHAhX487azctR07dLO04.jpeg" alt="" /> 
               </div>
              </div>

              <div class="gallery-images">
                @foreach ($allimages as $img)
                <div class="img">
                  <img src="{{ url('storage/'.$img->imageFile) }}" alt="{{ $img->imageTitle }}" /> 
                </div>
                @endforeach
              </div>
             
              {{-- <div class="row mb-5">
               @foreach ($allimages as $img)
               <div class="col-md-4 col-sm-6 img">
                <img src="{{ url('storage/'.$img->imageFile) }}" alt="{{ $img->imageTitle }}" /> 
               </div>
               @endforeach
              </div> --}}
         
          
          </div>
      </div>
    {{ $allimages->links() }}
    </div>
</div>
@include('includes.footer')
