@extends('layouts.app')

@section('css')
@endsection

@section('content')

   <!--! Link -->
   <div class="container-fluid top-space-1">
      <div class="container">
         <div class="row">

            <div class="col-xl-6">
               <ul class="sort-link">

                  <li><a href="{{ route('pages.index') }}" class="sort-link-item">
                     دیجی‌کالا
                     <span>/</span>
                  </a></li>

                  <li><a href="{{ route('pages.main', $product->category->parent_id) }}" class="sort-link-item">
                     @foreach ($categories as $item)
                        @if($item->id == $product->category->parent_id)
                           {{ $item->category }}
                        @endif
                     @endforeach
                     <span>/</span>
                  </a></li>

                  @foreach ($parents as $item)
                     @if($item->id == $product->category->child_id)
                        <li><a href="{{ route('pages.category', $item->slug) }}" class="sort-link-item">
                           {{ $item->category }}
                           <span>/</span>
                        </a></li>
                        @endif
                     @endforeach

                  <li><a href="{{ route('pages.category', $product->category->slug) }}" class="sort-link-item">
                     {{ $product->category->category }}
                  </a></li>

               </ul>
            </div>

            <div class="col-xl-6">
               <div class="sort-link-advertisement">
                  <li><a href="#" class="sort-link-item-advertisement">
                     ثبت آگهی در پیندو
                     <i class="bi bi-megaphone me-2"></i>
                  </a></li>
                  <li><a href="#" class="sort-link-item-advertisement">
                     فروش در دیجی‌کالا
                     <i class="bi bi-house me-2"></i>
                  </a></li>
               </div>
            </div>

         </div>
      </div>
   </div>
   <!--! Link -->

   <!--! Product -->
   <div class="container-fluid mt-5">
      <div class="container">
         <div class="row">

            <div class="col-xl-1 col-lg-1 aside-product">

               <form action="{{ route('add-to-favorite', $product->id) }}" method="POST" class="add-to-favorite-form">
                  @csrf
                  <button class="add-to-favorite-btn"><i class="bi bi-heart"></i></button>
                  <div class="slide-show">افزودن به علاقه‌مندی‌ها</div>
               </form>

               <form action="" class="add-to-favorite-form">
                  <button class="add-to-favorite-btn"><i class="bi bi-share-fill"></i></button>
                  <div class="slide-show">اشتراک‌گذاری</div>
               </form>

               <form action="" class="add-to-favorite-form">
                  <button class="add-to-favorite-btn"><i class="bi bi-bell"></i></button>
                  <div class="slide-show">اطلاع‌رسانی شگفت‌انگیز</div>
               </form>

               <form action="" class="add-to-favorite-form">
                  <button class="add-to-favorite-btn"><i class="bi bi-graph-up"></i></button>
                  <div class="slide-show">نمودار قیمت</div>
               </form>

               <form action="" class="add-to-favorite-form">
                  <button class="add-to-favorite-btn"><i class="bi bi-square-half"></i></button>
                  <div class="slide-show">مقایسه</div>
               </form>

               <form action="" class="add-to-favorite-form">
                  <button class="add-to-favorite-btn"><i class="bi bi-list"></i></button>
                  <div class="slide-show">اضافه به لیست</div>
               </form>

            </div>

            <div class="col-xl-3 col-lg-3 mt-xl-0 mt-3">

               <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                  class="swiper mySwiper5">
                  <div class="swiper-wrapper">

                     <!-- <div class="swiper-slide">
                        <video src="video/iphone-13.mp4" class="" controls></video>
                     </div> -->

                     <div class="swiper-slide">
                        {{-- <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="img-fluid product-image"/> --}}
                        <img src="{{ $product->cover }}" alt="" class="img-fluid product-image"/>
                     </div>

                     @foreach ($images as $image)
                        <div class="swiper-slide">
                           <img src="{{ asset('image/gallery').'/'.$image->image }}" alt="" class="img-fluid product-image"/>
                        </div>
                     @endforeach

                  </div>
               </div>

               <div thumbsSlider="" class="swiper mySwiper4">
                  <div class="swiper-wrapper">

                     <!-- <div class="swiper-slide">
                        <video src="video/iphone-13.mp4" class=""></video>
                     </div> -->

                     <div class="swiper-slide">
                        <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="img-fluid"/>
                     </div>

                     @foreach ($images as $image)
                        <div class="swiper-slide">
                           <img src="{{ asset('image/gallery').'/'.$image->image }}" alt="" class="img-fluid"/>
                        </div>
                     @endforeach

                  </div>
               </div>

            </div>

            <div class="col-xl-8 col-lg-8">

               <div class="row">

                  <div class="col-xl-12">
                     {{ $product->farsi_title }}
                  </div>

                  <div class="row mt-3">

                     <div class="col-xl-7 col-lg-7">

                        <div class="line-english-title">
                           <span class="english-title">
                              {{ $product->english_title }}
                           </span>
                        </div>

                        <div class="mt-4">
                           <ul class="d-flex">
                              <li class="best-selling-product-rate ms-3">
                                 <i class="bi bi-star-fill"></i>
                                 <span>
                                    @php
                                    $avg = 0;
                                    @endphp
                                    @foreach($productComment as $item)
                                       @php
                                          $avg = $avg + $item->rate;
                                       @endphp
                                    @endforeach
                                    @if ($item->product_id == $product->id)
                                       {{ $avg }}
                                    @endif
                                 </span>
                                 <span class="text-silver-digikala me-1">({{ $totalView }})</span>
                              </li>
                              <span class="sort-product-view-circle"></span>
                              <li class="sort-product-view">
                                 <a href="#opinions" class="sort-product-view-link">{{ $totalView }} دیدگاه</a>
                              </li>
                              <span class="sort-product-view-circle"></span>
                              <li class="sort-product-view">
                                 <a href="#" class="sort-product-view-link">{{ $totalQuestion }} پرسش</a>
                              </li>
                           </ul>
                        </div>

                        <div class="product-suugest-people">
                           <i class="bi bi-hand-thumbs-up ms-1 like-icon"></i>
                           <span>({{ $totalView }}) نفر از خریداران، این کالا را پیشنهاد کرده‌اند</span>
                           <i class="bi bi-info-circle me-1 info-icon" role="button">
                              <div class="slide-show mt-5">
                                 خریداران کالا با انتخاب یکی از گزینه‌های پیشنهاد یا عدم پیشنهاد،
                                 تجربه خرید خود را با کاربران به اشتراک می‌گذارند.
                              </div>
                           </i>
                        </div>

                        <div class="mt-4" style="border-bottom: 1px solid #e3e3e3;">
                           <h6>ویژگی‌ها</h6>

                           <div class="product-feture">
                              {!! $product->property !!}
                           </div>

                        </div>

                        <div class="hamta">
                           <i class="bi bi-info-circle ms-2"></i>
                           <div>
                              هشدار سامانه همتا: در صورت انجام معامله،
                              از فروشنده کد فعالسازی را گرفته و حتما در حضور ایشان، دستگاه را از طریق
                              #7777*، برای سیمکارت خود فعالسازی نمایید. آموزش تصویری در آدرس اینترنتی
                              hmti.ir/06 امکان برگشت کالا در گروه موبایل با دلیل "انصراف از خرید" تنها در صورتی مورد قبول است
                              که پلمب کالا باز نشده باشد. تمام گوشی‌های دیجی‌کالا ضمانت رجیستری دارند. در صورت وجود مشکل رجیستری،
                              می‌توانید بعد از مهلت قانونی ۳۰ روزه، گوشی خریداری‌شده را مرجوع کنید.
                           </div>
                        </div>

                        <div class="d-flex mt-3 detali-product-page">
                           <div class="w-50 p-3">
                              <div class="text-black-digikala">ارسال رایگان</div>
                              <div class="english-title py-3">برای سفارش‌ بالای ۵۰۰ هزار تومان</div>
                           </div>
                           <div class="w-50 everything-left">
                              <img src="img/normalFreeShippingTouchPointImage.d4416515.svg" alt="">
                           </div>
                        </div>

                        <div class="d-flex mt-3 detali-product-page">
                           <a href="#" class="w-100 p-3 detali-product-page-link">
                              <div class="detali-product-page-title d-flex align-items-center justify-content-between">
                                 بیمه تجهیزات دیجیتال - بیمه پارسیان
                                 <i class="fas fa-angle-left"></i>
                              </div>
                              <div class="english-title mt-3 py-2">با قابلیت جبران هزینه های تعمیر و تعویض یکساله</div>
                           </a>
                        </div>

                        <div class="d-flex mt-3 detali-product-page">
                           <a href="#" class="w-100 p-3 detali-product-page-link">
                              <div class="detali-product-page-title d-flex align-items-center justify-content-between">
                                 ویژه اعضای دیجی‌پلاس
                                 <i class="fas fa-angle-left"></i>
                              </div>
                              <div class="english-title mt-3 py-2">ارسال رایگان</div>
                              <div class="english-title py-3">امکان ارسال فوری (شهر تهران)</div>
                           </a>
                        </div>

                     </div>

                     <div class="col-xl-5 col-lg-5 mt-xl-0 mt-3">

                        <div class="product-seller-box">

                           <div class="d-flex">
                              <div class="w-50">فروشنده</div>
                              <a href="#other-seller" class=" w-50 other-seller-link-btn">6 فروشنده دیگر</a>
                           </div>

                           <div class="show-best-seller">
                              <img src="{{ asset('Frontend/img/favicon.png') }}" alt="" width="24px" height="24px" class="ms-3">
                              <div>
                                 <h6 class="text-black-digikala">دیجی‌کالا</h6>
                                 <div class="show-best-seller-detail">
                                    <span>100%</span> رضایت از کالا | عملکرد <span>عالی</span>
                                 </div>
                              </div>
                           </div>

                           <div class="show-best-seller">
                              <i class="bi bi-shield-check ms-3 me-1 shield-icon"></i>
                              <div>گارانتی ۱۸ ماهه آرکا تجارت بیستون</div>
                           </div>

                           <div class="pt-3 pb-3 px-1 border-bottom">
                              <div class="d-flex align-items-center justify-content-between">
                                 <div class="everything-center">
                                    <i class="bi bi-check-square ms-3 me-1 check-square-circle-icon"></i>
                                    <span class="deliverd-title">موجود در انبار دیجی‌کالا</span>
                                 </div>
                                 <i class="fa fa-angle-left x-circle-icon"></i>
                              </div>
                           </div>

                           <div class="show-best-seller">
                              <img src="{{ asset('Frontend/img/club-point.svg') }}" alt="" width="24px" height="24px" class="ms-3">
                              <div>150 امتیاز دیجی‌کلاب</div>
                              <i class="bi bi-info-circle me-1 info-club-icon" role="button">
                                 <div class="slide-show mt-5">
                                    بعد از پایان مهلت مرجوعی، برای دریافت امتیاز به صفحه ماموریت‌های کلابی سر بزنید.
                                 </div>
                              </i>
                           </div>

                           <div class="show-best-seller everything-left" style="border-bottom: none;">
                              <div class="d-flex">
                                 <div class="amazing-product-sale ms-2">
                                    @if($product->sale)
                                       <del>
                                          {{ number_format($product->price) }}
                                       </del>
                                    @endif
                                 </div>
                                 <div class="amazing-product-percent">{{ $product->sale }}%</div>
                              </div>
                           </div>
                           <div class="show-best-seller everything-left" style="border-bottom: none;">
                              <span class="amazing-product-price">
                                 @if($product->sale)
                                    {{ number_format($product->price - ($product->price *  $product->sale / 100)) }}
                                 @else
                                    {{ number_format($product->price) }}
                                 @endif
                              </span>
                              <span class="toamn">توما<span class="toamn-top">ن</span></span>
                           </div>

                           <div>
                              <form action="{{ route('add-to-cart', $product->slug) }}" method="POST">
                                 @csrf
                                 <button class="add-to-cart">افزودن به سبد</button>
                              </form>
                           </div>

                        </div>

                     </div>

                  </div>

               </div>

         </div>

         </div>
      </div>
   </div>
   <!--! Product -->

   <!--! Services -->
   <div class="container-fluid mt-xl-5 mt-0">
      <div class="container">
         <div class="row">

            <div class="product-service-page">
               @foreach ($service as $item)
                  <a href="#" class="product-service-link">
                     <div>
                        <img src="{{ asset('images/service').'/'.$item->image }}" alt="" class="footer-image">
                     </div>
                     <span class="text-center d-block">{{ $item->text }}</span>
                  </a>
               @endforeach
            </div>

         </div>
      </div>
   </div>
   <!--! Services -->

   <!--! Other Seller -->
   <div class="container-fluid mt-5">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 position-relative" id="other-seller">

               <div class="d-flex py-3">
                  <div class="w-100">
                     <h6 class="cash-gift">
                        فروشندگان این کالا
                     </h6>
                     <span class="line-5"></span>
                  </div>
               </div>

               @foreach ($sellers as $seller)
               <div class="row other-seller-product-page">

                  <div class="col-xl-3">
                     <div class="show-best-seller border-0">
                        {{-- <img src="img/favicon.png" alt="" width="24px" height="24px" class="ms-3"> --}}
                        <div>
                           <h6 class="text-black-digikala">{{ $seller->user->name }}</h6>
                           <div class="show-best-seller-detail">
                              <span>100%</span> رضایت از کالا | عملکرد <span>عالی</span>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-xl-3">
                     <div class="product-send-page pt-3 everything-right">
                        <i class="bi bi-truck"></i>
                        <span>ارسال دیجی‌کالا</span>
                     </div>
                  </div>

                  <div class="col-xl-3">
                     <div class="show-best-seller">
                        <i class="bi bi-shield-check ms-3 me-1 shield-icon"></i>
                        <div>گارانتی ۱۸ ماهه آرکا تجارت بیستون</div>
                     </div>
                  </div>

                  <div class="col-xl-2">
                     <div class="everything-left pt-3">
                        <span class="amazing-product-sale ms-1">
                           @if($seller->sale)
                              <del>
                                 {{ number_format($seller->price) }}
                              </del>
                           @endif
                        </span>
                        <span class="amazing-product-price">
                           @if($seller->sale)
                              {{ number_format($seller->price - ($seller->price *  $seller->sale / 100)) }}
                           @else
                              {{ number_format($seller->price) }}
                           @endif
                        </span>
                        <span class="toamn">توما<span class="toamn-top">ن</span></span>
                        <div class="amazing-product-percent me-1">{{ $seller->sale }}%</div>
                     </div>
                  </div>

                  <div class="col-xl-1">
                     <form action="{{ route('add-to-cart-2', $seller->id) }}" class="pt-2" method="POST">
                        @csrf
                        <button class="add-to-cart">افزودن به سبد</button>
                     </form>
                  </div>

               </div>
               @endforeach

            </div>
         </div>
      </div>
   </div>
   <!--! Other Seller -->

   <!--! Similar Products -->
   <div class="container-fluid mt-5">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 position-relative suggest-border">

               <div class="d-flex p-3">
                  <div>
                     <h6 class="cash-gift">
                        کالاهای مشابه
                     </h6>
                     <span class="line-5"></span>
                  </div>
               </div>

               <div class="swiper mySwiper">
                  <div class="swiper-wrapper">

                     @foreach ($products as $item)
                     <div class="swiper-slide">
                        <div class="fashion-product-box-2">
                           <a href="{{ route('pages.product', $item->slug) }}">
                              @if ($item->position == '1')
                                 <img src="{{ asset('Frontend/img/SpecialSell.svg') }}" alt="" class="pb-2">
                              @endif
                              @if ($item->position == '2')
                                 <img src="{{ asset('Frontend/img/IncredibleOffer.svg') }}" alt="" class="pb-2">
                              @endif
                              {{-- <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="amazing-product-image"> --}}
                              <img src="{{ $product->cover }}" alt="" class="amazing-product-image">
                              <div class="best-selling-product-title">
                                 {{ Str::limit($item->farsi_title, '55') }}
                              </div>
                              {{-- <div class="inventory mt-2">
                                 <span>تنها 3 عدد در انبار باقی مانده</span>
                              </div> --}}
                              <div class="d-flex mt-3">
                                 <div class="w-50">
                                    @if ($item->sale)
                                       <div class="amazing-product-percent">{{ $item->sale }}%</div>
                                    @endif
                                 </div>
                                 <div class="w-50 text-start">
                                    <div class="everything-left">
                                       <span class="amazing-product-price">
                                          @if($item->sale)
                                             {{ number_format($item->price - ($item->price *  $item->sale / 100)) }}
                                          @else
                                             {{ number_format($item->price) }}
                                          @endif
                                       </span>
                                       <span class="toamn">توما<span class="toamn-top">ن</span></span>
                                    </div>
                                    <span class="amazing-product-sale">
                                       @if($item->sale)
                                          <del>
                                             {{ number_format($item->price) }}
                                          </del>
                                       @endif
                                    </span>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </div>
                     @endforeach

                  </div>
               </div>

               <div class="swiper-arrow-next"><i class="fas fa-chevron-left"></i></div>
               <div class="swiper-arrow-previous"><i class="fas fa-chevron-right"></i></div>

            </div>
         </div>
      </div>
   </div>
   <!--! Similar Products -->

   <!--! Sort -->
   <div class="container-fluid mt-4">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">

               <div class="sort-introduction">
                  @if($product->intro)
                     <li>
                        <a href="#introduction" class="sort-introduction-item active">معرفی</a>
                        <div class="sort-introduction-item-active"></div>
                     </li>
                  @endif
                  @if ($product->expert)
                     <li>
                        <a href="#expert-check" class="sort-introduction-item">بررسی تخصصی</a>
                     </li>
                  @endif
                  @if ($product->specific)
                     <li>
                        <a href="#specifications" class="sort-introduction-item">مشخصات</a>
                     </li>
                  @endif
                     <li>
                        <a href="#opinions" class="sort-introduction-item">دیدگاه‌ها</a>
                     </li>
                     <li>
                        <a href="#questions" class="sort-introduction-item">پرسش‌ها</a>
                     </li>
               </div>

            </div>
         </div>
      </div>
   </div>
   <!--! Sort -->

   <!--! Content -->
   <div class="container-fluid mt-4">
      <div class="container">
         <div class="row">

            <div class="col-xl-9">

               <!--! معرفی -->
               @if($product->intro)
               <div id="introduction">

                  <div class="d-flex py-3">
                     <div>
                        <h6 class="cash-gift">
                           معرفی
                        </h6>
                        <span class="line-5"></span>
                     </div>
                  </div>

                  <div class="introduction-text">
                     {!! $product->intro !!}
                  </div>

                  <div role="button" class="show-more-desc">بیشتر</div>

               </div>

               <div class="line-6"></div>
               @endif

               <!--! بررسی تخصصی -->
               @if($product->expert)
               <div id="expert-check">

                  <div class="d-flex py-3">
                     <div>
                        <h6 class="cash-gift">
                           بررسی تخصصی
                        </h6>
                        <span class="line-5"></span>
                     </div>
                  </div>

                  <div class="expert-check-text">
                     {!! $product->expert !!}
                  </div>

                  <div role="button" class="show-more-desc">بیشتر</div>

               </div>

               <div class="line-6"></div>
               @endif

               <!--! مشخصات -->
               @if($product->specific)
               <div id="specifications">

                  <div class="d-flex py-3">
                     <div>
                        <h6 class="cash-gift">
                           مشخصات
                        </h6>
                        <span class="line-5"></span>
                     </div>
                  </div>

                  <div class="specifications-text">

                     <div class="row">
                        <div class="col-xl-3 text-black-digikala">مشخصات</div>

                        <div class="col-xl-9">

                           <div class="specifications-table">
                              <tr>
                                 <td>{!! $product->specific !!}</td>
                              </tr>
                           </div>

                        </div>

                     </div>

                  </div>

                  <div role="button" class="show-more-desc">بیشتر</div>

               </div>

               <div class="line-6"></div>
               @endif

               <!--! دیدگاه -->
               <div id="opinions">

                  <div class="d-flex py-3">
                     <div>
                        <h6 class="cash-gift">
                           امتیاز و دیدگاه کاربران
                        </h6>
                        <span class="line-5"></span>
                     </div>
                  </div>

                  <div class="row">

                     <div class="col-xl-3">

                        <div class="mt-3">

                           <div>
                              <span class="average-rate">
                                 @php
                                 $avg = 0;
                                 @endphp
                                 @foreach($productComment as $item)
                                    @php
                                       $avg = $avg + $item->rate;
                                       @endphp
                                 @endforeach
                                 @if ($item->product_id == $product->id)
                                    {{ $avg }}
                                 @endif
                              </span>
                              <span class="all-rate">از 5</span>
                           </div>

                           <div class="mt-3">
                              <span>
                                 @php
                              $avg = 0;
                              @endphp
                              @foreach($productComment as $item)
                                 @php
                                    $avg = $avg + $item->rate;
                                    @endphp
                              @endforeach
                              @for($i = 1; $i <= 5; $i++)
                                 @if ($i <= $avg && $item->product_id == $product->id)
                                    <i class="bi bi-star-fill star-size cheked"></i>
                                 @else
                                    <i class="bi bi-star-fill star-size"></i>
                                 @endif
                              @endfor
                              </span>
                              <span class="text-silver-digikala" style="font-size: 11px;">از مجموع {{ $totalView }} دیدگاه</span>
                           </div>

