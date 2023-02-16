@extends('admin.layouts.app')
@section('title', 'متن فوتر')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('footerText.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                           <label>متن</label>
                           <textarea name="text" id="mytextarea" class="form-control @error('text') is-invalid @enderror">
                              {{ old('text') }}
                           </textarea>
                           <span class="text-danger">
                              @error('text')
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
