@extends('admin.layouts.app')
@section('title', 'پاسخ محصولات')
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
                        <th scope="col">پاسخ</th>
                        <th scope="col">ایجاد شده در تاریخ</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">حذف</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($replies as $item)
                        <tr>
                           <th scope="row">{{ $item->id }}</th>
                           <td>{{ $item->user->name }}</td>
                           <td>{{ $item->reply }}</td>
                           <td>{!! jdate($item->created_at)->format('%d %B %Y') !!}</td>
                           
                           @switch($item->status)
                              @case(0)
                              @php
                                 $url = route('reply.status', $item->id);
                                 $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                              @endphp
                              @break

                              @case(1)
                              @php
                                 $url = route('reply.status', $item->id);
                                 $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                              @endphp
                              @break
                           @endswitch

                           <td>{!! $status !!}</td>

                           <td>
                              <form action="{{ route('reply.destroy', $item->id) }}" method="post" class="myForm">
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
         </div>
      </div>
   </div>
@endsection
