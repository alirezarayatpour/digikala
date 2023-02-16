@extends('admin.layouts.app')
@section('title', 'نمادهای الکترونیکی')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('namad.update', $namad->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>آپلود عکس</label>
                            <input type="file" name="image" class="form-control" />
                        </div>

                        <div class="form-group">
                           <label>لینک</label>
                           <input type="text" name="link" class="form-control" value="{{ $namad->link }}"/>
                       </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش نماد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
