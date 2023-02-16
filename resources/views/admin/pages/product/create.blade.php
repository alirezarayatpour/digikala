@extends('admin.layouts.app')
@section('title', 'محصولات')
@section('content')
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                     <label class="form-label">نام فارسی محصول</label>
                     <input type="text" class="form-control @error('farsi_title') is-invalid @enderror" name="farsi_title"
                        value="{{ old('farsi_title') }}">
                     @error('farsi_title')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">نام انگلیسی محصول  (می‌تواند خالی باشد)</label>
                     <input type="text" class="form-control @error('english_title') is-invalid @enderror" name="english_title"
                        value="{{ old('english_title') }}">
                     @error('english_title')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">انتخاب برند</label>
                     <select name="brand" id="brand"
                        class="form-control @error('brand') is-invalid @enderror">
                        <option disabled selected>انتخاب برند</option>
                        @foreach($brand as $item)
                           <option value="{{ $item->farsi_name }}">{{ $item->farsi_name }}</option>
                        @endforeach
                        <option value="متفرقه">متفرقه</option>
                     </select>
                     @error('brand')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">ویژگی محصول</label>
                     <textarea id="mytextarea" name="property" class="@error('property') is-invalid @enderror">
                        {{ old('property') }}
                     </textarea>
                     @error('property')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">تعداد</label>
                     <input type="number" class="form-control @error('storage') is-invalid @enderror" name="storage"
                        value="{{ old('storage') }}">
                     @error('storage')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">قیمت</label>
                     <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price') }}">
                     @error('price')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">تخفیف</label>
                     <input type="text" class="form-control @error('sale') is-invalid @enderror" name="sale"
                        value="{{ old('sale') }}">
                     @error('sale')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">انتخاب دسته‌بندی</label>
                     <select name="category_id" id="category_id"
                        class="form-control @error('category_id') is-invalid @enderror">
                        <option disabled selected>انتخاب دسته‌بندی</option>
                        @foreach($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                     </select>
                     @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">معرفی محصول</label>
                     <textarea id="mytextarea" name="intro" class="@error('intro') is-invalid @enderror">
                        {{ old('intro') }}
                     </textarea>
                     @error('intro')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">بررسی تخصصی محصول</label>
                     <textarea id="mytextarea" name="expert" class="@error('expert') is-invalid @enderror">
                        {{ old('expert') }}
                     </textarea>
                     @error('expert')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">مشخصات محصول</label>
                     <textarea id="mytextarea" name="specific" class="@error('specific') is-invalid @enderror">
                        {{ old('specific') }}
                     </textarea>
                     @error('specific')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">انتخاب موقعیت</label>
                     <select name="position" id="position"
                        class="form-control @error('position') is-invalid @enderror">
                        <option disabled selected>انتخاب موقعیت</option>
                        <option value="1">فروش ویژه</option>
                        <option value="2">پیشنهاد شگفت‌انگیز</option>
                        <option value="3">پرفروش‌ترین‌ها</option>
                     </select>
                     @error('position')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">کاور</label>
                     <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover">
                     @error('cover')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label class="form-label">گالری عکس محصول</label>
                     <input type="file" name="images[]" class="form-control" multiple>
                     @error('images[]')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                     <button type="submit" class="btn btn-success">ایجاد</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
