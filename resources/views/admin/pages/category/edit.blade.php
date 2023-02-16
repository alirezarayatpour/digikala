@extends('admin.layouts.app')
@section('title', 'دسته‌بندی')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.update', $category->slug) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>نام دسته‌بندی</label>
                           <input type="text" name="category" class="form-control"  value="{{ $category->category }}"/>
                        </div>

                        <div class="form-group">
                           <label>نام دسته‌بندی مادر</label>
                           <select name="parent_id" id="parent_id" class="form-control">
                              <option value="0">بدون دسته‌بندی مادر</option>
                              @foreach($parents as $parent)
                                 <option value="{{ $category->id }}" {{ $category->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->category }}</option>
                              @endforeach
                           </select>
                        </div>

                        <div class="form-group">
                           <label>نام دسته‌بندی فرزند</label>
                           <select name="child_id" id="child_id" class="form-control">
                              <option value="0">بدون دسته‌بندی فرزند</option>
                              @foreach($childs as $child)
                                 <option value="{{ $category->id }}" {{ $category->child_id == $child->id ? 'selected' : '' }}>{{ $child->category }}</option>
                              @endforeach
                           </select>
                        </div>

                        <div class="form-group">
                           <label>عکس</label>
                           <input type="file" name="image" class="form-control" />
                        </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
