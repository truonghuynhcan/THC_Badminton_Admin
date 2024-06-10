@extends('layout.page')
@section('title', 'Add New Post')
@section('main')
    <div class="container">
        @if (session('success'))
            <section class="bg-body-tertiary p-3 rounded mb-3">
                <div class="alert alert-primary">
                    {{ session('success') }}
                </div>
            </section>
        @endif
        <section class="bg-body-tertiary p-3 rounded mb-3">
            <div class="d-flex">
                <label for="exampleTitle" class="form-label h3 d-block">Post Dashboard</label>
            </div>
        </section>
        <section class="mb-3 bg-body-tertiary p-3 rounded d-none">
            <div class="row  ">
                <div class="col-4">
                    <div class="">
                        <div class="mb-3">
                            <label for="exampleSlug" class="form-label">tìm kiếm</label>
                            <input name="slug" type="text" class="form-control " id="exampleSlug" placeholder="tieu-de-cua-bai-viet">
                        </div>

                    </div>
                </div>
                <div class="col-4">
                    <div class="">
                        <div class="mb-3">
                            <label for="exampleSlug" class="form-label">tìm kiếm</label>
                            <input name="slug" type="text" class="form-control " id="exampleSlug" placeholder="tieu-de-cua-bai-viet">
                        </div>

                    </div>
                </div>
                <div class="col-4">
                    <div class="">
                        <div class="mb-3">
                            <label for="exampleSlug" class="form-label">tìm kiếm</label>
                            <input name="slug" type="text" class="form-control " id="exampleSlug" placeholder="tieu-de-cua-bai-viet">
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="bg-body-tertiary p-3 rounded mb-3">
            <form action="{{ route('allPost') }}" method="GET" class=" mb-3">
                <div class="form-group d-flex gap-2">
                    <label for="sort_by" class="mr-2">Sắp xếp theo:</label>
                    <select name="sort_by" id="sort_by" class="form-control mr-2">
                        <option value="date">Ngày viết</option>
                        <option value="user">Người viết</option>
                    </select>
                    <select name="sort_order" id="sort_order" class="form-control mr-2">
                        <option value="asc">Tăng dần</option>
                        <option value="desc">Giảm dần</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Sắp xếp</button>
                </div>
            </form>
            <table class="table table-hover caption-top">
                <caption>List of Post</caption>
                <thead>
                    <tr>
                        <th class="p-2 fs-6" scope="col">STT</th>
                        <th class="p-2 fs-6" scope="col">Title</th>
                        <th class="p-2 fs-6" scope="col">Author</th>
                        <th class="p-2 fs-6" scope="col">Categories</th>
                        <th class="p-2 fs-6" scope="col">Date</th>
                        <th class="p-2 fs-6" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($listPost as $p)
                        <tr>
                            <th scope="row">{{ $p->id }}</th>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->user->name }}</td>
                            <td>
                                @if ($p->category)
                                    {{ $p->category->name }}
                                @else
                                    No Category
                                @endif
                            </td>
                            <td>{{ $p->created_at }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="{{ route('updatePost', ['slug' => $p->slug]) }}" class="btn btn-primary">Sửa</a>

                                    <form action="{{ route('deletePost', ['id' => $p->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger">
                                            Xóa
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$listPost->links()}}
        </section>
    </div>
@endsection
