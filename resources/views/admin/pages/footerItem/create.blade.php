@extends('admin.layouts.app')
@section('title', 'آیتم‌های فوتر')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('footerItem.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>عنوان</label>
                           <input type="text" name="item" class="form-control @error('item') is-invalid @enderror" value="{{ old('item') }}" placeholder="عنوان را وارد کنید"/>
                           <span class="text-danger">
                               @error('item')
                                   {{ $message }}
                               @enderror
                           </span>
                        </div>

                        <div class="form-group">
                           <label>لینک</label>
                           <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}" placeholder="لینک را وارد کنید"/>
                           <span class="text-danger">
                               @error('link')
                                   {{ $message }}
                               @enderror
                           </span>
                        </div>

                        <div class="form-group">
                           <label>موقعیت ستون</label>
                           <select name="position" id="position" class="form-control @error('position') is-invalid @enderror">
                               <option disabled selected>انتخاب موقعیت</option>
                               <option value="ستون اول">ستون اول</option>
                               <option value="ستون دوم">ستون دوم</option>
                               <option value="ستون سوم">ستون سوم</option>
                               <option value="ستون چهارم">ستون چهارم</option>
                           </select>
                           <span class="text-danger">
                               @error('position')
                                   {{ $message }}
                               @enderror
                           </span>
                       </div>

                        <button type="submit" class="btn btn-success mt-2">ایجاد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
