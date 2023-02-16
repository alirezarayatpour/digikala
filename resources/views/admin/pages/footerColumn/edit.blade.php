@extends('admin.layouts.app')
@section('title', 'عنوان ستون‌های فوتر')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('footerColumn.update', $footerColumn->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>عنوان</label>
                           <input type="text" name="title" class="form-control" value="{{ $footerColumn->title }}"/>
                       </div>

                       <div class="form-group">
                           <label>موقعیت ستون</label>
                           <select name="position" id="position" class="form-control">
                                <option value="{{ $footerColumn->position }}" {{ $footerColumn->position ? 'selected' : '' }}>{{ $footerColumn->position }}</option>
                                <option value="ستون اول">ستون اول</option>
                                <option value="ستون دوم">ستون دوم</option>
                                <option value="ستون سوم">ستون سوم</option>
                                <option value="ستون چهارم">ستون چهارم</option>
                           </select>
                       </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
