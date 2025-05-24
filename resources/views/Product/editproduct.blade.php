@extends('Admin.app')
@section('content')
    <!-- BEGIN: Content-->
    <style>
        .customgrid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px;
        }
    </style>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Products</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Edit Product</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                    </div>

                </div>


            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        @if (session('done'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <div class="alert-body">
                                    {{ session('done') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="alert-body">
                                    {{ session('done') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                </div>
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Product</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('product.update') }}">

                                    @php
                                        // Group subcategories by category
                                        $groupedCategories = $subcategories->groupBy('category.category_name');
                                    @endphp
                                    <div class="customgrid">

                                        <div class="">
                                            <h3>Details</h3>
                                            <div class="mb-2" hidden>
                                                <label class="form-label edit-label" for="producttype">Product Id:</label>
                                                <input type="text" class="form-control" name="pid" id="pid" value="{{$product->id}}">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label edit-label" for="producttype">Product Name:</label>
                                                <input type="text" class="form-control" name="pname" value="{{$product->product_name}}" required>
                                            </div>
                                            <div class="mb-2">
                                                @csrf
                                                <label class="form-label edit-label" for="producttype">Product Type:</label>
                                                <input type="text" class="form-control" name="producttype" value="{{$product->producttype}}" required>
                                            </div>

                                            <div class="mb-2">
                                                <label class="form-label edit-label" for="producttype">Manufacturer:</label>
                                                <input type="text" class="form-control" name="manufacturer" value="{{$product->manufacturer}}" required>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label edit-label" for="producttype">Competitor Name:</label>
                                                <input type="text" class="form-control" name="Competitor" value="{{$product->competitor}}" required>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label edit-label" for="producttype">Storage & Shelf Life:</label>
                                                <textarea class="form-control" rows="5" name="Storage" >{{$product->storageandlife}}</textarea>
                                            </div>
                                        </div>
                                    
                                        @foreach ($groupedCategories->sortBy(function ($subcategories, $categoryName) {
                                                return $categoryName === 'Identification' ? 0 : 1;
                                            }) as $categoryName => $subcategories)
                                            <div>
                                                <h3>{{ $categoryName }}</h3> <!-- Display Category Name Once -->

                                                @foreach ($subcategories as $subcategory)
                                                <div class="mb-2">
                                                    <label class="form-label edit-label" for="categories[{{ $categoryName }}][{{ $subcategory->subcategory_name }}]">
                                                        {{ $subcategory->subcategory_name }}:
                                                    </label>
                                                    <input type="text" class="form-control "
                                                    name="categories[{{ $subcategory->product_category }}][{{ $subcategory->id }}]" 
                                                    value="{{ isset($technicalspecification[$subcategory->product_category][$subcategory->id]) ? $technicalspecification[$subcategory->product_category][$subcategory->id] : '' }}">
                                                </div>
                                            @endforeach
                                            </div>
                                        @endforeach
                              

                                    </div>
                                    <button type="submit" class="btn btn-primary me-1">Save</button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
