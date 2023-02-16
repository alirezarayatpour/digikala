@extends('layouts.app')

@section('css')
@endsection

@section('content')

   <!--! Contetn -->
   <div class="container-fluid top-space-2">
      <div class="container">
         <div class="row">

            @include('layouts.aside')

            <div class="col-xl-9">
               
               <div class="profile-border identity-confirmation-box">

                  <div class="row">
                     <div class="col-xl-10">
                        <div class="safty-text">
                           <i class="bi bi-info-circle"></i>
                           <span>
                              برای افزایش امنیت حساب کاربری خود و جلوگیری از سوءاستفاده، لطفا هویت خود را تایید کنید
                           </span>
                        </div>
                     </div>
                     <div class="col-xl-2 everything-left">
                        <a href="#" class="identity-confirmation">
                           تأیید هویت
                           <i class="fas fa-angle-left me-1"></i>
                        </a>
                     </div>
                  </div>

               </div>

               <div class="profile-border mt-3">

                  <div class="d-flex">
                     <div class="w-50">
                        <h6 class="cash-gift">
                           سفارش‌های من
                        </h6>
                        <span class="line-5"></span>
                     </div>
                     <div class="w-50 everything-left">
                        <a href="#" class="see-store-link">مشاهده همه<i class="fas fa-chevron-left me-2"></i></a>
                     </div>
                  </div>

                  <div class="row mt-3">

                     <div class="col-xl-4 col-4">
                        <div class="fashion-product-box-2">
                           <a href="#" class="d-xl-flex d-block position-relative">
                              <img src="{{ asset('Frontend/img/status-processing.svg') }}" alt="" class="img-fluid">
                              <div class="me-3">
                                 <div class="my-order-text-1 mt-2">0 سفارش</div>
                                 <div class="my-order-text-2 mt-2">جاری</div>
                                 <span class="my-order-text-3">0</span>
                              </div>
                           </a>
                        </div>
                     </div>

                     <div class="col-xl-4 col-4">
                        <div class="fashion-product-box-2">
                           <a href="#" class="d-xl-flex d-block position-relative">
                              <img src="{{ asset('Frontend/img/status-delivered.svg') }}" alt="" class="img-fluid">
                              <div class="me-3">
                                 <div class="my-order-text-1 mt-2">5 سفارش</div>
                                 <div class="my-order-text-2 mt-2">تحویل شده</div>
                                 <span class="my-order-text-3">5</span>
                              </div>
                           </a>
                        </div>
                     </div>

                     <div class="col-xl-4 col-4">
                        <div class="fashion-product-box-2">
                           <a href="#" class="d-xl-flex d-block position-relative">
                              <img src="{{ asset('Frontend/img/status-returned.svg') }}" alt="" class="img-fluid">
                              <div class="me-3">
                                 <div class="my-order-text-1 mt-2">0 سفارش</div>
                                 <div class="my-order-text-2 mt-2">مرجوع شده</div>
                                 <span class="my-order-text-3">0</span>
                              </div>
                           </a>
                        </div>
                     </div>

                  </div>

               </div>

               <div class="profile-border position-relative mt-3">

                  <div class="d-flex">
                     <div class="w-100">
                        <h6 class="cash-gift">
                           خریدهای پرتکرار شما
                        </h6>
                        <span class="line-5"></span>
                     </div>
                  </div>

                  <div class="swiper mySwiper2 mt-5" style="height: 300px">
                     <div class="swiper-wrapper">
   
                        <div class="swiper-slide">
                           <div class="fashion-product-box-2">
                              <a href="#">
                                 <img src="img/shirt-3.jpg" alt="" class="amazing-product-image">
                                 <div class="best-selling-product-title">تی شرت مردانه طرح گرگ کد S229</div>
                                    <div class="inventory mt-2">
                                       <span>تنها 3 عدد در انبار باقی مانده</span>
                                    </div>
                                 <div class="everything-left mt-3">
                                    <div class="w-50 text-start">
                                       <div class="everything-left">
                                          <span class="amazing-product-price">350,000</span>
                                          <span class="toamn">توما<span class="toamn-top">ن</span></span>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>

                        <div class="swiper-slide">
                           <div class="fashion-product-box-2">
                              <a href="#">
                                 <img src="img/shirt-3.jpg" alt="" class="amazing-product-image">
                                 <div class="best-selling-product-title">تی شرت مردانه طرح گرگ کد S229</div>
                                    <div class="inventory mt-2">
                                       <span>تنها 3 عدد در انبار باقی مانده</span>
                                    </div>
                                 <div class="everything-left mt-3">
                                    <div class="w-50 text-start">
                                       <div class="everything-left">
                                          <span class="amazing-product-price">350,000</span>
                                          <span class="toamn">توما<span class="toamn-top">ن</span></span>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>

                        <div class="swiper-slide">
                           <div class="fashion-product-box-2">
                              <a href="#">
                                 <img src="img/shirt-3.jpg" alt="" class="amazing-product-image">
                                 <div class="best-selling-product-title">تی شرت مردانه طرح گرگ کد S229</div>
                                    <div class="inventory mt-2">
                                       <span>تنها 3 عدد در انبار باقی مانده</span>
                                    </div>
                                 <div class="everything-left mt-3">
                                    <div class="w-50 text-start">
                                       <div class="everything-left">
                                          <span class="amazing-product-price">350,000</span>
                                          <span class="toamn">توما<span class="toamn-top">ن</span></span>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>

                        <div class="swiper-slide">
                           <div class="fashion-product-box-2">
                              <a href="#">
                                 <img src="img/shirt-3.jpg" alt="" class="amazing-product-image">
                                 <div class="best-selling-product-title">تی شرت مردانه طرح گرگ کد S229</div>
                                    <div class="inventory mt-2">
                                       <span>تنها 3 عدد در انبار باقی مانده</span>
                                    </div>
                                 <div class="everything-left mt-3">
                                    <div class="w-50 text-start">
                                       <div class="everything-left">
                                          <span class="amazing-product-price">350,000</span>
                                          <span class="toamn">توما<span class="toamn-top">ن</span></span>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>

                        <div class="swiper-slide">
                           <div class="fashion-product-box-2">
                              <a href="#">
                                 <img src="img/shirt-3.jpg" alt="" class="amazing-product-image">
                                 <div class="best-selling-product-title">تی شرت مردانه طرح گرگ کد S229</div>
                                    <div class="inventory mt-2">
                                       <span>تنها 3 عدد در انبار باقی مانده</span>
                                    </div>
                                 <div class="everything-left mt-3">
                                    <div class="w-50 text-start">
                                       <div class="everything-left">
                                          <span class="amazing-product-price">350,000</span>
                                          <span class="toamn">توما<span class="toamn-top">ن</span></span>
                                       </div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>

                     </div>   
                  </div>
                  
                  <div class="swiper-arrow-next"><i class="fas fa-chevron-left"></i></div>
                  <div class="swiper-arrow-previous"><i class="fas fa-chevron-right"></i></div> 

               </div>   

            </div>

         </div>
      </div>
   </div>
   <!--! Contetn -->

@endsection   

@section('js')
@endsection