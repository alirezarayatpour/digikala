@extends('admin.layouts.app')
@section('title', 'دانلود اپلیکیشن')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('application.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>آپلود عکس</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                           <label>لینک</label>
                           <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" />
                           <span class="text-danger">
                               @error('link')
                                   {{ $message }}
                               @enderror
                           </span>
                       </div>
                        
                        <button type="submit" class="btn btn-success mt-2">ایجاد اپلیکیشن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