{{--                           <div class="mt-3">--}}

{{--                              <div class="mt-2">--}}
{{--                                 <div class="all-rate">کیفیت ساخت</div>--}}
{{--                                 <div class="d-flex mt-2">--}}
{{--                                    <div class="rate-progress">--}}
{{--                                       <div class="rate-progress-bar" role="progressbar" style="width: 90%;"></div>--}}
{{--                                    </div>--}}
{{--                                    <span class="all-rate me-2">4.7</span>--}}
{{--                                 </div>--}}
{{--                              </div>--}}

{{--                              <div class="mt-2">--}}
{{--                                 <div class="all-rate">ارزش خرید نسبت به قیمت</div>--}}
{{--                                 <div class="d-flex mt-2">--}}
{{--                                    <div class="rate-progress">--}}
{{--                                       <div class="rate-progress-bar" role="progressbar" style="width: 85%;"></div>--}}
{{--                                    </div>--}}
{{--                                    <span class="all-rate me-2">4.6</span>--}}
{{--                                 </div>--}}
{{--                              </div>--}}

{{--                              <div class="mt-2">--}}
{{--                                 <div class="all-rate">نوآوری</div>--}}
{{--                                 <div class="d-flex mt-2">--}}
{{--                                    <div class="rate-progress">--}}
{{--                                       <div class="rate-progress-bar" role="progressbar" style="width: 90%;"></div>--}}
{{--                                    </div>--}}
{{--                                    <span class="all-rate me-2">4.7</span>--}}
{{--                                 </div>--}}
{{--                              </div>--}}

