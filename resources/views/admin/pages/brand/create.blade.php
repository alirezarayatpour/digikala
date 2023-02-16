@extends('admin.layouts.app')
@section('title', 'برندها')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                           <label>نام فارسی برند</label>
                           <input type="text" name="farsi_name" class="form-control @error('farsi_name') is-invalid @enderror" value="{{ old('farsi_name') }}" placeholder="نام فارسی برند را وارد کنید">  
                           <span class="text-danger">
                              @error('farsi_name')
                                 {{ $message }}
                              @enderror
                           </span>
                        </div>

                        <div class="form-group">
                           <label>نام انگلیسی برند</label>
                           <input type="text" name="english_name" class="form-control @error('english_name') is-invalid @enderror" value="{{ old('english_name') }}" placeholder="نام انگلیسی برند را وارد کنید">  
                           <span class="text-danger">
                              @error('english_name')
                                 {{ $message }}
                              @enderror
                           </span>
                        </div>

                        <div class="form-group">
                           <label>لوگو</label>
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                           <span class="text-danger">
                              @error('image')
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
