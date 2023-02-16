@extends('admin.layouts.app')
@section('title', 'آیتم‌های فوتر')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('footerItem.update', $footerItem->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>عنوان</label>
                           <input type="text" name="item" class="form-control" value="{{ $footerItem->item }}" />
                        </div>

                        <div class="form-group">
                           <label>لینک</label>
                           <input type="text" name="link" class="form-control" value="{{ $footerItem->link }}" />
                        </div>

                        <div class="form-group">
                           <label>موقعیت ستون</label>
                           <select name="position" id="position" class="form-control">
                                <option value="{{ $footerItem->position }}" {{ $footerItem->position ? 'selected' : '' }}>{{ $footerItem->position }}</option>
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
