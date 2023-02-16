<!--! Aside -->
<div class="col-xl-3">

   <div class="profile-border">

      <div class="user-info">
         <div class="d-flex position-relative">
            <i class="bi bi-person-circle person-circle-icon"></i>
            <div class="d-flex flex-column">
               <div>{{ auth()->user()->name }}</div>
               <div class="user-phone">{{ auth()->user()->phone }}</div>
            </div>
            <a href="#" class="edit-profile-icon-link"><i class="bi bi-pencil"></i></a>
         </div>

{{--         <div class="d-flex mt-4">--}}
{{--            <div class="w-50">--}}
{{--               <div class="wallet">کیف پول</div>--}}
{{--               <a href="#" class="wallet-link">--}}
{{--                  فعال‌سازی--}}
{{--                  <i class="fas fa-angle-left me-2"></i>--}}
{{--               </a>--}}
{{--            </div>--}}
{{--            <div class="w-50 everything-left">--}}
{{--               <span class="amazing-product-price">-</span>--}}
{{--               <span class="toamn">توما<span class="toamn-top">ن</span></span>--}}
{{--            </div>--}}
{{--         </div>--}}

{{--         <div class="d-flex mt-4">--}}
{{--            <div class="w-50">--}}
{{--               <div class="wallet">دیجی‌کلاب</div>--}}
{{--               <a href="#" class="wallet-link">--}}
{{--                  مشاهده جوایز--}}
{{--                  <i class="fas fa-angle-left me-2"></i>--}}
{{--               </a>--}}
{{--            </div>--}}
{{--            <div class="w-50 everything-left">--}}
{{--               <span class="amazing-product-price">20</span>--}}
{{--               <span class="toamn">امتیاز</span>--}}
{{--            </div>--}}
{{--         </div>--}}
      </div>

      <br>

      <div class="">

{{--         <li><a href="{{ route('pages.profile') }}" --}}
{{--            class="profile-items {{ Request::route()->getName() == 'pages.profile' ? 'active' : '' }}">--}}
{{--            <i class="bi bi-house ms-3 me-3"></i>--}}
{{--            خلاصه فعالیت‌ها--}}
{{--         </a></li>--}}

{{--         <li><a href="{{ route('pages.orders') }}"--}}
{{--            class="profile-items {{ Request::route()->getName() == 'pages.orders' ? 'active' : '' }}">--}}
{{--            <i class="bi bi-bag ms-3 me-3"></i>--}}
{{--            سفارش‌ها--}}
{{--         </a></li>--}}

         <li><a href="{{ route('pages.lists') }}"
            class="profile-items {{ Request::route()->getName() == 'pages.lists' ? 'active' : '' }}">
            <i class="bi bi-heart ms-3 me-3"></i>
            لیست‌های من
         </a></li>

         <li><a href="{{ route('pages.addresses') }}"
            class="profile-items {{ Request::route()->getName() == 'pages.addresses' ? 'active' : '' }}">
            <i class="bi bi-signpost-2 ms-3 me-3"></i>
            آدرس‌ها
         </a></li>

         <li><a href="{{ route('pages.personal-info') }}"
            class="profile-items {{ Request::route()->getName() == 'pages.personal-info' ? 'active' : '' }}">
            <i class="bi bi-person ms-3 me-3"></i>
            اطلاعات حساب کاربری
         </a></li>

         @if(auth()->user()->role == 3)
         <li><a href="{{ route('pages.vendor') }}"
            class="profile-items {{ Request::route()->getName() == 'pages.vendor' ? 'active' : '' }}">
            <i class="bi bi-pen ms-3 me-3"></i>
            تکمیل اطلاعات فروشنده
         </a></li>
         <li><a href="{{ route('pages.edit-product') }}"
            class="profile-items {{ Request::route()->getName() == 'pages.edit-product' ? 'active' : '' }}">
            <i class="bi bi-pencil ms-3 me-3"></i>
            ویرایش محصول
         </a></li>
         <li><a href="{{ route('pages.my-product') }}"
            class="profile-items {{ Request::route()->getName() == 'pages.my-product' ? 'active' : '' }}">
            <i class="bi bi-basket ms-3 me-3"></i>
            محصولات من
         </a></li>
         @endif

         <li><a href="{{ route('logout') }}" class="profile-items"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right ms-3 me-3"></i>
            خروج
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
         </form>
         </li>

      </div>

   </div>

</div>
<!--! Aside -->
