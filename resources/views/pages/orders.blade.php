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
               
               <div class="profile-border position-relative">

                  <div class="d-flex">
                     <div class="w-50">
                        <h6 class="cash-gift">
                           تاریخچه سفارشات
                        </h6>
                     </div>
                     <div class="w-50 everything-left">
                        <i class="bi bi-search" role="button"></i>
                     </div>
                  </div>

                  <div class="mt-4 border-bottom">
                     <button class="order-page-button order-page-button-active">جاری</button>
                     <button class="order-page-button">تحویل شده<span class="badge bg-badge me-1">5</span></button>
                     <button class="order-page-button">مرجوع شده<span class="badge bg-badge me-1">0</span></button>
                     <button class="order-page-button">لغو شده<span class="badge bg-badge me-1">1</span></button>
                  </div>

                  <!--! جاری -->
                  <div class="content-box" style="display: block;">
                     <div class="empty-order">
                        <img src="img/order-empty.svg" alt="" class="img-fluid">
                        <div class="text-black-digikala">هنوز هیچ سفارشی ندارید</div>
                     </div>
                  </div>

                  <!--! تحویل شده -->
                  <div class="content-box" style="display: none;">

                     <div class="profile-border position-relative mt-4">
                        <a href="#">
   
                           <div class="d-flex align-items-center justify-content-between">
                              <div class="everything-center">
                                 <i class="bi bi-check-circle-fill ms-2 check-circle-icon"></i>
                                 <span class="deliverd-title">تحویل شده</span> 
                              </div>
                              <i class="fa fa-angle-left deliverd-title"></i>
                           </div>
   
                           <div class="mt-4">
                              <ul class="orders-desc">
   
                                 <li class="best-selling-product-rate ms-3">
                                    <span class="amazing-product-price text-gray-digikala">1 شهریور 1401</span>
                                 </li>
   
                                 <span class="sort-product-view-circle ms-3 mt-1"></span>
   
                                 <li class="best-selling-product-rate ms-3">
                                    <span class="text-silver-digikala">کد سفارش</span>
                                    <span class="amazing-product-price">217171777</span>
                                 </li>
   
                                 <span class="sort-product-view-circle mt-1"></span>
   
                                 <li class="best-selling-product-rate me-xl-3">
                                    <span class="text-silver-digikala">مبلغ</span>
                                    <span class="amazing-product-price">52,989,000</span>
                                    <span class="toamn">توما<span class="toamn-top">ن</span></span>
                                 </li>
   
                              </ul>
                           </div>
   
                           <div class="show-best-seller border-bottom d-xl-flex d-none">
                              <img src="img/club-point.svg" alt="" width="24px" height="24px" class="ms-2">
                              <div class="text-silver-digikala">امتیاز دیجی‌کلاب</div>
                              <span class="me-2">8</span>
                           </div>
   
                           <div class="border-bottom">
                              <img src="img/iphone-1.jpg" alt="" class="img-fluid d-block m-3" width="64px" height="64px">
                           </div>
   
                           <a href="#" class="see-factor everything-left mt-3">
                              <i class="bi bi-paperclip"></i>
                              مشاهده فاکتور
                           </a>
   
                        </a>
                     </div>
   
                     <div class="profile-border position-relative mt-4">
                        <a href="#">
   
                           <div class="d-flex align-items-center justify-content-between">
                              <div class="everything-center">
                                 <i class="bi bi-check-circle-fill ms-2 check-circle-icon"></i>
                                 <span class="deliverd-title">تحویل شده</span> 
                              </div>
                              <i class="fa fa-angle-left deliverd-title"></i>
                           </div>
   
                           <div class="mt-4">
                              <ul class="orders-desc">
   
                                 <li class="best-selling-product-rate ms-3">
                                    <span class="amazing-product-price text-gray-digikala">1 شهریور 1401</span>
                                 </li>
   
                                 <span class="sort-product-view-circle ms-3 mt-1"></span>
   
                                 <li class="best-selling-product-rate ms-3">
                                    <span class="text-silver-digikala">کد سفارش</span>
                                    <span class="amazing-product-price">217171777</span>
                                 </li>
   
                                 <span class="sort-product-view-circle mt-1"></span>
   
                                 <li class="best-selling-product-rate me-xl-3">
                                    <span class="text-silver-digikala">مبلغ</span>
                                    <span class="amazing-product-price">52,989,000</span>
                                    <span class="toamn">توما<span class="toamn-top">ن</span></span>
                                 </li>
   
                              </ul>
                           </div>
   
                           <div class="show-best-seller border-bottom d-xl-flex d-none">
                              <img src="img/club-point.svg" alt="" width="24px" height="24px" class="ms-2">
                              <div class="text-silver-digikala">امتیاز دیجی‌کلاب</div>
                              <span class="me-2">8</span>
                           </div>
   
                           <div class="border-bottom">
                              <img src="img/iphone-1.jpg" alt="" class="img-fluid d-block m-3" width="64px" height="64px">
                           </div>
   
                           <a href="#" class="see-factor everything-left mt-3">
                              <i class="bi bi-paperclip"></i>
                              مشاهده فاکتور
                           </a>
   
                        </a>
                     </div>

                  </div>

                  <!--! مرجوع شده -->
                  <div class="content-box" style="display: none;">
                     <div class="empty-order">
                        <img src="img/order-empty.svg" alt="" class="img-fluid">
                        <div class="text-black-digikala">هنوز هیچ سفارشی ندارید</div>
                     </div>
                  </div>

                  <!--! لغو شده -->
                  <div class="content-box" style="display: none;">

                     <div class="profile-border position-relative mt-4">
                        <a href="#">
   
                           <div class="d-flex align-items-center justify-content-between">
                              <div class="everything-center">
                                 <i class="bi bi-x-circle-fill ms-2 x-circle-icon"></i>
                                 <span class="deliverd-title">لغو شده</span> 
                              </div>
                              <i class="fa fa-angle-left deliverd-title"></i>
                           </div>
   
                           <div class="mt-4 border-bottom">
                              <ul class="orders-desc">
   
                                 <li class="best-selling-product-rate ms-3">
                                    <span class="amazing-product-price text-gray-digikala">1 شهریور 1401</span>
                                 </li>
   
                                 <span class="sort-product-view-circle ms-3 mt-1"></span>
   
                                 <li class="best-selling-product-rate ms-3">
                                    <span class="text-silver-digikala">کد سفارش</span>
                                    <span class="amazing-product-price">217171777</span>
                                 </li>
   
                                 <span class="sort-product-view-circle mt-1"></span>
   
                                 <li class="best-selling-product-rate me-xl-3">
                                    <span class="text-silver-digikala">مبلغ</span>
                                    <span class="amazing-product-price">52,989,000</span>
                                    <span class="toamn">توما<span class="toamn-top">ن</span></span>
                                 </li>
   
                              </ul>
                           </div>
   
                           <div>
                              <img src="img/iphone-1.jpg" alt="" class="img-fluid d-block m-3" width="64px" height="64px">
                           </div>
   
                        </a>
                     </div>

                  </div>

               </div>   

            </div>

         </div>
      </div>
   </div>
   <!--! Contetn -->

@endsection   

@section('js')
@endsection