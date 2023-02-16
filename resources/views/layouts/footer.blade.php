<!--! Footer -->
<div class="container-fluid mt-5" style="border-top: 1px solid #e3e3e3;">
   <div class="container">

      <div class="row mt-5">
         <div class="col-xl-6 col-6">
            @foreach ($logo as $item)
               @if ($item->position == 'منو پایین')
                  <img src="{{ asset('images/logo').'/'.$item->image }}" alt="" class="img-fluid logo-footer">
               @endif
            @endforeach
            <div class="logo-footer-text">
               تلفن پشتیبانی: 
               @foreach ($support as $item)
                  {{ $item->tel }}
               @endforeach
                | 7 روز هفته، 24 ساعته پاسخگوی شما هستیم.
            </div>
         </div>
         <div class="col-xl-6 col-6">
            <a href="#top" class="back-to-top">
               بازگشت به بالا
               <i class="fas fa-angle-up me-3"></i>
            </a>
         </div>
      </div>

      <div class="row mt-5 footer-box-parent">

         @foreach ($service as $item)
         <div class="footer-box">
            <a href="#" class="footer-link">
               <div>
                  <img src="{{ asset('images/service').'/'.$item->image }}" alt="" class="footer-image">
               </div>
               <span class="text-center d-block">{{ $item->text }}</span>
            </a>
         </div>
         @endforeach

      </div>

      <div class="row mt-5">

         <div class="col-xl-3 col-6">
            <ul class="footer-menu">
               @foreach ($footerColumn as $item) 
                  @if($item->position == 'ستون اول')
                     <li class="footer-menu-head">با دیجی‌کالا</li>
                  @endif
               @endforeach

               @foreach ($footerItem as $item) 
                  @if($item->position == 'ستون اول')
                  <li>
                     <a href="{{ route('pages'.'.'.$item->link) }}" class="footer-menu-link">{{ $item->item }}</a>
                  </li>
                  @endif
               @endforeach
            </ul>
         </div>

         <div class="col-xl-3 col-6">
            <ul class="footer-menu">
               @foreach ($footerColumn as $item) 
                  @if($item->position == 'ستون دوم')
                     <li class="footer-menu-head">با دیجی‌کالا</li>
                  @endif
               @endforeach

               @foreach ($footerItem as $item) 
                  @if($item->position == 'ستون دوم')
                  <li>
                     <a href="{{ route('pages'.'.'.$item->link) }}" class="footer-menu-link">{{ $item->item }}</a>
                  </li>
                  @endif
               @endforeach
            </ul>
         </div>
         
         <div class="col-xl-3 d-xl-block d-none">
            <ul class="footer-menu">
               @foreach ($footerColumn as $item) 
                  @if($item->position == 'ستون سوم')
                     <li class="footer-menu-head">با دیجی‌کالا</li>
                  @endif
               @endforeach
               @foreach ($footerItem as $item) 
                  @if($item->position == 'ستون سوم')
                  <li>
                     <a href="{{ route('pages'.'.'.$item->link) }}" class="footer-menu-link">{{ $item->item }}</a>
                  </li>
                  @endif
               @endforeach
            </ul>
         </div>

         <div class="col-xl-3 col-12">
            <div class="footer-menu-head">
               @foreach ($footerColumn as $item) 
                  @if($item->position == 'ستون چهارم')
                     <li class="footer-menu-head">با دیجی‌کالا</li>
                  @endif
               @endforeach
            </div>
            <ul class="footer-menu-social">
               @foreach ($social as $item)
                  <li><a href="https://{{ $item->link }}" class="footer-menu-link">
                     <i class="{{ $item->icon }} social-icon"></i>
                  </a></li>
               @endforeach
            </ul>
            <div class="footer-menu-head mt-5">با ثبت ایمیل، از جدید‌ترین تخفیف‌ها با‌خبر شوید</div>
            <form action="{{ route('news-request') }}" method="POST" class="mt-3">
               <input type="email" name="email" id="email" placeholder="ایمیل شما" class="input-footer"/>
               <button class="button-footer">ثبت</button>
            </form>
         </div>

      </div>

   </div>
</div>

<div class="container mt-5">
   <div class="row bg-color-6">

      <div class="col-xl-4">
         <div class="footer-box-image">
            <img src="{{ asset('Frontend/img/favicon.png') }}" alt="" class="img-fluid footer-image">
            <h5 class="footer-box-text">دانلود اپلیکیشن دیجی‌کالا</h5>
         </div>
      </div>

      @foreach ($application as $item)      
         <div class="col-xl-2 col-6">
            <a href="https://{{ $item->link }}" class="download-app-box">
               {{-- <img src="{{ asset('images/application').'/'.$item->image }}" alt="" class="img-fluid download-app-image"> --}}
               <img src="{{ $item->image }}" alt="" class="img-fluid download-app-image">
            </a>
         </div>
      @endforeach

   </div>
</div>

<div class="container mt-4" style="border-top: 1px solid #e3e3e3;">
   <div class="row mt-4">
      <div class="col-xl-6">
         <h6 class="text-black-digikala">فروشگاه اینترنتی دیجی‌کالا، بررسی، انتخاب و خرید آنلاین</h6>
         <div class="footer-des">
            @foreach ($footerText as $item)
               {!! $item->text !!}
            @endforeach
         </div>
      </div>

      <div class="col-xl-6 mt-xl-0 mt-3 d-flex align-items-center justify-content-center">

         @foreach ($namad as $item)
            <a href="https://{{ $item->link }}" class="namad-box">
               <img src="{{ asset('images/namad').'/'.$item->image }}" alt="" class="img-fluid namad-image">
            </a>
         @endforeach

      </div>
   </div>
</div>

<div class="container mt-4 pb-3" style="border-top: 1px solid #e3e3e3;">
   <div class="row mt-4">
      <div class="col-xl-12">
         <div class="product-home-des text-center">
            برای استفاده از مطالب دیجی‌کالا، داشتن «هدف غیرتجاری» و ذکر «منبع» کافیست.
            تمام حقوق اين وب‌سايت نیز برای شرکت نوآوران فن آوازه (فروشگاه آنلاین دیجی‌کالا) است.
         </div>
      </div>
   </div>
</div>

<!--! Footer -->