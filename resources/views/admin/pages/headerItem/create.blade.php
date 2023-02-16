@extends('admin.layouts.app')
@section('title', 'آیتم‌های هدر')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('headerItem.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>آیکون</label>
                           <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon') }}" placeholder="آیکون را وارد کنید"/>
                           <span class="text-danger">
                              @error('icon')
                                 {{ $message }}
                              @enderror
                           </span>
                        </div>

                        <div class="form-group">
                           <label>آیتم</label>
                           <input type="text" name="item" class="form-control @error('item') is-invalid @enderror" value="{{ old('item') }}" placeholder="آیتم را وارد کنید"/>
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

                        <button type="submit" class="btn btn-success mt-2">ایجاد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
