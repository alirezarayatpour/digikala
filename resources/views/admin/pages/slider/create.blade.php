@extends('admin.layouts.app')
@section('title', 'اسلایدر')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>عکس</label>
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                           @error('image')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
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
                           <label>موقعیت</label>
                           <select name="position" id="position" class="form-control @error('position') is-invalid @enderror">
                              <option selected disabled>انتخاب موقعیت اسلایدر</option>
                              <option value="1">صفحه اصلی</option>
                              <option value="2">صفحه سوپرمارکت</option>
                              <option value="3">صفحه دسته‌بندی</option>
                           </select>
                           @error('position')
                              <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>                      

                        <button type="submit" class="btn btn-success mt-2">ایجاد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
