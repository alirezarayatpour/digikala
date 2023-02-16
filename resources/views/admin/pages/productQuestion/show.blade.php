@extends('admin.layouts.app')
@section('title', 'پرسش و پاسخ محصولات')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-xl-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title mt-2">نویسنده : {{ $productQuestion->user->name }}</h5>
               <p class="card-text mt-3">تاریخ ایجاد: {!! jdate($productQuestion->created_at)->format('%d %B %Y') !!}</p>
               <h4>پرسش برای محصول:</h4>
               <p class="card-text">{!! $productQuestion->product->farsi_title !!}</p>
               <h4>پرسش:</h4>
               <p class="card-text">{!! $productQuestion->question !!}</p>
               <div class="d-flex">
                  <form action="{{ route('productQuestion.destroy', $productQuestion->id) }}" method="post">
                     @csrf
                     <button class="btn btn-danger">حذف</button>
                  </form>
                  <a href="{{ route('reply.index', $productQuestion->id) }}" class="btn btn-primary mr-3">پاسخ</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
@endsection
