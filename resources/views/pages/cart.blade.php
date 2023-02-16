@extends('layouts.app')

@section('css')
@endsection

@section('content')

   <!--! Cart -->
   <div class="container-fluid top-space-1">
      <div class="container">
         <div class="row">
            <div class="col-xl-12" style="border-bottom: 1px solid #c2c2c2;">
               <div class="d-inline-flex">
                  <button class="order-page-button order-page-button-active">
                     سبد خرید
                     <span class="badge bg-badge me-1">{{ $totalCart }}</span>
                  </button>
                  <button class="order-page-button">
                     خرید بعدی
                     <span class="badge bg-badge me-1">0</span>
                  </button>
               </div>    
            </div>
         </div>
      </div>
   </div>

<div class="content-box" style="display: block;">

   <div class="container-fluid">
      <div class="container mt-3">
         <div class="row">

            <div class="col-xl-9">
               <div class="border-cart p-3">

                  <div>
                     <div class="row">
                        <div class="col-xl-12 col-12">
                           <div class="cart-title">سبد خرید شما</div>
                           <div class="cart-number">{{ $totalCart }} کالا</div>
                        </div>
                     </div>
   
                     @foreach($cart as $item)
                     <div class="row p-3">
                        <div class="col-xl-2">
                           <a href="{{ route('pages.product', $item->product->slug) }}">
                              <img src="{{ asset('image/cover').'/'.$item->product->cover }}" alt="" class="img-fluid cart-image">
                           </a>
                           <div class="border-add-reduce">
                              <form action="{{ route('cart-plus', $item->id) }}" method="POST">
                                 @csrf
                                 <button class="add-reduce-btn"><i class="bi bi-plus"></i></button>
                              </form>
                              <span style="color: #ef394e; font-size: 16px;">{{ $item->count }}</span>
                              @if($item->count == 1)
                                 <form action="{{ route('cart-remove', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="add-reduce-btn"><i class="bi bi-trash"></i></button>
                                 </form>
                              @else   
                                 <form action="{{ route('cart-minus', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="add-reduce-btn"><i class="bi bi-dash"></i></button>
                                 </form>
                              @endif   
                           </div>
                        </div>
   
                        <div class="col-xl-10">
                           <a href="{{ route('pages.product', $item->product->slug) }}" class="cart-product-name">
                              {{ $item->product->farsi_title }}
                           </a>
                           <ul class="mt-2">
                              <li class="cart-information">
                                 <i class="bi bi-shield-check ms-3 me-1 shield-icon"></i>
                                 <div>گارانتی ۱۸ ماهه آرکا تجارت بیستون</div>
                              </li>
                              <li class="cart-information">
                                 <i class="bi bi-check2-square ms-3 me-1 shield-icon"></i>
                                 <div>موجود در انبار دیجی‌کالا</div>
                              </li>
                              <li class="cart-information">
                                 <i class="bi bi-house ms-3 me-1 house-icon"></i>
                                 <div>دیجی‌کالا</div>
                              </li>
                           </ul>
                           <div class="sale-text">
                              <span class="ms-1">
                                 @if($item->price == ($item->product->price - ($item->product->price * $item->product->sale / 100)))
                                    {{ number_format(($item->product->price * $item->product->sale / 100) * $item->count) }}

                                 @elseif($item->price == ($item->seller->price - ($item->seller->price * $item->seller->sale / 100)))
                                    {{ number_format(($item->seller->price * $item->seller->sale / 100) * $item->count) }}
                                 @endif
                              </span>
                              <span class="toamn-sale">توما<span class="toamn-top-sale">ن</span></span>
                              <span class="me-1">تخفیف</span>
                           </div>
                           <div class="mt-2">
                              <span class="ms-2">
                                 {{ number_format($totalPrice) }}
                              </span>
                              <span class="toamn">توما<span class="toamn-top">ن</span></span>
                           </div>
                        </div>
                     </div>
   
                     <div class="row">
                        <div class="col-xl-12 everything-left">
                           <a href="#" class="move-another-cart">
                              <span>انتقال به خرید بعدی</span>
                              <i class="fas fa-angle-left me-2"></i>
                           </a>
                        </div>
                     </div>
                     <hr>
                  </div>
                  @endforeach

               </div>
            </div>

            <div class="col-xl-3 mt-xl-0 mt-3">
               <div class="border-cart p-3">
                  
                  <div class="d-flex cart-info-1">
                     <div class="w-50 text-end">
                        <span>قیمت کالاها ({{ $totalCart }})</span>
                     </div>
                     <div class="w-50 text-start">
                        <span>{{ number_format($totalPrice) }} تومان</span>
                     </div>
                  </div>
                  
                  <div class="d-flex mt-4 cart-info-2">
                     <div class="w-50 text-end">
                        <span>جمع سبد خرید</span>
                     </div>
                     <div class="w-50 text-start">
                        <span>{{ number_format($totalPrice) }} تومان</span>
                     </div>
                  </div>
                  
                  <div class="count-deliver">
                     هزینه ارسال براساس آدرس، زمان تحویل، وزن و حجم مرسوله شما محاسبه می‌شود.
                  </div>
                  
                  @if($cart->first())
                  <div class="d-flex mt-4 cart-info-3">
                     <div class="w-50 text-end">
                        <span>سود شما از خرید</span>
                     </div>
                     <div class="w-50 text-start">
                        @if($item->price == ($item->product->price - ($item->product->price * $item->product->sale / 100)))
                           {{ number_format(($item->product->price * $item->product->sale / 100) * $item->count) }}
                        <span><span class="ms-1">({{ $item->product->sale }}%)</span>

                        @elseif($item->price == ($item->seller->price - ($item->seller->price * $item->seller->sale / 100)))
                           {{ number_format(($item->seller->price * $item->seller->sale / 100) * $item->count) }}
                           <span><span class="ms-1">({{ $item->seller->sale }}%)</span>
                        @endif
                     </div>
                  </div>
                  @else
                  <div class="d-flex mt-4 cart-info-3">
                     <div class="w-50 text-end">
                        <span>سود شما از خرید</span>
                     </div>
                     <div class="w-50 text-start">
                        <span><span class="ms-1">(0%)</span>
                        {{-- {{ number_format($item->product->price * $item->product->sale / 100) }} تومان --}}
                     </span>
                     </div>
                  </div>
                  @endif

                  <a href="#" class="checkout-btn">ادامه</a>

               </div>
               <div class="count-deliver">
                  هزینه ایم فاکتور هنوز پرداخت نشده و در صورت اتمام موجودی، محصول موردنظر از سبد خرید شما حذف خواهد گردید.
               </div>

               <div class="d-flex mt-3 detali-product-page">
                  <div class="w-75 p-3">
                     <div class="text-black-digikala">ارسال رایگان</div>
                     <div class="count-deliver">برای سفارش‌ بالای ۵۰۰ هزار تومان</div>
                  </div>
                  <div class="w-25 everything-left">
                     <img src="img/normalFreeShippingTouchPointImage.d4416515.svg" alt="">
                  </div>
               </div>

            </div>

         </div>
      </div>
   </div>
