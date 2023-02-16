@extends('admin.layouts.app')
@section('title', 'مدیریت نظرات محصولات')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-xl-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title mt-2">نویسنده : {{ $productComment->user->name }}</h5>
               <h5 class="card-title mt-2">امتیاز : {{ $productComment->rate }}</h5>
               <p class="card-text mt-3">تاریخ ایجاد: {!! jdate($productComment->created_at)->format('%d %B %Y') !!}</p>
               <h5>نظر برای محصول:</h5>
               <p class="card-text">{!! $productComment->product->farsi_title !!}</p>
               <h5>نظر:</h5>
               <p class="card-text">{!! $productComment->body !!}</p>
               <h5>نکات مثبت:</h5>
               <p class="card-text">{!! $productComment->positive_point !!}</p>
               <h5>نکات منفی:</h5>
               <p class="card-text">{!! $productComment->negative_point !!}</p>
               <div class="d-flex">
                  <form action="{{ route('productComment.destroy', $productComment->id) }}" method="post">
                     @csrf
                     <button class="btn btn-danger">حذف</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
@endsection
