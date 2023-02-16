@extends('admin.layouts.app')
@section('title', 'اسلایدر')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('slider.create') }}" class="btn btn-primary">ایجاد اسلایدر جدید</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                           <thead>
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">عکس</th>
                                 <th scope="col">دسته‌بندی</th>
                                 <th scope="col">موقعیت</th>
                                 <th scope="col">وضعیت</th>
                                 <th scope="col">ویرایش</th>
                                 <th scope="col">حذف</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($slider as $item)
                                 <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td><img src="{{ asset('images/slider') . '/' . $item->image }}" alt="" width="150px" height="50px"></td>
                                    <td>{{ $item->category->category }}</td>

                                    @switch($item->position)
                                       @case(1)
                                          @php
                                             $position = "صفحه اصلی";
                                          @endphp
                                       @break

                                       @case(2)
                                          @php
                                             $position = "صفحه سوپرمارکت";
                                          @endphp
                                       @break

                                       @case(3)
                                          @php
                                             $position = "صفحه دسته‌بندی";
                                          @endphp
                                       @break
                                    @endswitch
                                    
                                    <td>{{ $position }}</td>

                                    @switch($item->status)
                                       @case(0)
                                          @php
                                             $url = route('slider.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                          @endphp
                                       @break

                                       @case(1)
                                          @php
                                             $url = route('slider.status', $item->id);
                                             $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                          @endphp
                                       @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td><a href="{{ route('slider.edit', $item->id) }}" class="btn btn-info">ویرایش</a></td>
                                    <td>
                                       <form action="{{ route('slider.destroy', $item->id) }}" method="POST" class="myForm">
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
            {{ $slider->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