</div>
   <!--! Cart -->

   <!--! Recent View -->
   <div class="container-fluid mt-5">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 position-relative suggest-border">

               <div class="d-flex p-3">
                  <div>
                     <h6 class="cash-gift">
                        بازدیدهای اخیر
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
                              <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="amazing-product-image">
                              <div class="best-selling-product-title">
                                 {{ Str::limit($product->farsi_title, '55') }}
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
   <!--! Recent View -->
</div>

   <!--! Next Cart -->
   <div class="container-fluid">
      <div class="container">
         <div class="row content-box" style="display: none;">
            <div class="col-xl-12">
               <div>
                  <div class="row">
                     <div class="col-xl-12 col-12 text-center">
                        <img src="img/empty-sfl.png" alt="" class="img-fluid" width="200px" height="150px">
                        <h5 class="text-black-digikala mt-5">لیست خرید بعدی شما خالی است!</h5>
                        <div class="cart-number mt-4">
                           شما می‌توانید محصولاتی که به سبد خرید خود افزوده‌اید و فعلا قصد خرید آن‌ها را ندارید، در لیست خرید بعدی قرار داده و هر زمان مایل بودید آن‌ها را به سبد خرید اضافه کرده و خرید آن‌ها را تکمیل کنید.
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--! Next Cart -->

@endsection   

@section('js')
@endsection