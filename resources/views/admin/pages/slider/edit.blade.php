@extends('admin.layouts.app')
@section('title', 'اسلایدر')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>عکس</label>
                            <input type="file" name="image" class="form-control" />
                        </div>

                        <div class="form-group">
                           <label>دسته‌بندی</label>
                           <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror">
                                <option value="{{ $slider->category_id }}" {{ $slider->category_id ? 'selected' : '' }}>{{ $slider->category->category }}</option>
                                @foreach ($category as $item)
                                   <option value="{{ $item->id }}">{{ $item->category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>موقعیت</label>
                            <select name="position" id="position" class="form-control">
                                @switch($slider->position)
                                    @case(1)
                                        @php
                                            $position = 'صفحه اصلی';
                                        @endphp
                                    @break

                                    @case(2)
                                        @php
                                            $position = 'صفحه سوپرمارکت';
                                        @endphp
                                    @break

                                    @case(3)
                                        @php
                                            $position = 'صفحه دسته‌بندی';
                                        @endphp
                                    @break
                                @endswitch
                                <option value="{{ $slider->position }}" {{ $slider->position ? 'selected' : '' }}>{{ $position }}</option>
                                <option value="1">صفحه اصلی</option>
                              <option value="2">صفحه سوپرمارکت</option>
                              <option value="3">صفحه دسته‌بندی</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
