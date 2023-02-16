{{-- ! aside --}}
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('index') }}" aria-expanded="false">
                     <i class="bi bi-speedometer"></i>
                     <span class="hide-menu">داشبورد</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('category.index') }}" aria-expanded="false">
                     <i class="bi bi-tag"></i>
                     <span class="hide-menu">دسته‌بندی‌ها</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('product.index') }}" aria-expanded="false">
                     <i class="bi bi-bag-check"></i>
                     <span class="hide-menu">محصولات</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('productComment.index') }}" aria-expanded="false">
                     <i class="bi bi-pencil"></i>
                     <span class="hide-menu">دیدگاه محصولات</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('productQuestion.index') }}" aria-expanded="false">
                     <i class="bi bi-question"></i>
                     <span class="hide-menu">پرسش محصولات</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('reply.show') }}" aria-expanded="false">
                     <i class="bi bi-pencil"></i>
                     <span class="hide-menu">پاسخ پرسش محصولات</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
                     <i class="bi bi-people"></i>
                     <span class="hide-menu">مدیریت کاربران</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('vendor.index') }}" aria-expanded="false">
                     <i class="bi bi-people"></i>
                     <span class="hide-menu">مدیریت فروشندگان</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('seller.index') }}" aria-expanded="false">
                     <i class="bi bi-currency-dollar"></i>
                     <span class="hide-menu">قیمت فروشندگان</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('brand.index') }}" aria-expanded="false">
                     <i class="bi bi-tag"></i>
                     <span class="hide-menu">برند</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('event.index') }}" aria-expanded="false">
                     <i class="bi bi-circle"></i>
                     <span class="hide-menu">رویدادها</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('slider.index') }}" aria-expanded="false">
                     <i class="bi bi-sliders"></i>
                     <span class="hide-menu">مدیریت اسلایدر</span>
                  </a>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                     <i class="bi bi-paperclip"></i>
                     <span class="hide-menu">بنرها</span>
                  </a>
                  <ul aria-expanded="false" class="collapse first-level">
                     <li class="sidebar-item">
                        <a href="{{ route('homeBanner.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> صفحه اصلی </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('mainBanner.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> دسته‌بندی </span>
                        </a>
                     </li>
                  </ul>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                     <i class="bi bi-gear"></i>
                     <span class="hide-menu">تنظیمات</span>
                  </a>
                  <ul aria-expanded="false" class="collapse first-level">
                     <li class="sidebar-item">
                        <a href="{{ route('logo.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> لوگو </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('social.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> شبکه‌های اجتماعی </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('headerItem.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> آیتم‌های منو بالا </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('footerColumn.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> ستون‌های منو پایین </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('footerItem.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> آیتم‌های منو پایین </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('footerText.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> متن منو پایین </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('namad.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> نمادهای الکترونیکی </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('application.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> دانلود اپلیکیشن </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('service.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> خدمات </span>
                        </a>
                     </li>
                     <li class="sidebar-item">
                        <a href="{{ route('support.index') }}" class="sidebar-link">
                           <i class="bi bi-circle"></i>
                           <span class="hide-menu"> تلفن پشتیبانی </span>
                        </a>
                     </li>
                  </ul>
               </li>

               <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     <i class="bi bi-box-arrow-right"></i>
                     <span class="hide-menu">خروج</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                  </form>
               </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
{{-- ! /aside --}}
