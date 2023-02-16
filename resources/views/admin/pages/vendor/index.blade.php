@extends('admin.layouts.app')
@section('title', 'مدیریت فروشندگان')
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
                     <th scope="col">#</th>
                     <th scope="col">نام کاربر</th>
                     <th scope="col">حوزه کاری</th>
                     <th scope="col">شهر</th>
                     <th scope="col">نام فروشگاه</th>
                     <th scope="col">سابقه فعالیت</th>
                     <th scope="col">حذف</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($vendors as $vendor)
                     <tr>
                        <th scope="row">{{ $vendor->id }}</th>
                        <td>{{ $vendor->user->name }}</td>
                        <td>{{ $vendor->category->category }}</td>
                        <td>{{ $vendor->city }}</td>
                        <td>{{ $vendor->shop }}</td>
                        <td>{{ $vendor->record }}</td>

                        <td>
                           <form action="{{ route('user.destroy', $vendor->id) }}" method="post" class="myForm">
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
         {{ $vendors->links('vendor/pagination/bootstrap-5') }}
      </div>
   </div>
@endsection
