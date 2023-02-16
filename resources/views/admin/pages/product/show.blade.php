@extends('admin.layouts.app')
@section('title', 'محصولات')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">

               <div class="table-responsive">
                  <table class="table">
                     <tr>
                        <td>تصاویر محصول</td>
                        <td>
                           <img src="{{ asset('image/cover'.'/'.$product->cover) }}" alt=""
                           class="img-fluid mt-3 mr-3" style="width: 100px; height: 100px;">
                           @foreach($images as $image)
                              @if($product->id == $image->product_id)
                                 <img src="{{ asset('image/gallery'.'/'.$image->image) }}" alt=""
                                    class="img-fluid mt-3 mr-3" style="width: 100px; height: 100px;">
                              @endif
                           @endforeach
                        </td>
                     </tr>
                     <tr>
                        <td>نام فارسی محصول</td>
                        <td>{{ $product->farsi_title }}</td>
                     </tr>
                     <tr>
                        <td>نام  انگلیسی محصول</td>
                        <td>{{ $product->english_title }}</td>
                     </tr>
                     <tr>
                        <td>برند</td>
                        <td>{{ $product->brand }}</td>
                     </tr>
                     <tr>
                        <td>ویژگی‌ها</td>
                        <td>{!! $product->description !!}</td>
                     </tr>
                     <tr>
                        <td>تعداد محصول</td>
                        <td>{{ $product->storage }}</td>
                     </tr>
                     <tr>
                        <td>قیمت</td>
                        @if ($product->sale)
                           <td scope="row">{{ number_format($product->price - ($product->price *  $product->sale / 100)) }} تومان</td>
                        @else
                           <td scope="row">{{ number_format($product->price) }} تومان</td>
                        @endif
                     </tr>
                     <tr>
                        <td>تخفیف</td>
                        <td>{{ $product->sale }}@if($product->sale)%@endif @if(!$product->sale) ندارد @endif</td>
                     </tr>
                     <tr>
                        <td>عضو دسته‌بندی</td>
                        <td>{{ $product->category->category }}</td>
                     </tr>
                     <tr>
                        <td>معرفی</td>
                        <td>{!! $product->intro !!}</td>
                     </tr>
                     <tr>
                        <td>بررسی تخصصی</td>
                        <td>{!! $product->expert !!}</td>
                     </tr>
                     <tr>
                        <td>مشخصات</td>
                        <td dir="ltr">{!! $product->specific !!}</td>
                     </tr>
                     <tr>
                        <td>موقعیت</td>
                        <td>{{ $product->position }}</td>
                     </tr>
                     <tr>
                        <td>
                           <form action="{{ route('product.destroy', $product->slug) }}" method="post" class="myForm">
                              @csrf
                              <button class="btn btn-danger">حذف</button>
                           </form>
                        </td>
                        <td>
                           <a href="{{ route('product.edit', $product->slug) }}" class="btn btn-primary mr-2">ویرایش</a>
                        </td>
                     </tr>
                  </table>
               </div>

            </div>
         </div>
      </div>
   </div>
@endsection
