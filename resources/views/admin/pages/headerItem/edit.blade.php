@extends('admin.layouts.app')
@section('title', 'آیتم‌های هدر')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('headerItem.update', $headerItem->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>آیکون</label>
                           <input type="text" name="icon" class="form-control" value="{{ $headerItem->icon }}" />
                        </div>

                        <div class="form-group">
                           <label>آیتم</label>
                           <input type="text" name="item" class="form-control" value="{{ $headerItem->item }}" />
                        </div>

                        <div class="form-group">
                           <label>لینک</label>
                           <input type="text" name="link" class="form-control" value="{{ $headerItem->link }}" />
                        </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
