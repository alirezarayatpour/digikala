@extends('admin.layouts.app')
@section('title', 'بنرهای صفحه اصلی')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('homeBanner.update', $homeBanner->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>آپلود بنر</label>
                            <input type="file" name="image" class="form-control" />
                        </div>

                        <div class="form-group">
                           <label>دسته‌بندی</label>
                           <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror">
                                <option value="{{ $homeBanner->category_id }}" {{ $homeBanner->category_id ? 'selected' : '' }}>{{ $homeBanner->category->category }}</option>
                                @foreach ($category as $item)
                                   <option value="{{ $item->id }}">{{ $item->category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>موقعیت بنر</label>
                            <select name="position" id="position" class="form-control">
                                <option value="{{ $homeBanner->position }}" {{ $homeBanner->position ? 'selected' : '' }}>{{ $homeBanner->position }}</option>
                                <option value="بالای صفحه">بالای صفحه</option>
                                <option value="ردیف اول سمت راست">ردیف اول سمت راست</option>
                                <option value="ردیف اول سمت چپ">ردیف اول سمت چپ</option>
                                <option value="ردیف دوم">ردیف دوم</option>
                                <option value="ردیف سوم سمت راست بالا">ردیف سوم سمت راست بالا</option>
                                <option value="ردیف سوم سمت راست پایین">ردیف سوم سمت راست پایین</option>
                                <option value="ردیف سوم سمت چپ">ردیف سوم سمت چپ</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش بنر</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
