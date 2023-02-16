<!--! Header -->
<div class="header">
   @foreach ($homeBanner as $item)
      @if ($item->position == 'بالای صفحه')
         <div class="top-banner">
            <a href="{{ route('pages.category', $item->category_id) }}">
               <img src="{{ asset('images/home-banner').'/'.$item->image }}" alt="" class="w-100">
            </a>
         </div>
      @endif
   @endforeach

   <div class="container-fluid">
      <div class="container">

         <div class="row">

            <div class="col-xl-1 col-12 text-center">
               <span class="bar-home-icon"><i class="bi bi-list"></i></span>
               <a href="{{ route('pages.index') }}">
                  @foreach ($logo as $item)
                     @if ($item->position == 'منو بالا')
                        <img src="{{ asset('images/logo').'/'.$item->image }}" alt="" class="top-logo">
                     @endif
                  @endforeach
               </a>
               <span class="question-home-icon"><i class="bi bi-question-square"></i></span>
            </div>

            <div class="col-xl-5 col-9 everything-center">
               <form class="search-bar" action="{{ route('pages.search') }}" method="GET">
                  <button class="search-bar-button"><i class="bi bi-search search-icon"></i></button>
                  <input type="search" placeholder="جستجو" name="product" class="search-bar-input">
               </form>
            </div>

            <div class="col-xl-4 col-1"></div>

            <div class="col-xl-2 col-2 everything-left">
               @if(Auth::user())
               <a href="{{ route('pages.lists') }}" class="logged">
                  <i class="bi bi-person"></i>
               </a>
               @else
               <a href="{{ route('login') }}" class="login">
                  <i class="bi bi-box-arrow-in-left login-icon"></i>
                  <span class="vorod">ورود<span class="line-vorod-sabtenam">|</span><span class="sabtenam">ثبت‌نام</span></span>
               </a>
               @endif
               <span class="line-1"></span>
               <a href="{{ route('pages.cart') }}" class="cart">
                  <i class="bi bi-cart"></i>
                  <span class="my-badge @if($totalCart == 0) d-none @endif">{{ $totalCart }}</span>
               </a>
            </div>

         </div>

         <div class="row">
            <div class="col-xl-10 d-flex menu-mobile">

               <div class="category">
                  <div role="button" class="category-button">
                     <i class="bi bi-list ms-2"></i>
                     دسته‌بندی کالاها
                  </div>
                  <ul class="dropdown-nav-menu">
                     <div class="row">
                        <div class="w-20">

                           @foreach ($categories as $item)
                           <li class="dropdown-menu-item">
                              <a href="{{ route('pages.main', $item->slug) }}" class="dropdown-menu-link">
                                 {{ $item->category }}
                              </a>
                              <span class="arrow-down-style">
                                 <i class="bi bi-caret-down-square arrow-down"></i>
                              </span>
                              <div class="dropdown-parent-box">
                                 <ul class="p-3">

                                    @foreach ($parents as $parent)
                                       @if($item->id == $parent->parent_id)
                                       <li class="dropdown-menu-child-item">
                                          <a href="{{ route('pages.category', $parent->slug) }}" class="dropdown-menu-link-parent">
                                             <span class="line-4"></span>
                                             {{ $parent->category }}
                                          </a>
                                          <span class="arrow-down-style ms-3" style="margin: -30px">
                                             <i class="bi bi-caret-left-square arrow-down"></i>
                                          </span>
                                       @endif
                                       <ul class="dropdown-child-box">

                                          @foreach ($children as $child)
                                             @if($item->id == $child->parent_id && $parent->id == $child->child_id)
                                             <li class="dropdown-menu-link-child-item">
                                                <a href="{{ route('pages.category', $child->slug) }}" class="dropdown-menu-link-child-link">
                                                   {{ $child->category }}
                                                </a>
                                             </li>
                                             @endif
                                          @endforeach

                                       </ul>
                                    </li>
                                    @endforeach

                                 </ul>
                              </div>
                           </li>
                           @endforeach

                        </div>
                     </div>
                  </ul>
               </div>

               <span class="line-2"></span>
               <div>
                  <ul class="nav-menu">
                     @foreach ($headerItem as $item)
                        <li class="nav-menu-item">
                           <a href="{{ route('pages'.'.'.$item->link) }}" class="nav-menu-link">
                              <i class="{{ $item->icon }}"></i>
                              {{ $item->item }}
                           </a>
                        </li>
                     @endforeach
                  </ul>
               </div>
            </div>
            
            <div class="col-xl-2 col-12 city-box" style="margin-top: 10px;">
               <div class="" role="button">
                  <i class="bi bi-geo-alt ms-3"></i>
                  <span class="city">لطفاً شهر خود را انتخاب کنید</span>
               </div>
            </div>
         </div>

      </div>
   </div>

   <div class="back-close"></div>
</div>
<!--! Header -->