{{--                              <div class="mt-2">--}}
{{--                                 <div class="all-rate">امکانات و قابلیت‌ها</div>--}}
{{--                                 <div class="d-flex mt-2">--}}
{{--                                    <div class="rate-progress">--}}
{{--                                       <div class="rate-progress-bar" role="progressbar" style="width: 90%;"></div>--}}
{{--                                    </div>--}}
{{--                                    <span class="all-rate me-2">4.7</span>--}}
{{--                                 </div>--}}
{{--                              </div>--}}

{{--                              <div class="mt-2">--}}
{{--                                 <div class="all-rate">سهولت استفاده</div>--}}
{{--                                 <div class="d-flex mt-2">--}}
{{--                                    <div class="rate-progress">--}}
{{--                                       <div class="rate-progress-bar" role="progressbar" style="width: 90%;"></div>--}}
{{--                                    </div>--}}
{{--                                    <span class="all-rate me-2">4.7</span>--}}
{{--                                 </div>--}}
{{--                              </div>--}}

{{--                              <div class="mt-2">--}}
{{--                                 <div class="all-rate">طراحی و ظاهر</div>--}}
{{--                                 <div class="d-flex mt-2">--}}
{{--                                    <div class="rate-progress">--}}
{{--                                       <div class="rate-progress-bar" role="progressbar" style="width: 90%;"></div>--}}
{{--                                    </div>--}}
{{--                                    <span class="all-rate me-2">4.7</span>--}}
{{--                                 </div>--}}
{{--                              </div>--}}

