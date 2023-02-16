@extends('admin.layouts.app')
@section('title', 'مدیریت کاربران')
@section('content')
   <!-- ============================================================== -->
   <div class="row mt-3">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('user.update', $user->id) }}" method="post">
                  @csrf
                  <div class="form-group">
                     <label>نام</label>
                     <input type="text" name="name" class="form-control" value="{{ $user->name }}"/>
                  </div>
                  <div class="form-group">
                     <label>ایمیل</label>
                     <input type="email" name="email" class="form-control" value="{{ $user->email }}"/>
                  </div>
                  <div class="form-group">
                     <label>شماره موبایل</label>
                     <input type="text" name="name" class="form-control" value="{{ $user->phone }}"/>
                  </div>
                  <div class="form-group">
                     <label>رمز عبور</label>
                     <div class="input-group flex-nowrap">
                        <input type="password" name="password" id="password" class="form-control"
                           value="{{ $user->password }}"/>
                        <i class="bi bi-eye-slash input-group-text" id="togglePassword"></i>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>نقش</label>
                     <select name="role" id="role" class="form-control">
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
                        <option value="{{ $user->role }}">{{ $role }}</option>
                        <option value="0">کاربر عادی</option>
                        <option value="1">مدیر</option>
                        <option value="2">نویسنده</option>
                        <option value="3">فروشنده</option>
                     </select>
                  </div>
                  <button type="submit" class="btn btn-success mt-2">ویرایش</button>
               </form>
            </div>
         </div>
      </div>
   </div>

   <script>
      const togglePassword = document.querySelector("#togglePassword");
      const password = document.querySelector("#password");

      togglePassword.addEventListener("click", function () {
         // toggle the type attribute
         const type = password.getAttribute("type") === "password" ? "text" : "password";
         password.setAttribute("type", type);

         // toggle the icon
         this.classList.toggle("bi-eye");
      });

      // prevent form submit
      const form = document.querySelector("form");
      form.addEventListener('submit', function (e) {
         e.preventDefault();
      });
   </script>

@endsection
