@extends('layout.page')
@section('title', 'Add New Post')
@section('main')
    <form action="{{ route('updatePost_', ['id' => $p->id]) }}" method="post" class="container">
        @csrf
        @method('PUT')
        @if (session('success'))
            <section class="bg-body-tertiary p-3 rounded mb-3">
                <div class="alert alert-primary">
                    {{ session('success') }}
                </div>
            </section>
        @endif
        <section class="bg-body-tertiary p-3 rounded mb-3">
            <div class="d-flex">
                <label for="exampleTitle" class="form-label h3 d-block">Title <span class="text-danger me-auto">(*)</span></label>
                <button type="submit" class="ms-auto form-label btn btn-outline-warning px-4">Update</button>
            </div>
            <input name="title" type="text" value="{{ $p->title }}" class="form-control form-control-lg" id="exampleTitle" placeholder="Tiêu đề của bài viết" required>
        </section>
        <section class="mb-3">
            <div class="row">
                <div class="col-8">
                    <div class="bg-body-tertiary p-3 rounded">
                        <div class="mb-3">
                            <label for="exampleSlug" class="form-label">Slug</label>
                            <input name="slug" value="{{ $p->slug }}" type="text" class="form-control " id="exampleSlug" placeholder="tieu-de-cua-bai-viet">
                        </div>
                        <div class="mb-3">
                            <label for="exampleTitle" class="form-label">Sub Title <span class="text-danger">(*)</span></label>
                            <textarea name="sub_title" value="{{ $p->sub_title }}" class="form-control" id="subTitle" rows="3" placeholder="mô tả ngắn - không quá 255 ký tự"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="bg-body-tertiary p-3 h-100 rounded">
                        <div class="mb-3">
                            <label for="inputGroupFile02" class="form-label">Danh mục <span class="text-danger">(*)</span></label>
                            <select name="category" class="form-select" aria-label="Default select example">
                                <option>Chọn danh mục</option>
                                @foreach ($category as $c)
                                    @if ($c->id == $p->id_cate)
                                        <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                    @else
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="inputGroupFile02" class="form-label">Hình ảnh <span class="text-danger">(*)</span></label>
                            <div class="input-group mb-3">
                                <input name="img" type="file" class="form-control" id="inputGroupFile02">
                                <img src="{{ asset('') }}/img" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-body-tertiary p-3 rounded mb-3">
            <label for="exampleContent" class="form-label">Content <span class="text-danger">(*)</span></label>
            <textarea name="content" class="form-control" id="exampleContent" rows="20">{{ $p->content }}</textarea>
        </section>
    </form>
@endsection
