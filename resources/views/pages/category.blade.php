@extends('layouts.app')

@section('css')
@endsection

@section('content')

   <!--! Link -->
   <div class="container-fluid top-space-1">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">

               <ul class="sort-link">
                  <li><a href="{{ route('pages.index') }}" class="sort-link-item">
                     فروشگاه اینترنتی دیجی‌کالا
                     <span>/</span>
                  </a></li>

                  @foreach ($categories as $item)
                     @if($item->id == $category->parent_id)
                        <li><a href="{{ route('pages.main', $item->slug) }}" class="sort-link-item">
                           {{ $item->category }}
                           <span>/</span>
                        </a></li>
                     @endif
                  @endforeach

                  <li><a href="{{ route('pages.category', $category->slug) }}" class="sort-link-item">
                     {{ $category->category }}
                  </a></li>
               </ul>

            </div>
         </div>
      </div>
   </div>
   <!--! Link -->

   <!--! Category -->
   <div class="container-fluid mt-3">
      <div class="container">
         <div class="row">
            <h6 class="text-black-digikala">دسته‌بندی‌ها</h6>

            <div class="category-page-link-box">

               @foreach ($children as $child)
                  @if($child->child_id == $category->id)
                     <div class="category-page-box">
                        <a href="{{ route('pages.category', $child->slug) }}" class="service-link">
                           <div>
                              {{-- <img src="{{ asset('images/category').'/'.$child->image }}" alt="" class="category-page-image"> --}}
                              <img src="{{ $item->image }}" alt="" class="category-image">
                           </div>
                           <span class="text-center d-block mt-3">{{ $child->category }}</span>
                        </a>
                     </div>
                  @endif   
               @endforeach
                  
            </div>
            
         </div>
      </div>
   </div>
   <!--! Category -->

   <!--! Products -->
   <div class="container-fluid mt-3">
      <div class="container">
         <div class="row">

            <!--! Filters -->
            <div class="col-xl-3">

               <div class="filter-slider">
                  <i class="bi bi-sliders"></i>
                  فیلتر
               </div>

               <div class="filter-border">


                  <div class="d-flex py-2">
                     <div class="w-50 text-end d-flex">
                        <i class="bi bi-x close-filter-icon"></i>
                        <h6 class="text-black-digikala">فیلترها</h6>
                     </div>
                     <div class="w-50">
                        <a href="#" class="filter-remove-btn">حذف فیلترها</a>
                     </div>
                  </div>

                  <!--! Brand -->
                  <div class="filter-content" role="button">
                     <span>برند</span>
                     <span class="brand-icon"><i class="fas fa-angle-down"></i></span>
                  </div>

                  <div class="brands-1">

                     @foreach ($brand as $item)
                     <div class="d-flex">
                        <div class="w-50 everything-right">
                           <input type="checkbox" class="brands-checkbox" id="{{ $item->farsi_name }}" rel="{{ $item->farsi_name }}" onchange="change()"> 
                           <label for="{{ $item->farsi_name }}"> {{ $item->farsi_name }} </label>
                        </div>
                        <div class="w-50 everything-left brand-english-name">{{ $item->english_name }}</div>
                     </div>
                     @endforeach

                     <div class="d-flex">
                        <div class="w-50 everything-right">
                           <input type="checkbox" class="brands-checkbox" id="متفرقه" rel="متفرقه" onchange="change()"> 
                           <label for="متفرقه"> متفرقه </label>
                        </div>
                        <div class="w-50 everything-left brand-english-name">Other</div>
                     </div>

                  </div>
                  <!--! Brand -->

                  <!--! Digiplus -->
                  {{-- <div class="filter-content" role="button">
                     <span>خدمات دیجی‌پلاس</span>
                     <span class="brand-icon"><i class="fas fa-angle-down"></i></span>
                  </div>   --}}

                  <div class="brands-2">

                     <div class="d-flex">
                        <div class="everything-right">
                           <input type="checkbox" class="brands-checkbox" id="gift" rel="gift" onchange="change()"> 
                           <label for="gift" class="everything-center">
                              کالاهای دارای هدیه نقدی 
                              <i class="fas fa-reply cash-gift-icon me-2"></i>
                           </label>
                        </div>
                     </div>

                     <div class="d-flex">
                        <div class="everything-right">
                           <input type="checkbox" class="brands-checkbox" id="fast" rel="fast" onchange="change()"> 
                           <label for="fast" class="everything-center">
                              ارسال فوری
                              <i class="fa fa-rocket cash-gift-icon me-2"></i>
                           </label>
                        </div>
                     </div>

                  </div> 
                  <!--! Digiplus -->

                  <!--! Send By Seller -->
                  <div class="filter-content">
                     <span>ارسال فروشنده</span>
                     <label class="switch">
                        <input type="checkbox" id="send" rel="send" onchange="change()">
                        <span class="slider round"></span>
                     </label>
                  </div>
                  <!--! Send By Seller -->

                  <!--! Exist Products -->
                  <div class="filter-content">
                     <span>فقط کالاهای موجود</span>
                     <label class="switch">
                        <input type="checkbox" id="exist" rel="exist" onchange="change()">
                        <span class="slider round"></span>
                     </label>
                  </div>
                  <!--! Exist Products -->

                  <!--! Exist Products In Store -->
                  <div class="filter-content">
                     <span>فقط کالاهای موجود در انبار دیجی‌کالا</span>
                     <label class="switch">
                        <input type="checkbox" id="store" rel="store" onchange="change()">
                        <span class="slider round"></span>
                     </label>
                  </div>
                  <!--! Exist Products In Store -->
                  
                  <!--! Seller -->
                  {{-- <div class="filter-content" role="button">
                     <span>نوع فروشنده</span>
                     <span class="brand-icon"><i class="fas fa-angle-down"></i></span>
                  </div>   --}}

                  <div class="brands-2">

                     <div class="d-flex">
                        <div class="everything-right">
                           <input type="checkbox" class="brands-checkbox" id="official" rel="official" onchange="change()"> 
                           <label for="official">فروشنده رسمی</label>
                        </div>
                     </div>

                     <div class="d-flex">
                        <div class="everything-right">
                           <input type="checkbox" class="brands-checkbox" id="chosen" rel="chosen" onchange="change()"> 
                           <label for="chosen">فروشنده برگزیده</label>
                        </div>
                     </div>

                     <div class="d-flex">
                        <div class="everything-right">
                           <input type="checkbox" class="brands-checkbox" id="digikala" rel="digikala" onchange="change()"> 
                           <label for="digikala">دیجی‌کالا</label>
                        </div>
                     </div>

                     <div class="d-flex">
                        <div class="everything-right">
                           <input type="checkbox" class="brands-checkbox" id="native" rel="native" onchange="change()"> 
                           <label for="native">کسب و کارهای بومی</label>
                        </div>
                     </div>

                  </div>   
                  <!--! Seller -->

               </div>
            </div>
            <!--! Filters -->

            <!-- Products List -->
            <div class="col-xl-9 col-lg-12">

               <div class="mt-4">
                  <ul class="sort">
                     <li class="everything-center">
                        <i class="bi bi-sort-down sort-icon"></i>
                        مرتب سازی:
                     </li>

                     <a href="{{ URL::current() }}" class="sort-item">همه</a>
                     <a href="{{ URL::current()."/?sort=newest" }}" class="sort-item">جدید‌ترین</a>
                     <a href="{{ URL::current()."/?sort=price_desc" }}" class="sort-item">گران‌ترین</a>
                     <a href="{{ URL::current()."/?sort=price_asc" }}" class="sort-item">ارزان‌ترین</a>
                  </ul>
               </div>
               
               <div class="row filters">

                  @foreach ($products as $product)
                  @if($product->category_id == $category->id || $product->category->child_id == $category->id)
                     <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 category-product-box {{ $product->brand }} @if($product->sale) onsale @endif @if($product->storage) exist @endif">
                        <div>
                           <a href="{{ route('pages.product', $product->slug) }}">
                              @if ($item->position == '1')
                                 <img src="{{ asset('Frontend/img/SpecialSell.svg') }}" alt="" class="pb-2">
                              @endif
                              @if ($item->position == '2')
                                 <img src="{{ asset('Frontend/img/IncredibleOffer.svg') }}" alt="" class="pb-2">
                              @endif
                              {{-- <img src="{{ asset('image/cover').'/'.$product->cover }}" alt="" class="best-selling-product-image"> --}}
                              <img src="{{ $product->cover }}" alt="" class="amazing-product-image">
                              <div class="best-selling-product-title">
                                 {{ Str::limit($product->farsi_title, '55') }}
                              </div>
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
                                       @if ($item->product_id == $product->id)
                                          {{ $avg }}
                                       @endif
                                    </span>
                                    <i class="bi bi-star-fill me-2"></i>
                                 </div>
                              </div>
                              <div class="everything-left mt-3">
                                 <div class="w-50">
                                    @if ($product->sale)
                                       <div class="amazing-product-percent">{{ $product->sale }}%</div>
                                    @endif   
                                 </div>
                                 <div class="w-50 text-start">
                                    <div class="everything-left mt-2 mb-2">
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

               </div>
            </div>
            <!-- Products List -->

         </div>
      </div>
   </div>
   <!--! Products -->

@endsection   

@section('js')
@endsection