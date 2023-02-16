@extends('admin.layouts.app')
@section('title', 'برندها')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                     <div class="form-group">
                        <label>نام فارسی برند</label>
                        <input type="text" name="name" class="form-control" value="{{ $brand->farsi_name }}">  
                     </div>

                     <div class="form-group">
                        <label>نام انگلیسی برند</label>
                        <input type="text" name="name" class="form-control" value="{{ $brand->english_name }}">  
                     </div>

                     <div class="form-group">
                        <label>عکس</label>
                        <input type="file" name="image" class="form-control" />
                     </div>

                     <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