{{--                           </div>--}}

                           <div class="mt-4">
                              <div class="english-title">
                                 شما هم درباره این کالا دیدگاه ثبت کنید
                              </div>
                              <button class="mt-4 add-to-cart-list" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                 ثبت دیدگاه
                              </button>
                           </div>

                        </div>

                     </div>

                     <div class="col-xl-9">

                        <div class="opinions-text">

                           <div class="mt-4">
                              <ul class="sort">
                                 <li class="everything-center">
                                    <i class="bi bi-sort-down sort-icon"></i>
                                    مرتب سازی براساس :
                                 </li>

                                 <li role="button" class="sort-item active">جدید‌ترین</li>
                                 <li role="button" class="sort-item">مفیدترین</li>
                                 <li role="button" class="sort-item">دیدگاه خریداران</li>
                              </ul>
                           </div>

                           @foreach ($productComment as $item)
                           <div>

                              <div class="mt-4" style="border-bottom: 1px solid #e3e3e3;">
                                 <ul class="d-flex">
                                    <li class="best-selling-product-rate ms-1">
                                       <span class="@if($item->rate == 1 || $item->rate == 2) rate-box-1 @elseif($item->rate == 3 || $item->rate == 4 || $item->rate == 5) rate-box-5 @endif">
                                          {{ $item->rate }}
                                       </span>
                                    </li>
                                    <li class="sort-product-view text-silver-digikala">
                                       {!! jdate($item->created_at)->format('%d %B %Y') !!}
                                    </li>
                                    <span class="sort-product-view-circle"></span>
                                    <li class="sort-product-view text-silver-digikala">
                                       {{ $item->user->name }}
                                    </li>
                                 </ul>
                                 <div class="pb-3 pe-5">
                                    {{ $item->title }}
                                 </div>
                              </div>

                              <div class="view-text pe-5" style="border-bottom: 1px solid #e3e3e3;">
                                 {{ $item->body }}
                                 @if($item->positive_point)
                                 <ul class="mt-3">
                                    <li><i class="bi bi-plus"></i>{{ $item->positive_point }}</li>
                                 </ul>
                                 @endif
                                 @if($item->negative_point)
                                 <ul class="mt-3">
                                    <li><i class="bi bi-dash"></i>{{ $item->negative_point }}</li>
                                 </ul>
                                 @endif
                              </div>

                              <div class="d-flex p-3 text-gray-digikala">
                                 <div class="w-75 everything-left">
                                    <span class="english-title text-gray-digikala">آیا این دیدگاه مفید بود؟</span>
                                 </div>
                                 <div class="w-25 everything-left">
                                    <span class="ms-3">
                                       <span>0</span>
                                       <i class="bi bi-hand-thumbs-up" role="button"></i>
                                    </span>
                                    <span>
                                       <span>0</span>
                                       <i class="bi bi-hand-thumbs-down" role="button"></i>
                                    </span>
                                 </div>
                              </div>

                           </div>
                           <hr>
                           @endforeach

                        </div>

                        <div role="button" class="show-more-desc">بیشتر</div>

                     </div>

                  </div>

               </div>

               <div class="line-6"></div>

               <!--! پرسش‌ها -->
               <div id="questions">

                  <div class="d-flex py-3">
                     <div>
                        <h6 class="cash-gift">
                           پرسش‌ها
                        </h6>
                        <span class="line-5"></span>
                     </div>
                  </div>

                  <div class="row">

                     <div class="col-xl-3">

                        <div class="mt-3">

                           <div class="mt-4">
                              <div class="english-title">
                                 شما هم درباره این کالا پرسش ثبت کنید
                              </div>
                              <button class="mt-4 add-to-cart-list" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                 ثبت پرسش
                              </button>
                           </div>

                        </div>

                     </div>



                     <div class="col-xl-9">

                        <div class="questions-text">

                           <div class="mt-4">
                              <ul class="sort">
                                 <li class="everything-center">
                                    <i class="bi bi-sort-down sort-icon"></i>
                                    مرتب سازی براساس :
                                 </li>

                                 <li role="button" class="sort-item active">جدید‌ترین</li>
                                 <li role="button" class="sort-item">مفیدترین</li>
                              </ul>
                           </div>

                           @foreach ($productQuestions as $item)
                           <div>

                              <div class="mt-4" style="border-bottom: 1px solid #e3e3e3;">

                                 <div class="everything-right">
                                    <span><i class="bi bi-question-square question-square-icon"></i></span>
                                    <span class="view-text">{{ $item->question }}</span>
                                 </div>

                                 <div class="pb-2">
                                    <span class="ms-2 reply">پاسخ</span>
                                    @foreach ($replies as $reply)
                                       @if ($reply->question_id == $item->id)
                                       <div class="reply-text mt-3">
                                          {{ $reply->reply }}
                                       </div>
                                       @endif
                                    @endforeach
                                 </div>

                              </div>

                              <div class="pt-4 pb-2 everything-right">
                                 <button class="reply-btn" data-bs-toggle="modal" data-bs-target="#exampleModal3">ثبت پاسخ<i class="fas fa-angle-left me-2"></i></button>
                              </div>

                           </div>
                           <hr>
                           <!--! Modal ثبت پاسخ -->
                           <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">

                                    <div class="modal-header">
                                       <div>
                                          <h5 class="modal-title personal-info-text-2" id="exampleModalLabel">
                                             به این پرسش پاسخ دهید
                                          </h5>
                                       </div>
                                       <div>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                    </div>

                                    <div class="modal-body">

                                       <form action="{{ route('reply', $item->id) }}" method="post">
                                          @csrf
                                          <div class="mt-1">
                                             <label for="reply" class="form-label">پاسخ</label>
                                             <textarea name="reply" class="form-control" rows="3"></textarea>
                                          </div>

                                          <div class="mt-3">
                                             <button class="add-to-cart">ثبت پاسخ</button>
                                          </div>

                                       </form>

                                    </div>

                                 </div>
                              </div>
                           <div>
                           </div>
                           <!--! Modal -->
                           @endforeach

                        </div>

                        <div role="button" class="show-more-desc">بیشتر</div>

                     </div>

                  </div>

               </div>

            </div>

         </div>
      </div>
   </div>
   <!--! Content -->

   <script>
      let seeMoreDesc = document.querySelectorAll('.show-more-desc');
      seeMoreDesc.forEach(function(item) {
         item.addEventListener('click', function() {
         let parent = this.previousElementSibling;
         if(parent.classList.contains('active-height')){
            parent.classList.add('active-height');
            item.textContent = 'بیشتر';
         } else {
            parent.classList.remove('active-height');
            item.textContent = 'بستن';
         }
         parent.classList.toggle('active-height');
         });
      });
   </script>


   <!-- ----------------------------------------------------  -->

   <!--! Modal ثبت دیدگاه -->
   <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
         <div class="modal-content">
            <div class="modal-header">
               <div>
                  <h5 class="modal-title personal-info-text-2" id="exampleModalLabel">دیدگاه شما</h5>
                  <div class="personal-info-text-1">
                     {{ $product->farsi_title }}
                  </div>
               </div>
               <div>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
            </div>
            <div class="modal-body">

               <form action="{{ route('productComment', $product->slug) }}" method="POST">
                  @csrf
                  <div class="border-bottom">
                     <label for="rate" class="form-label"><span class="text-danger">*</span>امتیاز دهید :</label>
                        <div class="rating">
                           <input type="radio" name="rate" value="5" id="5"><label for="5">☆</label>
                           <input type="radio" name="rate" value="4" id="4"><label for="4">☆</label>
                           <input type="radio" name="rate" value="3" id="3"><label for="3">☆</label>
                           <input type="radio" name="rate" value="2" id="2"><label for="2">☆</label>
                           <input type="radio" name="rate" value="1" id="1"><label for="1">☆</label>
                       </div>
                  </div>

                  <div class="personal-info-text-2 mt-3">دیدگاه خود را شرح دهید</div>

                  <div class="mt-3">
                     <label for="" class="form-label">عنوان نظر</label>
                     <input type="text" name="title" class="form-control">
                  </div>

                  <div class="mt-3">
                     <label for="" class="form-label">نکات مثبت</label>
                     <input type="text" name="positive_point" class="form-control">
                  </div>

                  <div class="mt-3">
                     <label for="" class="form-label">نکات منفی</label>
                     <input type="text" name="negative_point" class="form-control">
                  </div>

                  <div class="mt-3">
                     <label for="" class="form-label">متن نظر<span class="text-danger">*</span></label>
                     <textarea name="body" class="form-control" rows="3" placeholder="برای ما بنویسید"></textarea>
                  </div>

                  <div class="mt-3">
                     <button class="add-to-cart">ثبت دیدگاه</button>
                  </div>

               </form>

            </div>
            </div>
         </div>
      </div>
   <div>
   <!--! Modal -->

   <!--! Modal ثبت پرسش -->
   <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
         <div class="modal-content">

            <div class="modal-header">
               <div>
                  <h5 class="modal-title personal-info-text-2" id="exampleModalLabel">
                     پرسش خود را در مورد این کالا ثبت کنید
                  </h5>
               </div>
               <div>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
            </div>

            <div class="modal-body">

               <form action="{{ route('productQuestion', $product->slug) }}" method="POST">
                  @csrf
                  <div class="mt-3">
                     <textarea name="question" class="form-control" rows="3"></textarea>
                  </div>

                  <div class="mt-3">
                     <button class="add-to-cart">ثبت پرسش</button>
                  </div>
               </form>

            </div>
            </div>
         </div>
      </div>
   <div>
   <!--! Modal -->

   @endsection

@section('js')
@endsection
