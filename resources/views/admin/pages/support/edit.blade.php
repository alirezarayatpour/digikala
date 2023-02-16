@extends('admin.layouts.app')
@section('title', 'تلفن پشتیبانی')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('support.update', $support->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                           <label>شماره تلفن</label>
                           <input type="text" name="tel" class="form-control" value="{{ $support->tel }}"/>
                       </div>

                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
