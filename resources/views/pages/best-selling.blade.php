@extends('layouts.app')

@section('css')
@endsection

@section('content')

   <!--! Title -->
   <div class="container-fluid top-space-1 bg-color-7">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="best-selling-titr">
                  <h2 class="text-center">پرفروش‌ترین‌ها</h2>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="container-fluid mt-3">
      <div class="container">
         <div class="row">
            <div class="col-xl-8 ms-auto me-auto everything-center">
               <span class="right-line-best-selling"></span>
               <div class="center-best-selling">
                  <a href="#" class="best-selling-filter-day">7 روز گذشته</a>
                  <a href="#" class="best-selling-filter-day">30 روز گذشته</a>
               </div>
               <span class="left-line-best-selling"></span>
            </div>
         </div>
      </div>
   </div>
   <!--! Title -->

   <!--! Link -->
   <div class="container-fluid mt-3">
      <div class="container">
         <div class="row everything-center">
            <a href="{{ URL::current()."/?" }}" class="bestselling-filter-link active">همه نوع کالا</a>               
            @foreach ($children as $category)
               <a href="{{ URL::current()."/?category_id=".$category->id }}" class="bestselling-filter-link">
                  {{ $category->category }}
               </a>  
            @endforeach
         </div>
      </div>
   </div>
   <!--! Link -->

   <!--! Products -->
   <div class="container-fluid mt-5">
      <div class="container">
         <div class="row">

            @foreach ($best_selling as $product)
            <div class="best-selling-product-box">
               <a href="{{ route('pages.product', $product->slug) }}">
                  {{-- <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="best-selling-product-image"> --}}
                  <img src="{{ $product->cover }}" alt="" class="best-selling-product-image">
                  <div class="best-selling-product-title">{{ Str::limit($product->farsi_title, '55') }}</div>
                  <div class="d-flex mt-3">
                     <div class="w-50 best-selling-product-send">
                        <i class="bi bi-check2-square"></i>
                        <span>موجود در انبار دیجی‌کالا</span>
                     </div>
                     <div class="w-50 best-selling-product-rate everything-left">
                        <span>
                           @php
                           $avg = 0;
                           @endphp
                           @foreach($productComment as $item)
                              @php
                                 $avg = $avg + $item->rate;
                              @endphp
                           @endforeach
                           {{ $avg }}
                        </span>
                        <i class="bi bi-star-fill me-2"></i>
                     </div>
                  </div>
                  <div class="everything-left mt-3">
                     <div class="w-50">
                        @if($product->sale)
                           <div class="amazing-product-percent">{{ $product->sale }}%</div>
                        @endif
                        <div class="d-flex mt-2">
                           <span class="sale-home-price">77,880</span>
                           <span class="toamn-cash-gift">توما<span class="toamn-top">ن</span></span>
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

         </div>
      </div>
   </div>
   <!--! Products -->

@endsection   

@section('js')
@endsection