@extends('admin.layouts.app')
@section('title', 'تلفن پشتیبانی')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('support.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>شماره تلفن</label>
                            <input type="text" name="tel" class="form-control @error('tel') is-invalid @enderror" value="{{ old('tel') }}" placeholder="عنوان را وارد کنید"/>
                            <span class="text-danger">
                                @error('tel')
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
