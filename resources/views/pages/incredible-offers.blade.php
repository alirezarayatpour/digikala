@extends('layouts.app')

@section('css')
@endsection

@section('content')

   <!--! Titr -->
   <div class="container-fluid top-space-1 bg-color-13">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 position-relative">
               <div class="text-center mt-5">
                  <img src="{{ asset('Frontend/img/incrediblePage.svg') }}" alt="" class="img-fluid">
               </div>
            </div>
         </div>
      </div>

      <div class="container">
         <div class="row">
            <div class="col-xl-12">

               <div class="incredible-link-box">

                  <a href="{{ URL::current()."/?" }}" class="incredible-filter-link">
                     <i class="bi bi-border-all"></i>
                     <div>همه دسته‌بندی‌ها</div>
                  </a> 

                  @foreach ($children as $category)
                     <a href="{{ URL::current()."/?category_id=".$category->id }}" class="incredible-filter-link">
                        <i class="bi bi-laptop"></i>
                        <div>{{ $category->category }}</div>
                     </a>
                  @endforeach
               
               </div> 
               
            </div>
         </div>
      </div>
   </div>
   <!--! Titr -->

   <!--! Surprise Choosen -->
   <div class="container-fluid amazing-box-6">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 position-relative">
                  <div class="swiper mySwiper">
                     <div class="swiper-wrapper">
   
                        <div class="swiper-slide pt-5">
                           <img src="{{ asset('Frontend/img/FeaturedPromos.svg') }}" alt="" class="incredible-typo">
                           <img src="{{ asset('Frontend/img/box.png') }}" alt="" class="box-amazig-image mt-3">
                        </div>

                        @foreach ($products as $product)
                        <div class="swiper-slide">
                           <div class="incredible-product-box-1">
                              <a href="{{ route('pages.product', $product->slug) }}">
                                 <img src="{{ asset('Frontend/img/IncredibleOffer.svg') }}" alt="" class="pb-2">
                                 {{-- <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="amazing-product-image"> --}}
                                 <img src="{{ $product->cover }}" alt="" class="amazing-product-image">
                                 <div class="best-selling-product-title">{{ $product->farsi_title }}</div>
                                 <div class="best-selling-product-send mt-2">
                                    <i class="bi bi-check2-square"></i>
                                    <span>موجود در انبار دیجی‌کالا</span>
                                 </div>
                                 <div class="d-flex mt-3">
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
                                 <div class="incredible-time">26 : 30 : 07</div>
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
   <!--! Surprise Choosen -->

   <!--! Finish Incredible -->
   <div class="container-fluid mt-5">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 position-relative suggest-border">

               <div class="d-flex p-3">
                  <div>
                     <h6 class="cash-gift">
                        <i class="bi bi-clock-history ms-2"></i>
                        شگفت‌انگیزهای رو به اتمام
                     </h6>
                     <span class="line-5"></span>
                  </div>
               </div>

               <div class="swiper mySwiper">
                  <div class="swiper-wrapper">

                     @foreach ($products as $product)
                     <div class="swiper-slide">
                        <div class="fashion-product-box-2">
                           <a href="{{ route('pages.product', $product->slug) }}">
                              <img src="{{ asset('Frontend/img/IncredibleOffer.svg') }}" alt="" class="pb-2">
                              {{-- <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="amazing-product-image"> --}}
                              <img src="{{ $product->cover }}" alt="" class="amazing-product-image">
                              <div class="best-selling-product-title">{{ $product->farsi_title }}</div>
                              <div class="best-selling-product-send mt-2">
                                 <i class="bi bi-check2-square"></i>
                                 <span>موجود در انبار دیجی‌کالا</span>
                              </div>
                              <div class="d-flex mt-3">
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
                              <div class="my-progress">
                                 <div class="my-progress-bar" role="progressbar" style="width: 75%;"></div>
                              </div>
                              <div class="d-flex">
                                 <div class="w-50">
                                    <div class="sold-product-percent">
                                       <span>72%</span>فروش رفته
                                    </div>
                                 </div>
                                 <div class="w-50 text-start">
                                    <div class="everything-left">
                                       <div class="incredible-time">26 : 30 : 07</div>
                                    </div>
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
   <!--! Finish Incredible -->

   <!--! همه شگفت‌انگیزها -->
   <div class="container-fluid mt-5">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <h6 class="text-black-digikala">همه شگفت‌انگیزها</h6>

               <div class="mt-4">
                  <ul class="sort">
                     <li class="everything-center">
                        <i class="bi bi-sort-down sort-icon"></i>
                        مرتب سازی:
                     </li>

                     <li role="button" class="sort-item active">پرفروش‌ترین‌</li>
                     <li role="button" class="sort-item">بیشترین تخفیف</li>
                     <li role="button" class="sort-item">پربازدیدترین</li>
                     <li role="button" class="sort-item">گران‌ترین</li>
                     <li role="button" class="sort-item">ارزان‌ترین</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="container-fluid">
      <div class="container">
         <div class="row">

            @foreach ($products as $product)
            <div class="best-selling-product-box">
               <a href="{{ route('pages.product', $product->slug) }}">
                  <img src="{{ asset('Frontend/img/IncredibleOffer.svg') }}" alt="" class="pb-2">
                  {{-- <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="best-selling-product-image"> --}}
                  <img src="{{ $product->cover }}" alt="" class="amazing-product-image">
                  <div class="best-selling-product-title">{{ $product->farsi_title }}</div>
                  <div class="d-flex mt-3">
                     <div class="w-50 best-selling-product-send">
                        <i class="bi bi-check2-square"></i>
                        <span>موجود در انبار دیجی‌کالا</span>
                     </div>
                     <div class="w-50 best-selling-product-rate everything-left">
                        <span>4.5</span>
                        <i class="bi bi-star-fill me-2"></i>
                     </div>
                  </div>
                  <div class="everything-left mt-3">
                     <div class="w-50">
                        <div class="amazing-product-percent">{{ $product->sale }}%</div>
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
                  <div class="my-progress">
                     <div class="my-progress-bar" role="progressbar" style="width: 75%;"></div>
                  </div>   
                  <div class="d-flex">
                     <div class="w-50">
                        <div class="sold-product-percent">
                           <span>72%</span>فروش رفته
                        </div>
                     </div>
                     <div class="w-50 text-start">
                        <div class="everything-left">
                           <div class="incredible-time">26 : 30 : 07</div>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
            @endforeach

         </div>
      </div>
   </div>
   <!--! همه شگفت‌انگیزها -->

@endsection   

@section('js')
@endsection