@extends('admin.layouts.app')
@section('title', 'مدیریت کاربران')
@section('content')
   <!-- ============================================================== -->
   <div class="row">
      <div class="col-md-12">

         @include('message.message')

         <a href="{{ route('user.create') }}" class="btn btn-primary">ایجاد کاربر جدید</a>

         <div class="card mt-2">
            <div class="card-body">
               <table class="table text-center">
                  <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">نام کاربر</th>
                     <th scope="col">ایمیل</th>
                     <th scope="col">شماره موبایل</th>
                     <th scope="col">نقش</th>
                     <th scope="col">حذف</th>
                     <th scope="col">ویرایش</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                     <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>

                        @switch($user->role)
                        @case(0)
                           @php
                              $role = "کاربر عادی";
                           @endphp
                           @break

                           @case(1)
                           @php
                              $role = "مدیر";
                           @endphp
                           @break

                           @case(2)
                           @php
                              $role = "نویسنده";
                           @endphp
                           @break

                           @case(3)
                           @php
                              $role = "فروشنده";
                           @endphp
                           @break
                        @endswitch

                        <td>{!! $role !!}</td>
                        <td>
                           <form action="{{ route('user.destroy', $user->id) }}" method="post" class="myForm">
                              @csrf
                              <button class="btn btn-danger">حذف</button>
                           </form>
                        </td>

                        <td>
                           <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary mr-2">ویرایش</a>
                        </td>
                     </tr>
                  @endforeach
                  </tbody>
               </table>
            </div>
         </div>
         {{ $users->links('vendor/pagination/bootstrap-5') }}
      </div>
   </div>
@endsection
