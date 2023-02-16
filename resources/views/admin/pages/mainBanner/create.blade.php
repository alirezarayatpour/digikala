@extends('admin.layouts.app')
@section('title', 'بنرهای صفحه دسته‌بندی')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('mainBanner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>آپلود بنر</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                           <label>دسته‌بندی</label>
                           <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror">
                                <option disabled selected>انتخاب دسته‌بندی</option>
                                @foreach ($category as $item)
                                   <option value="{{ $item->id }}">{{ $item->category }}</option>
                                @endforeach
                            </select>
                           <span class="text-danger">
                               @error('category_id')
                                   {{ $message }}
                               @enderror
                           </span>
                       </div>

                        <div class="form-group">
                            <label>موقعیت بنر</label>
                            <select name="position" id="position"
                                class="form-control @error('position') is-invalid @enderror">
                                <option disabled selected>انتخاب موقعیت</option>
                                
                                <option value="ردیف اول سمت راست">ردیف اول سمت راست</option>
                                <option value="ردیف اول سمت چپ">ردیف اول سمت چپ</option>

                                <option value="ردیف دوم سمت راست">ردیف دوم سمت راست</option>
                                <option value="ردیف دوم سمت چپ">ردیف دوم سمت چپ</option>

                                <option value="ردیف سوم سمت راست">ردیف سوم سمت راست</option>
                                <option value="ردیف سوم سمت چپ">ردیف سوم سمت چپ</option>
                                <option value="ردیف سوم وسط راست">ردیف سوم وسط راست</option>
                                <option value="ردیف سوم وسط چپ">ردیف سوم وسط چپ</option>

                            </select>
                            <span class="text-danger">
                                @error('position')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        
                        <button type="submit" class="btn btn-success mt-2">ایجاد بنر</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
