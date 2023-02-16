@extends('admin.layouts.app')
@section('title', 'خدمات')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('service.update', $service->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>آپلود عکس</label>
                            <input type="file" name="image" class="form-control" />
                        </div>

                        <div class="form-group">
                           <label>متن</label>
                           <input type="text" name="text" class="form-control" value="{{ $service->text }}"/>
                       </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش محتوا</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
