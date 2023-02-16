@extends('admin.layouts.app')
@section('title', 'شبکه‌های اجتماعی')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('social.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>آیکون</label>
                           <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon') }}" placeholder="آیکون را وارد کنید" />
                           @error('icon')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label>لینک</label>
                           <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}" placeholder="لینک را وارد کنید" />
                           @error('link')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <button type="submit" class="btn btn-success mt-2">ایجاد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
