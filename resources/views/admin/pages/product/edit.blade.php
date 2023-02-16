@extends('admin.layouts.app')
@section('title', 'محصولات')
@section('content')
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('product.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                     <label class="form-label">نام فارسی محصول</label>
                     <input type="text" class="form-control" name="farsi_title" value="{{ $product->farsi_title }}">
                  </div>

                  <div class="form-group">
                     <label class="form-label">نام انگلیسی محصول  (می‌تواند خالی باشد)</label>
                     <input type="text" class="form-control" name="english_title" value="{{ $product->english_title }}">
                  </div>

                  <div class="form-group">
                     <label class="form-label">انتخاب برند</label>
                     <select name="brand" id="brand" class="form-control">
                        <option value="{{ $product->brand }}">{{ $product->brand }}</option>
                        @foreach($brand as $item)
                           <option value="{{ $item->farsi_name }}">{{ $item->farsi_name }}</option>
                        @endforeach
                        <option value="متفرقه">متفرقه</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label class="form-label">ویژگی محصول</label>
                     <textarea id="mytextarea" name="property">
                        {{ $product->property }}
                     </textarea>
                  </div>

                  <div class="form-group">
                     <label class="form-label">تعداد</label>
                     <input type="number" class="form-control" name="storage" value="{{ $product->storage }}">
                  </div>

                  <div class="form-group">
                     <label class="form-label">قیمت</label>
                     <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                  </div>

                  <div class="form-group">
                     <label class="form-label">تخفیف</label>
                     <input type="text" class="form-control" name="sale" value="{{ $product->sale }}">
                  </div>

                  <div class="form-group">
                     <label class="form-label">انتخاب دسته‌بندی</label>
                     <select name="category_id" id="category_id" class="form-control">
                        <option value="{{ $product->category_id }}">{{ $product->category->category }}</option>
                        @foreach($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                     </select>
                  </div>

                  <div class="form-group">
                     <label class="form-label">معرفی محصول</label>
                     <textarea id="mytextarea" name="intro">
                        {{ $product->intro }}
                     </textarea>
                  </div>

                  <div class="form-group">
                     <label class="form-label">بررسی تخصصی محصول</label>
                     <textarea id="mytextarea" name="expert">
                        {{ $product->expert }}
                     </textarea>
                  </div>

                  <div class="form-group">
                     <label class="form-label">مشخصات محصول</label>
                     <textarea id="mytextarea" name="specific">
                        {{ $product->specific }}
                     </textarea>
                  </div>

                  <div class="form-group">
                     <label class="form-label">انتخاب موقعیت</label>
                     <select name="position" id="position"
                        class="form-control">
                        <option value="{{ $product->position }}">{{ $product->position }}</option>
                        <option value="فروش ویژه">فروش ویژه</option>
                        <option value="پیشنهاد شگفت‌انگیز">پیشنهاد شگفت‌انگیز</option>
                        <option value="پرفروش‌ترین‌ها">پرفروش‌ترین‌ها</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label class="form-label">کاور</label>
                     <input type="file" class="form-control" name="cover">
                  </div>

                  <div class="form-group">
                     <label class="form-label">گالری عکس محصول</label>
                     <input type="file" name="images[]" class="form-control" multiple>
                  </div>

                  <div class="form-group">
                     <button type="submit" class="btn btn-success">ویرایش</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
