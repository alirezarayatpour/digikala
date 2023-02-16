@extends('admin.layouts.app')
@section('title', 'دسته‌بندی')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('category.create') }}" class="btn btn-primary">ایجاد دسته‌بندی</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                           <thead>
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">دسته‌بندی</th>
                                 <th scope="col">دسته‌بندی مادر</th>
                                 <th scope="col">دسته‌بندی فرزند</th>
                                 <th scope="col">عکس</th>
                                 <th scope="col">وضعیت</th>
                                 <th scope="col">ویرایش</th>
                                 <th scope="col">حذف</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($category as $item)
                                 <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->category }}</td>

                                    <td>
                                       @foreach($parent as $par)
                                          @if ($par->id == $item->parent_id)
                                             {{ $par->category }}
                                          @endif
                                       @endforeach
                                    </td>

                                    <td>
                                       @foreach($children as $child)
                                          @if ($child->id == $item->child_id)
                                             {{ $child->category }}
                                          @endif
                                       @endforeach
                                    </td>
                                    
                                    <td><img src="{{ asset('images/category') . '/' . $item->image }}" alt="" width="100px" height="50px"></td>

                                    @switch($item->status)
                                       @case(0)
                                          @php
                                             $url = route('category.status', $item->slug);
                                             $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                          @endphp
                                       @break

                                       @case(1)
                                          @php
                                             $url = route('category.status', $item->slug);
                                             $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                          @endphp
                                       @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td><a href="{{ route('category.edit', $item->slug) }}" class="btn btn-info">ویرایش</a></td>
                                    <td>
                                       <form action="{{ route('category.destroy', $item->slug) }}" method="POST" class="myForm">
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
            {{ $category->links('vendor/pagination/bootstrap-5') }}
        </div>
    </div>
@endsection
