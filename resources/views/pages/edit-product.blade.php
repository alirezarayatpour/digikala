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

                  <table class="table table-striped text-center align-middle">
                     <thead>
                        <tr>
                           <th scope="col">نام محصول</th>
                           <th scope="col">عکس</th>
                           <th scope="col">مدیریت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                           @foreach($vendor as $item)
                              @if($item->category_id == $product->category->parent_id && $item->user_id == auth()->user()->id)
                              <tr>
                                 <th scope="row">{{ Str::limit($product->farsi_title, '20') }}</th>
                                 <td><img src="{{ asset('image/cover') . '/' . $product->cover }}" alt="" width="100px" height="50px"></td>
                              
                                 <td>
                                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">ویرایش</a>
                                 </td>
                              </tr>
                              @endif
                           @endforeach
                        @endforeach
                        </tbody>
                     </table>

               </div> 

               {{ $products->links('vendor/pagination/bootstrap-5') }}
            </div>

         </div>
      </div>
   </div>

   <!--! Contetn -->

   <!--! Modal-1 -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title personal-info-text-2" id="exampleModalLabel">ثبت قیمت</h5>
            <div>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         </div>
         <div class="modal-body form-text-1">
            <div>

            </div>
            <form action="{{ route('product.new', $product->id) }}" method="POST" enctype="multipart/form-data">
               @csrf

               <div class="form-group mt-3">
                  <label class="form-label">تعداد</label>
                  <input type="number" class="form-control" name="storage">
               </div>

               <div class="form-group mt-3">
                  <label class="form-label">قیمت (به تومان)</label>
                  <input type="text" class="form-control" name="price">
               </div>

               <div class="form-group mt-3">
                  <label class="form-label">تخفیف (به درصد)</label>
                  <input type="text" class="form-control" name="sale">
               </div>

               <div class="form-group mt-3">
                  <button type="submit" class="btn btn-primary">ویرایش</button>
               </div>
            </form>
      </div>
      </div>
   </div>
   <!--! Modal-1 -->

@endsection   

@section('js')
@endsection