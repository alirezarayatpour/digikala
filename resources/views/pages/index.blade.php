@extends('layouts.app')

@section('css')
@endsection

@section('content')

   {{--! Slider --}}
   <div class="container-fluid top-space-1">
      <div class="row">
         <div class="col-xl-12 position-relative">

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
               <div class="carousel-indicators">
                  @foreach($slider as $item)
                     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
                  @endforeach
               </div>
               <div class="carousel-inner">
                  @foreach ($slider as $key=>$item)
                     <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('images/slider').'/'.$item->image }}" class="d-block w-100" alt="...">
                     </div>
                  @endforeach
               </div>
                  <i class="fas fa-chevron-circle-right prevous-icon" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"></i>
                  <i class="fas fa-chevron-circle-left next-icon" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"></i>
             </div>

         </div>
      </div>
   </div>
   <!--! Slider -->

   <!--! Event -->
   <div class="container-fluid mt-4">
      <div class="container">
         <div class="row">

            @foreach($events as $event)
            <div class="service-box">
               <a href="https://{{ $event->link }}" class="service-link">
                  <div>
                     {{-- <img src="{{ asset('images/event').'/'.$event->image }}" alt="" class="service-image"> --}}
                     <img src="{{ $event->image }}" alt="" class="service-image">
                  </div>
                  <span class="text-center d-block mt-3">{{ $event->text }}</span>
               </a>
            </div>
            @endforeach

            <div class="service-box">
               <a href="#" class="service-link">
                  <div class="more-service">
                     <div class="dots"></div>
                  </div>
                  <span class="text-center d-block mt-3">بیشتر</span>
               </a>
            </div>

         </div>
      </div>
   </div>
   <!--! Event -->

   <!--! Amazing -->
   <div class="container-fluid mt-4">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 position-relative amazing-box-1">
                  <div class="swiper mySwiper">
                     <div class="swiper-wrapper">

                        <div class="swiper-slide">
                           <a href="{{ route('pages.incredible-offers') }}">
                              <img src="{{ asset('Frontend/img/amazing-typo.svg') }}" alt="" class="amazing-typo">
                              <img src="{{ asset('Frontend/img/box.png') }}" alt="" class="box-amazig-image">
                              <div class="box-amazig-link">مشاهده همه<i class="fas fa-chevron-left me-2"></i></div>
                           </a>
                        </div>

                        @foreach ($products as $product)
                           @if($product->position == '2')
                           <div class="swiper-slide">
                              <div class="amazing-product-box">
                                 <a href="{{ route('pages.product', $product->slug) }}">
                                    {{-- <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="amazing-product-image"> --}}
                                    <img src="{{ $product->cover }}" alt="" class="amazing-product-image">
                                    <div class="d-flex">
                                       <div class="w-50">
                                          <div class="amazing-product-percent">{{ $product->sale }}%</div>
                                       </div>
                                       <div class="w-50 text-start">
                                          <div class="everything-left">
                                             <span class="amazing-product-price">
                                                @if($product->sale)
                                                   {{ number_format($product->price - ($product->price *  $product->sale / 100)) }}
                                                @else
                                                   {{ number_format($product->price) }}
                                                @endif
                                             </span>
                                             <span class="toamn">توما<span class="toamn-top">ن</span></span>
                                          </div>
                                          <span class="amazing-product-sale">
                                             @if($product->sale)
                                                <del>
                                                   {{ number_format($product->price) }}
                                                </del>
                                             @endif
                                          </span>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                           </div>
                           @endif
                        @endforeach

                        <div class="swiper-slide">
                           <div class="see-all">
                              <a href="{{ route('pages.incredible-offers') }}">
                                 <i class="bi-arrow-left-circle see-all-arrow"></i>
                                 <span class="see-all-link">مشاهده همه</span>
                              </a>
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
   <!--! Amazing -->

   <!--! Banner -->
   <div class="container-fluid">
      <div class="container">
         <div class="row">

            <div class="col-xl-3 col-6 mt-3">
               @foreach ($homeBanner as $item)
                  @if ($item->position == 'ردیف اول سمت راست')
                     <a href="{{ route('pages.category', $item->slug) }}">
                        <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="img-fluid banner">
                     </a>
                  @endif
               @endforeach
            </div>

            <div class="col-xl-3 col-6 mt-3">
               @foreach ($homeBanner as $item)
                  @if ($item->position == 'ردیف اول وسط راست')
                     <a href="{{ route('pages.category', $item->slug) }}">
                        <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="img-fluid banner">
                     </a>
                  @endif
               @endforeach
            </div>

            <div class="col-xl-3 col-6 mt-3">
               @foreach ($homeBanner as $item)
                  @if ($item->position == 'ردیف اول وسط چپ')
                     <a href="{{ route('pages.category', $item->slug) }}">
                        <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="img-fluid banner">
                     </a>
                  @endif
               @endforeach
            </div>

            <div class="col-xl-3 col-6 mt-3">
               @foreach ($homeBanner as $item)
                  @if ($item->position == 'ردیف اول سمت چپ')
                     <a href="{{ route('pages.category', $item->slug) }}">
                        <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="img-fluid banner">
                     </a>
                  @endif
               @endforeach
            </div>

         </div>
      </div>
   </div>
   <!--! Banner -->

   <!--! Category -->
   <div class="container-fluid mt-5">
      <div class="container">
         <div class="row">
            <h5 class="text-center text-black-digikala">دسته‌بندی‌های دیجی‌کالا</h5>

            @foreach ($categories as $item)
               <div class="category-box">
                  <a href="{{ route('pages.main', $item->slug) }}" class="service-link">
                     <div>
                        {{-- <img src="{{ asset('images/category').'/'.$item->image }}" alt="" class="category-image"> --}}
                        <img src="{{ $item->image }}" alt="" class="category-image">
                     </div>
                     <span class="text-center d-block mt-3">{{ $item->category }}</span>
                  </a>
               </div>
            @endforeach

         </div>
      </div>
   </div>
   <!--! Category -->

   <!--! Banner -->
   <div class="container-fluid mt-5">
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-6">
               @foreach ($homeBanner as $item)
                  @if ($item->position == 'ردیف دوم سمت راست')
                     <a href="{{ route('pages.category', $item->slug) }}">
                        <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="img-fluid banner">
                     </a>
                  @endif
               @endforeach
            </div>
            <div class="col-xl-6 col-6">
               @foreach ($homeBanner as $item)
                  @if ($item->position == 'ردیف دوم سمت چپ')
                     <a href="{{ route('pages.category', $item->slug) }}">
                        <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="img-fluid banner">
                     </a>
                  @endif
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <!--! Banner -->

   <!--! Suggest Category -->
   <div class="container-fluid mt-5">
      <div class="container">
         <div class="row">
            <h5 class="text-center text-black-digikala">پیشنهاد دیجی‌کالا</h5>
            <div class="col-xl-12 mt-4 suggest-border">

               <div class="swiper mySwiper">
                  <div class="swiper-wrapper">

                     @foreach ($children as $child)
                     <div class="swiper-slide">

                        <div class="suggest-box">
                           <a href="{{ route('pages.category', $child->slug) }}" class="suggest-link">
                              <div>
                                 {{-- <img src="{{ asset('images/category').'/'.$child->image }}" alt="" class="suggest-image"> --}}
                                 <img src="{{ $child->image }}" alt="" class="category-image">
                              </div>
                              <span class="text-center d-block mt-3">{{ $child->category }}</span>
                           </a>
                        </div>

                     </div>
                     @endforeach

                  </div>

                  <div class="swiper-arrow-next"><i class="fas fa-chevron-left"></i></div>
                  <div class="swiper-arrow-previous"><i class="fas fa-chevron-right"></i></div>

               </div>

            </div>
         </div>
      </div>
   </div>
   <!--! Suggest Category -->

   <!--! Brand -->
   <div class="container-fliud mt-5">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 position-relative suggest-border">
               <h5 class="text-center mt-4 text-black-digikala">
                  <i class="bi bi-star ms-2 star"></i>محبوب‌ترین برندها
               </h5>

               <div class="swiper mySwiper">
                  <div class="swiper-wrapper">

                     @foreach($brand as $item)
                        <div class="swiper-slide">
                           <div class="brand-box">
                              {{-- <a href="#"><img src="{{ asset('images/brand').'/'.$item->image }}" alt="" class="img-fluid brand-image"></a> --}}
                              <a href="#"><img src="{{ $item->image }}" alt="" class="img-fluid brand-image"></a>
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
   <!--! Brand -->

   <!--! Banner -->
   <div class="container-fluid mt-4">
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-lg-12 col-md-12 col-12">
               @foreach ($homeBanner as $item)
                  @if ($item->position == 'ردیف سوم سمت راست')
                     <a href="{{ route('pages.category', $item->slug) }}">
                        <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="img-fluid banner">
                     </a>
                  @endif
               @endforeach
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-12 mt-xl-0 mt-3">
               @foreach ($homeBanner as $item)
                  @if ($item->position == 'ردیف سوم سمت چپ')
                     <a href="{{ route('pages.category', $item->slug) }}">
                        <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="img-fluid banner">
                     </a>
                  @endif
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <!--! Banner -->

   <!--! Products -->
   <div class="container-fluid mt-4">
      <div class="container">
         <div class="row suggest-border">

            @foreach ($children_your_visit as $item)
            <div class="col-xl-3 product-home-parent">
               <h6 class="text-black-digikala">{{ $item->category }}</h6>
               <div class="product-home-des">براساس بازدیدهای شما</div>
               <div class="row">
                  @foreach ($products_your_visit as $product_your_visit)
                     @if($product_your_visit->category_id == $item->id)
                        <div class="col-6 product-home-box">
                           <a href="{{ route('pages.product', $product_your_visit->slug) }}">
                              {{-- <img src="{{ asset('image/cover').'/'.$product_your_visit->cover }}" alt="" class="img-fluid product-home-image"> --}}
                              <img src="{{ $product_your_visit->cover }}" alt="" class="img-fluid product-home-image">
                           </a>
                        </div>
                     @endif
                  @endforeach
               </div>
               <a href="#" class="product-home-link">مشاهده همه<i class="fas fa-chevron-left me-2"></i></a>
            </div>
            @endforeach

         </div>
      </div>
   </div>
   <!--! Products -->

   <!--! Products -->
   <div class="container-fluid mt-4">
      <div class="container">
         <div class="row suggest-border">

            @foreach ($children_your_visit as $item)
            <div class="col-xl-3 product-home-parent">
               <h6 class="text-black-digikala">{{ $item->category }}</h6>
               <div class="product-home-des">براساس بازدیدهای شما</div>
               <div class="row">
                  @foreach ($products_your_visit as $product_your_visit)
                     @if($product_your_visit->category_id == $item->id)
                        <div class="col-6 product-home-box">
                           <a href="{{ route('pages.product', $product_your_visit->slug) }}">
                              {{-- <img src="{{ asset('image/cover').'/'.$product_your_visit->cover }}" alt="" class="img-fluid product-home-image"> --}}
                              <img src="{{ $product_your_visit->cover }}" alt="" class="img-fluid product-home-image">
                           </a>
                        </div>
                     @endif
                  @endforeach
               </div>
               <a href="#" class="product-home-link">مشاهده همه<i class="fas fa-chevron-left me-2"></i></a>
            </div>
            @endforeach

         </div>
      </div>
   </div>
   <!--! Products -->

   <!--! Best Seller -->
   <div class="container-fliud mt-5">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 position-relative suggest-border">
               <div class="d-flex align-items-center justify-content-center position-relative">
                  <h5 class="text-center mt-4 text-black-digikala">
                     <i class="bi bi-fire ms-2 star"></i>پرفروش‌ترین‌ کالاها
                  </h5>
                  <a href="{{ route('pages.best-selling') }}" class="more-best-seller">
                     مشاهده همه
                  </a>
               </div>

               <div class="swiper mySwiper2">
                  <div class="swiper-wrapper">

                     @foreach ($best_selling as $product)
                        <div class="swiper-slide">
                           <div class="best-seller-box">
                              <a href="{{ route('pages.product', $product->slug) }}" class="best-seller-link">
                                 {{-- <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="img-fluid best-seller-image"> --}}
                                 <img src="{{ $product->cover }}" alt="" class="img-fluid best-seller-image">
                                 <span>{{ $product->farsi_title }}</span>
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
   <!--! Best Seller -->

   <!--! Banner -->
   <div class="container-fluid mt-4">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               @foreach ($homeBanner as $item)
                  @if ($item->position == 'ردیف چهارم')
                     <a href="{{ route('pages.category', $item->slug) }}">
                        <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="img-fluid banner">
                     </a>
                  @endif
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <!--! Banner -->

   <!--! Sale -->
   <div class="container-fliud mt-5">
      <div class="container">
         <div class="row suggest-border">

            <h5 class="text-center mt-4 text-black-digikala">
               <i class="bi bi-percent ms-2 percent"></i>منتخب محصولات تخفیف و حراج
            </h5>

            @foreach ($products as $product)
            <div class="col-xl-2 col-6 sale-product-box">
               <a href="{{ route('pages.product', $product->slug) }}">
                  {{-- <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="img-fluid sale-home-image"> --}}
                  <img src="{{ $product->cover }}" alt="" class="img-fluid sale-home-image">
                  <div class="d-flex mt-3">
                     <div class="w-50">
                        <div class="amazing-product-percent">{{ $product->sale }}%</div>
                        <div class="d-flex mt-2">
                           {{-- <span class="sale-home-price">77,880</span>
                           <span class="toamn-cash-gift">توما<span class="toamn-top">ن</span></span> --}}
                        </div>
                     </div>
                     <div class="w-50 text-start">
                        <div class="everything-left mt-2">
                           <span class="amazing-product-price">
                              @if($product->sale)
                                 {{ number_format($product->price - ($product->price *  $product->sale / 100)) }}
                              @else
                                 {{ number_format($product->price) }}
                              @endif
                           </span>
                           <span class="toamn">توما<span class="toamn-top">ن</span></span>
                        </div>
                        <span class="amazing-product-sale">
                           @if($product->sale)
                              <del>
                                 {{ number_format($product->price) }}
                              </del>
                           @endif
                        </span>
                     </div>
                  </div>
               </a>
            </div>
            @endforeach

            {{-- <a href="{{ route('pages.promotion-center') }}" class="sale-home-link">مشاهده بیشتر<i class="fas fa-chevron-left me-2"></i></a> --}}

         </div>
      </div>
   </div>
   <!--! Sale -->

@endsection

@section('js')
@endsection
