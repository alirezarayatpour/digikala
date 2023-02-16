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

               <div class="profile-border mt-xl-0 mt-3">

                  <form action="{{ route('detail', auth()->user()->id) }}" method="POST" style="font-size: 14px;">
                     @csrf

                     <div class="form-group mt-3">
                        <label class="form-label">حوزه فعالیت</label>
                        <select name="category_id" id="category_id" class="form-select" style="font-size: 14px;">
                           <option value="{{ auth()->user()->vendor->category_id }}" {{ auth()->user()->vendor->category_id ? 'selected' : '' }}>
                              {{ auth()->user()->vendor->category->category }}
                           </option>
                           @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->category }}</option>
                           @endforeach
                        </select>
                     </div>
      
                     <div class="form-group mt-3">
                        <label class="form-label">شهر محل کار را وارد کنید</label>
                        <input type="text" class="form-control" name="city" value="{{ auth()->user()->vendor->city }}">
                     </div>

                     <div class="form-group mt-3">
                        <label class="form-label">شماره کارت بانکی را وارد کنید</label>
                        <input type="text" class="form-control" name="bank" value="{{ auth()->user()->vendor->bank }}">
                     </div>

                     <div class="form-group mt-3">
                        <label class="form-label">نام فروشگاه خود را وارد کنید</label>
                        <input type="text" class="form-control" name="shop" value="{{ auth()->user()->vendor->shop }}">
                     </div>

                     <div class="form-group mt-3">
                        <label class="form-label">سابقه فعالیت خود را وارد کنید (به سال)</label>
                        <input type="text" class="form-control" name="record" value="{{ auth()->user()->vendor->record }}">
                     </div>
      
                     <div class="form-group mt-3">
                        <button type="submit" class="btn btn-danger">ویرایش</button>
                     </div>
                  </form>

               </div> 

            </div>

         </div>
      </div>
   </div>

   <!--! Contetn -->

@endsection   

@section('js')
@endsection