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
                     <button class="order-page-button order-page-button-active">لیست علاقه‌مندی‌ها</button>
                  </div>

                  <div class="row">

                     @foreach ($favorite as $item)
                     <div class="col-xl-6 content-box category-product-box">
                        <a href="{{ route('pages.product', $item->product->id) }}">
                           <img src="{{ asset('image/cover').'/'.$item->product->cover }}" alt="" class="best-selling-product-image">
                           <div class="best-selling-product-title">
                              {{ $item->product->farsi_title }}
                           </div>
                           <div class="everything-left mt-3">
                              <div class="w-100 text-start">
                                 <div class="everything-left mt-2">
                                    <span class="amazing-product-price">
                                       @if($item->product->sale)
                                          {{ number_format($item->product->price - ($item->product->price *  $item->product->sale / 100)) }}
                                       @else
                                          {{ number_format($item->product->price) }}
                                       @endif
                                    </span>
                                    <span class="toamn">توما<span class="toamn-top">ن</span></span>
                                 </div>
                                 <span class="amazing-product-sale">
                                    @if($item->product->sale)
                                       <del>
                                          {{ number_format($item->product->price) }}
                                       </del>
                                    @endif  
                                 </span>
                              </div>
                           </div>
                        </a>
                        <div class="d-flex mt-3">
                           <form action="{{ route('remove-favorite', $item->product->id) }}" method="POST" class="w-25">
                              @csrf
                              <button class="delete-favorite-list"><i class="bi bi-trash ms-2"></i>حذف</button>
                           </form>
                           <form action="{{ route('add-to-cart', $item->product->id) }}" method="POST" class="w-75">
                              @csrf
                              <button class="add-to-cart-list"><i class="bi bi-cart ms-2"></i>افزودن به سبد</button>
                           </form>
                        </div>
                     </div>
                     @endforeach
                     
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