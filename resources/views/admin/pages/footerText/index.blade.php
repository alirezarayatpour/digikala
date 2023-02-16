@extends('admin.layouts.app')
@section('title', 'متن فوتر')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('footerText.create') }}" class="btn btn-primary">ایجاد عنوان</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                           <thead>
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">متن</th>
                                 <th scope="col">وضعیت</th>
                                 <th scope="col">ویرایش</th>
                                 <th scope="col">حذف</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($footerText as $item)
                                 <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{!! $item->text !!}</td>

                                    @switch($item->status)
                                       @case(0)
                                          @php
                                             $url = route('footerText.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                          @endphp
                                       @break

                                       @case(1)
                                          @php
                                             $url = route('footerText.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                          @endphp
                                       @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td><a href="{{ route('footerText.edit', $item->id) }}" class="btn btn-info">ویرایش</a></td>
                                    <td>
                                       <form action="{{ route('footerText.destroy', $item->id) }}" method="POST" class="myForm">
                                          @csrf
                                          <button class="btn btn-danger">حذف</button>
                                       </form>
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
