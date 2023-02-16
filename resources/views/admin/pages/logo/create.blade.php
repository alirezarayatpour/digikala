@extends('admin.layouts.app')
@section('title', 'لوگو')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('logo.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>لوگو</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label>موقعیت لوگو</label>
                            <select name="position" id="position" class="form-control @error('position') is-invalid @enderror">
                                <option disabled selected>انتخاب موقعیت</option>
                                <option value="منو بالا">منو بالا</option>
                                <option value="منو پایین">منو پایین</option>
                                <option value="favicon">favicon</option>
                            </select>
                            <span class="text-danger">
                                @error('position')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <button type="submit" class="btn btn-success mt-2">ایجاد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
