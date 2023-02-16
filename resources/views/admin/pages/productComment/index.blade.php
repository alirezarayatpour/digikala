@extends('admin.layouts.app')
@section('title', 'مدیریت نظرات محصولات')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-md-12">

         @include('message.message')

         <div class="card mt-2">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table text-center">
                     <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">نویسنده</th>
                        <th scope="col">خلاصه نظر</th>
                        <th scope="col">نام محصول</th>
                        <th scope="col">امتیاز</th>
                        <th scope="col">ایجاد شده در تاریخ</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">حذف</th>
                        <th scope="col">نمایش کامل</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($productComment as $item)
                        <tr>
                           <th scope="row">{{ $item->id }}</th>
                           <td>{{ $item->user->name }}</td>
                           <td>{!! Str::limit($item->body, '25') !!}</td>
                           <td>{!! Str::limit($item->product->farsi_title, '25') !!}</td>
                           <td>{{ $item->rate }}</td>
                           <td>{!! jdate($item->created_at)->format('%d %B %Y') !!}</td>

                           @switch($item->status)
                              @case(0)
                              @php
                                 $url = route('productComment.status', $item->id);
                                 $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                              @endphp
                              @break

                              @case(1)
                              @php
                                 $url = route('productComment.status', $item->id);
                                 $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                              @endphp
                              @break
                           @endswitch

                           <td>{!! $status !!}</td>
                           <td>
                              <form action="{{ route('productComment.destroy', $item->id) }}" method="post" class="myForm">
                                 @csrf
                                 <button class="btn btn-danger">حذف</button>
                              </form>
                           </td>
                           <td><a href="{{ route('productComment.show', $item->id) }}" class="btn btn-primary">مشاهده</a>
                           </td>
                        </tr>
                     @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
