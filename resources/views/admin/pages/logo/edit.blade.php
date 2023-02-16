@extends('admin.layouts.app')
@section('title', 'لوگو')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('logo.update', $logo->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>لوگو</label>
                           <input type="file" name="image" class="form-control" />
                       </div>

                       <div class="form-group">
                           <label>موقعیت لوگو</label>
                           <select name="position" id="position" class="form-control">
                               <option value="{{ $logo->position }}" {{ $logo->position ? 'selected' : '' }}>{{ $logo->position }}</option>
                               <option value="منو بالا">منو بالا</option>
                               <option value="منو پایین">منو پایین</option>
                               <option value="favicon">favicon</option>
                           </select>
                       </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
