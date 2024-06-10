@extends('layout.page')
@section('title', 'Product Category')
@section('main')
    <div class="container-fluid">

        <!-- Title -->
        <h1 class="h2">
            @yield('title')
        </h1>


        <div class="row">
            <div class="col-xxl-5 d-flex">

                <!-- Add product category -->
                <div class="card border-0 flex-fill w-100">
                    <div class="card-header border-0 card-header-space-between">

                        <!-- Title -->
                        <h2 class="card-header-title h4 text-uppercase">
                            Add new
                        </h2>
                    </div>

                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                <div class="form-text">The name is how it appears on your site.</div>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Parent Category</label>
                                <select class="form-select" aria-label="Default select example" name="parent">
                                    <option selected>Select the parent category</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleDescription" rows="3" name="description"></textarea>
                                <div class="form-text">The description is not prominent by default; however, some themes may show it.</div>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image <span class="text-danger">(*)</span></label>
                                <input class="form-control" type="file" id="formFile" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7 d-flex">

                <!-- table list catogories -->
                <div class="card border-0 flex-fill w-100" data-list='{"valueNames": ["name", "price", "quantity", "amount", {"name": "sales", "attr": "data-sales"}], "page": 5}' id="topSellingProducts">
                    <div class="card-header border-0 card-header-space-between">

                        <!-- Title -->
                        <h2 class="card-header-title h4 text-uppercase">
                            Product Category
                        </h2>
                    </div>

                    <!-- Table -->
                    <div class=" table">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="">
                                        Image
                                    </th>
                                    <th class="text-start">
                                        Name
                                    </th>
                                    <th class="text-start">
                                        Description
                                    </th>
                                    <th class="text-end">
                                        <a href="javascript: void(0);" class="text-muted list-sort" data-sort="quantity">
                                            Count
                                        </a>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody class="list table-group-divider">
                                @foreach ($listCate as $c)
                                <tr>
                                    <td class=""><img src="{{asset('images/logo/logothc.png')}}" width="50" alt="" class="rounded "></td>
                                    <td class="name fw-bold">{{$c->name}}</td>
                                    <td class="name text-start">mô tả</td>
                                    <td class="quantity text-end">{{$c->products_count}}</td>
                                    <td class="text-end">
                                        <button class="btn btn-primary">Chỉnh sửa</button>
                                    </td>
                                </tr>
                                @endforeach

                                {{-- <tr>
                                    <td class="name fw-bold">iPhone SE</td>
                                    <td class="price text-end">$499</td>
                                    <td class="quantity text-end">127</td>
                                    <td class="amount text-end">$63,373</td>
                                    <td class="sales" data-sales="25">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="progress w-100">
                                                <div class="progress-bar bg-dark" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="ms-3 text-muted">25%</span>
                                        </div>
                                    </td>
                                </tr>
                                --}}
                            </tbody>
                        </table>
                    </div> <!-- / .table-responsive -->
                </div>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container-fluid -->
@endsection
