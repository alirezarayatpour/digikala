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
               
               <div class="profile-border mt-3">

                  <div class="d-flex">
                     <div class="w-50">
                        <h6 class="cash-gift">
                           آدرس‌ها
                        </h6>
                        <span class="line-5"></span>
                     </div>
                     <div class="w-50 everything-left">
                        <a href="#" class="add-new-address" data-bs-toggle="modal" data-bs-target="#exampleModal">
                           <i class="bi bi-geo-alt me-2"></i>
                           ثبت آدرس جدید
                        </a>
                     </div>
                  </div>

                  <div class="row mt-5">

                     <div class="col-xl-9">
                        <div class="deliverd-title">{{ auth()->user()->address }}</div>
                        <ul class="mt-3">
                           <li class="addresses-info-item"><i class="bi bi-signpost-2"></i>تهران</li>
                           <li class="addresses-info-item"><i class="bi bi-envelope"></i>{{ auth()->user()->code_post }}</li>
                           <li class="addresses-info-item"><i class="bi bi-telephone"></i>{{ auth()->user()->phone }}</li>
                           <li class="addresses-info-item"><i class="bi bi-person"></i>{{ auth()->user()->name }}</li>
                        </ul>
                     </div>

                     <div class="col-xl-3">
                        <i class="bi bi-three-dots-vertical everything-left" role="button"></i>
                     </div>

                  </div>

               </div>

            </div>

         </div>
      </div>
   </div>
   <!--! Contetn -->

   <!--! Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title personal-info-text-2" id="exampleModalLabel">ثبت آدرس و کدپستی</h5>
            <div>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         </div>
         <div class="modal-body form-text-1">
            <form action="{{ route('address', auth()->user()->id) }}" method="POST" class="mt-3">
               @csrf
               <div class="row">
                  <div class="col-xl-12 mt-3">
                     <label for="address" class="form-label">آدرس<span class="text-danger">*</span></label>
                     <input type="text" name="address" class="form-control" value="{{ auth()->user()->address }}">
                  </div>
                  <div class="col-xl-12 mt-3">
                     <label for="code_post" class="form-label">کدپستی<span class="text-danger">*</span></label>
                     <input type="text" name="code_post" class="form-control" value="{{ auth()->user()->code_post }}">
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
   <!--! Modal -->

@endsection   

@section('js')
@endsection