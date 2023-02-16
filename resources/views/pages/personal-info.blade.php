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

               <div class="profile-border">

                  <div class="row">

                     <div class="col-xl-6 col-12 d-flex personal-info-box">
                        <div class="w-75 d-flex flex-column">
                           <div class="personal-info-text-1">نام و نام خانوادگی</div>
                           <div class="personal-info-text-2">{{ auth()->user()->name }}</div>
                        </div>
                        <div class="w-25 everything-left">
                           <i class="bi bi-pencil" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal-1"></i>
                        </div>
                     </div>

                     <div class="col-xl-6 col-12 d-flex personal-info-box">
                        <div class="w-75 d-flex flex-column">
                           <div class="personal-info-text-1">کد ملی</div>
                           <div class="personal-info-text-2">{{ auth()->user()->national_code }}</div>
                        </div>
                        <div class="w-25 everything-left">
                           <i class="bi bi-pencil" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal-1"></i>
                        </div>
                     </div>

                     <div class="col-xl-6 col-12 d-flex personal-info-box">
                        <div class="w-75 d-flex flex-column">
                           <div class="personal-info-text-1">
                              شماره موبایل
                              <span class="is-confirmed">تأیید شده</span>
                           </div>
                           <div class="personal-info-text-2">{{ auth()->user()->phone }}</div>
                        </div>
                        <div class="w-25 everything-left">
                           <i class="bi bi-pencil" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal-2"></i>
                        </div>
                     </div>

                     <div class="col-xl-6 col-12 d-flex personal-info-box">
                        <div class="w-75 d-flex flex-column">
                           <div class="personal-info-text-1">ایمیل</div>
                           <div class="personal-info-text-2">{{ auth()->user()->email }}</div>
                        </div>
                        <div class="w-25 everything-left">
                           <i class="bi bi-pencil" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal-3"></i>
                        </div>
                     </div>

                     <div class="col-xl-6 col-12 d-flex personal-info-box">
                        <div class="w-75 d-flex flex-column">
                           <div class="personal-info-text-1">رمز عبور</div>
                           {{-- <div class="personal-info-text-2">{{ auth()->user()->password }}</div> --}}
                           <input type="password" value="{{ auth()->user()->password }}" class="form-control border-0" readonly>
                        </div>
                        <div class="w-25 everything-left">
                           <i class="bi bi-pencil" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal-4"></i>
                        </div>
                     </div>

                     <div class="col-xl-6 col-12 d-flex personal-info-box">
                        <div class="w-75 d-flex flex-column">
                           <div class="personal-info-text-1">
                              روش بازگرداندن پول من
                              <span class="is-confirmed">تأیید شده</span>
                           </div>
                           <div class="personal-info-text-2">{{ auth()->user()->shaba }}</div>
                        </div>
                        <div class="w-25 everything-left">
                           <i class="bi bi-pencil" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal-7"></i>
                        </div>
                     </div>

                     <div class="col-xl-6 col-12 d-flex personal-info-box">
                        <div class="w-75 d-flex flex-column">
                           <div class="personal-info-text-1">تاریخ تولد</div>
                           <div class="personal-info-text-2">{{ auth()->user()->birthday }}</div>
                        </div>
                        <div class="w-25 everything-left">
                           <i class="bi bi-pencil" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal-5"></i>
                        </div>
                     </div>

                     <div class="col-xl-6 col-12 d-flex personal-info-box">
                        <div class="w-75 d-flex flex-column">
                           <div class="personal-info-text-1">شغل</div>
                           <div class="personal-info-text-2">{{ auth()->user()->job }}</div>
                        </div>
                        <div class="w-25 everything-left">
                           <i class="bi bi-pencil" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal-6"></i>
                        </div>
                     </div>

                  </div>

               </div>

            </div>

         </div>
      </div>
   </div>

   <!--! Modal-1 -->
   <div class="modal fade" id="exampleModal-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title personal-info-text-2" id="exampleModalLabel">ثبت اطلاعات شناسایی</h5>
            <div>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         </div>
         <div class="modal-body form-text-1">
            <div>
               لطفا اطلاعات شناسایی خود را وارد کنید.
               نام و نام خانوادگی شما باید با اطلاعاتی که وارد می‌کنید همخوانی داشته باشند.
            </div>
            <form action="{{ route('info', auth()->user()->id) }}" method="POST" class="mt-3">
               @csrf
               <div class="row">
                  <div class="col-xl-12 mt-3">
                     <label for="name" class="form-label">نام<span class="text-danger">*</span></label>
                     <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                  </div>
                  <div class="col-xl-12 mt-3">
                     <label for="national_code" class="form-label">کدملی<span class="text-danger">*</span></label>
                     <input type="text" name="national_code" class="form-control" value="{{ auth()->user()->national_code }}">
                  </div>
               </div>
               </div>
               <div class="modal-footer border-0">
                  <button class="btn btn-danger">ویرایش</button>
               </div>
            </form>
      </div>
      </div>
   </div>
   <!--! Modal-1 -->
   <!-- ---------------------------------- -->

   <!--! Modal-2 -->
   <div class="modal fade" id="exampleModal-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title personal-info-text-2" id="exampleModalLabel">ویرایش شماره موبایل</h5>
            <div>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         </div>
         <div class="modal-body form-text-1">
            <form action="{{ route('phone', auth()->user()->id) }}" method="POST" class="mt-3">
               @csrf
               <div class="row">
                  <div class="col-xl-12 mt-3">
                     <input type="text" name="phone" class="form-control"  value="{{ auth()->user()->phone }}">
                  </div>
               </div>
            </div>
            <div class="modal-footer border-0">
               <button class="btn btn-danger">ویرایش</button>
            </div>
         </form>
      </div>
      </div>
   </div>
   <!--! Modal-2 -->
   <!-- ---------------------------------- -->

   <!--! Modal-3 -->
   <div class="modal fade" id="exampleModal-3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title personal-info-text-2" id="exampleModalLabel">پست الکترونیکی خود را وارد کنید</h5>
            <div>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         </div>
         <div class="modal-body form-text-1">
            <form action="{{ route('email', auth()->user()->id) }}" method="POST" class="mt-3">
               @csrf
               <div class="row">
                  <div class="col-xl-12 mt-3">
                     <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                  </div>
               </div>
            </div>
            <div class="modal-footer border-0">
               <button class="btn btn-danger">تأیید</button>
            </div>
         </form>
      </div>
      </div>
   </div>
   <!--! Modal-3 -->
   <!-- ---------------------------------- -->

   <!--! Modal-4 -->
   <div class="modal fade" id="exampleModal-4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title personal-info-text-2" id="exampleModalLabel">تغییر رمز عبور</h5>
            <div>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         </div>
         <div class="modal-body form-text-1">
            <form action="{{ route('change_password', auth()->user()->id) }}" method="POST" class="mt-3">
               @csrf
               <div class="row">
                  <div class="col-xl-12">
                     <label for="current_password" class="form-label">رمز عبور فعلی<span class="text-danger">*</span></label>
                     <input type="password" name="current_password" class="form-control">
                  </div>

                  <div class="mt-3">رمز عبور شما باید حداقل ۸ حرف باشد.</div>

                  <div class="col-xl-12 mt-3">
                     <label for="password" class="form-label">رمز عبور جدید<span class="text-danger">*</span></label>
                     <input type="password" name="password" class="form-control">
                  </div>

                  <div class="col-xl-12 mt-3">
                     <label for="password_confirmation" class="form-label">تکرار رمز عبور جدید<span class="text-danger">*</span></label>
                     <input type="password" name="password_confirmation" class="form-control">
                  </div>
               </div>
            </div>
            <div class="modal-footer border-0">
               <button class="btn btn-danger">تغییر رمز عبور</button>
            </div>
         </form>
      </div>
      </div>
   </div>
   <!--! Modal-4 -->
   <!-- ---------------------------------- -->

   <!--! Modal-5 -->
   <div class="modal fade" id="exampleModal-5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title personal-info-text-2" id="exampleModalLabel">تاریخ تولد</h5>
            <div>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         </div>
         <div class="modal-body form-text-1">
            <form action="{{ route('birthday', auth()->user()->id) }}" method="POST" class="mt-3">
               @csrf
               <div class="row">
                  <div class="col-xl-12 mt-3">
                     <input type="date" name="birthday" class="form-control" value="{{ auth()->user()->birthday }}">
                  </div>
               </div>
            </div>
            <div class="modal-footer border-0">
               <button class="btn btn-danger">ثبت تاریخ تولد</button>
            </div>
         </form>
      </div>
      </div>
   </div>
   <!--! Modal-5 -->
   <!-- ---------------------------------- -->

   <!--! Modal-6 -->
   <div class="modal fade" id="exampleModal-6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title personal-info-text-2" id="exampleModalLabel">ویرایش شغل</h5>
            <div>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         </div>
         <div class="modal-body form-text-1">
            <form action="{{ route('job', auth()->user()->id) }}" method="POST" class="mt-3">
               @csrf
               <div class="row">
                  <div class="col-xl-12 mt-3">
                     <select name="job" id="job" class="form-select">
                        <option selected>انتخاب شغل</option>
                        <option value="{{ auth()->user()->job }}" {{ auth()->user()->job ? 'selected' : '' }}>
                           {{ auth()->user()->job }}
                        </option>
                        <option value="برنامه نویس">برنامه نویس</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="modal-footer border-0">
               <button class="btn btn-danger">ویرایش</button>
            </div>
         </form>
      </div>
      </div>
   </div>
   <!--! Modal-6 -->

   <!--! Modal-7 -->
   <div class="modal fade" id="exampleModal-7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title personal-info-text-2" id="exampleModalLabel">ویرایش شماره شبا</h5>
            <div>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         </div>
         <div class="modal-body form-text-1">
            <form action="{{ route('shaba', auth()->user()->id) }}" method="POST" class="mt-3">
               @csrf
               <div class="row">
                  <div class="col-xl-12 mt-3">
                     <input type="text" name="shaba" class="form-control"  value="{{ auth()->user()->shaba }}">
                  </div>
               </div>
            </div>
            <div class="modal-footer border-0">
               <button class="btn btn-danger">ویرایش</button>
            </div>
         </form>
      </div>
      </div>
   </div>
   <!--! Modal-7 -->
   <!-- ---------------------------------- -->


   <!--! Contetn -->

@endsection

@section('js')
@endsection
