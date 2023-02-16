@extends('admin.layouts.app')
@section('title', 'دانلود اپلیکیشن')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('application.update', $application->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>آپلود عکس</label>
                            <input type="file" name="image" class="form-control" />
                        </div>

                        <div class="form-group">
                           <label>لینک</label>
                           <input type="text" name="link" class="form-control" value="{{ $application->link }}"/>
                       </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش اپلیکیشن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
