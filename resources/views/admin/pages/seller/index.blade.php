@extends('admin.layouts.app')
@section('title', 'قیمت فروشندگان')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-md-12">

         @include('message.message')

         <div class="card mt-2">
            <div class="card-body">
               <table class="table text-center">
                  <thead>
                  <tr>
                     <th scope="col">نام محصول</th>
                     <th scope="col">نام کاربر</th>
                     <th scope="col">قیمت</th>
                     <th scope="col">تخفیف</th>
                     <th scope="col">تعداد</th>
                     <th scope="col">وضعیت</th>
                     <th scope="col">حذف</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($seller as $item)
                     <tr>
                        <th scope="row">{{ $item->product->farsi_title }}</th>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->sale }}</td>
                        <td>{{ $item->storage }}</td>

                        @switch($item->status)
                        @case(0)
                           @php
                              $url = route('seller.status', $item->id);
                              $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                           @endphp
                        @break

                        @case(1)
                           @php
                              $url = route('seller.status', $item->id);
                              $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                           @endphp
                        @break
                        @endswitch

                     <td>{!! $status !!}</td>

                        <td>
                           <form action="{{ route('seller.destroy', $item->id) }}" method="post" class="myForm">
                              @csrf
                              <button class="btn btn-danger">حذف</button>
                           </form>
                        </td>
                     </tr>
                  @endforeach
                  </tbody>
               </table>
            </div>
         </div>
         {{ $seller->links('vendor/pagination/bootstrap-5') }}
      </div>
   </div>
@endsection
