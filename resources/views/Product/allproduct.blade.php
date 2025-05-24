@extends('Admin.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('/app-assets/vendors/css/forms/sweetalert2/sweetalert2.css') }}" />
 <!-- BEGIN: Content-->
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
                                <li class="breadcrumb-item"><a href="#">Products</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('addproduct')}}" class="btn btn-outline-secondary waves-effect">Add Product</a>
                </div>
               
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    @if(session('done'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            {{session('done')}}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            {{session('done')}}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>
                
            </div>
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Products</h4>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Type</th>
                                        <th>Manufacturer</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $item)
                                    <tr>
                                        <td>
                                            {{$loop->index+1}}
                                        </td>
                                        <td>{{$item->product_name}}</td>
                                        <td>
                                            {{$item->producttype}}
                                        </td>
                                        <td> {{$item->manufacturer}}</td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <a href="{{route('viewsingleproduct',$item->id)}}" >
                                                    <img src="../app-assets/icon/view.svg" width="15px"></a>
                                                </a>
                                                
                                                <!-- <a href="javascript:void(0)" class="edit-btn" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editProduct">
                                                    <i data-feather='edit' style="height: 15px;width:15px"></i>
                                                </a> -->
                                                <a href="{{route('editproduct',$item->id)}}" class="edit-btn">
                                                    <img src="../app-assets/icon/editing.svg" width="15px"></a>
                                                </a>

                                                            
                                                <a href="javascript:void(0)" class="delete-btn" data-id="{{ $item->id }}">
                                                    <img src="../app-assets/icon/delete.svg" width="15px"></a>
                                                </a>
                                            </div>
                                          
                                        </td>
                                    </tr>
                                        
                                    @empty
                                        
                                    @endforelse
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

<!--begin::Modal - Edit Product-->
<div class="modal fade" id="editProduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content rounded">
            <!-- Modal Header -->
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title">Edit Technical Specifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body px-4">
                <form method="POST" id="productcategory" class="form edit-form" action="{{ route('product.edit') }}">
                    @csrf
                    <input type="hidden" class="form-control"  name="id" id="edit_id" required>

                    @php
                        // Group subcategories by category
                        $groupedCategories = $subcategories->groupBy('category.category_name');
                    @endphp

                    <div class="row" id="basic-table">
                        <div class="col-6">
                           
                                <!-- Category Name Field -->
                                <h3>Details</h3>
                                <!-- Sub Category Name Field -->
                                <div class="mb-1">
                                    <label class="form-label" for="producttype" style="font-size:14px;font-weight:bold;">Product Name:</label>
                                    <input type="text" class="form-control" name="pname" id="pname" required>
                                </div>
                                
                                    <div class="mb-1">
                                        @csrf
                                        <label class="form-label" for="producttype" style="font-size:14px;font-weight:bold;">Product Type:</label>
                                        <input type="text" class="form-control" name="producttype" id="producttype" required>
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label" for="producttype" style="font-size:14px;font-weight:bold;">Manufacturer:</label>
                                        <input type="text" class="form-control" name="manufacturer" id="manufacturer" required>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="producttype" style="font-size:14px;font-weight:bold;">Competitor Name:</label>
                                        <input type="text" class="form-control" name="Competitor" id="Competitor" required>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="producttype" style="font-size:14px;font-weight:bold;">Storage & Shelf Life:</label>
                                        <textarea class="form-control" rows="5" name="Storage" id="Storage"></textarea>
                                    </div>

                        </div>
                  
                    @php $count = 0; @endphp
                        
                            @foreach ($groupedCategories->sortBy(function ($subcategories, $categoryName) {
                                return $categoryName === 'Identification' ? 0 : 1;
                            }) as $categoryName => $subcategories)

                                @if ($categoryName == 'Physico-chemical Properties' || $categoryName == 'Specifications')
                                    @if ($count == 0)
                                        <div class="row"> <!-- Start new row -->
                                    @endif

                                    <div class="col-6 {{ $count == 0 ? '' : '' }} p-3" style="margin-top:-45px">
                                        <h3>{{ $categoryName }}</h3>
                                        @foreach ($subcategories as $subcategory)
                                            <div class="mb-1">
                                                <label class="form-label " for="categories[{{ $categoryName }}][{{ $subcategory->subcategory_name }}]" style="font-size:14px;font-weight:bold;">
                                                    {{ $subcategory->subcategory_name }}:
                                                </label>
                                                <input type="text" class="form-control" name="categories[{{ $subcategory->product_category }}][{{ $subcategory->id }}]"  value="[{{ getSpecificationtitle($subcategory->product_category) }}][{{ getSpecification($subcategory->id) }}]" >
                                            </div>
                                        @endforeach
                                    </div>

                                    @php $count++; @endphp

                                    @if ($count == 2)
                                        </div> <!-- Close row -->
                                        @php $count = 0; @endphp
                                    @endif

                                @else
                                    <div class="col-6 p-3" style="margin-top:-45px">
                                        <h3>{{ $categoryName }}</h3>
                                        @foreach ($subcategories as $subcategory)
                                            <div class="mb-1">
                                                <label class="form-label" for="categories[{{ $categoryName }}][{{ $subcategory->subcategory_name }}]" style="font-size:14px;font-weight:bold;">
                                                    {{ $subcategory->subcategory_name }}:
                                                </label>
                                                <input type="text" class="form-control" name="categories[{{ $subcategory->product_category }}][{{$subcategory->id }}]" value="[{{getSpecificationtitle( $subcategory->product_category) }}][{{ getSpecification($subcategory->id) }}]">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary me-1" style="margin-top:-35px">Save</button>
                    </div>
                </form>
            </div> <!-- End of Modal Body -->
        </div> <!-- End of Modal Content -->
    </div>
</div>

<!--End::Modal - Edit Product>-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ url('/app-assets/vendors/css/forms/sweetalert2/sweetalert2.js') }}"></script>
<script>
    $(document).ready(function () {
        // $(".edit-btn").click(function () {
        //     let categoryId = $(this).data("id");
        //     $.ajax({
        //         url: "{{ route('product.get') }}", 
        //         type: "GET",
        //         data: { id: categoryId },
        //         success: function (response) {
        //             if (response.success) {
        //                 $("#Competitor").val(response.data.competitor);
        //                 $("#Storage").val(response.data.storageandlife);
        //                 $("#pname").val(response.data.product_name);
        //                 $("#manufacturer").val(response.data.manufacturer);
        //                 $("#producttype").val(response.data.producttype);
                       
        //                 let specData = response.data.technical_specification;
            
        //                 // Convert JSON object to readable format
        //                 let formattedText = '';
                        
        //                 $.each(specData, function(category, subcategories) {
        //                     formattedText += category + ":\n";
        //                     let temp=category;
                           
        //                     $.each(subcategories, function(key, value) {
        //                         formattedText += "  " + key + ": " + value + "\n";
                           
        //                      let data="[" + temp + "][" + key + "]"  ;
        //                      document.querySelector("input[name='categories" + data + "']").value = value;
                        
        //                     });
                
        //                     formattedText += "\n"; // Add space between categories
        //                 });
          
                        
        //             } else {
        //                 alert("Error fetching data.");
        //             }
        //         },
        //         error: function () {
        //             alert("Failed to retrieve data.");
        //         }
        //     });
        // });
       /* Delete Product with confirmation dialog */
        $(".delete-btn").click(function () {
            let categoryId = $(this).data("id");
            Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!",
                    }).then((result) => {
    
                    if (result.isConfirmed) {

                        $.ajax({
                            url: "/admin/viewallproducts/destroy/" + categoryId,
                            type:'GET',
                            success:function(response){
                                Swal.fire(
                                    'Deleted!',
                                    '',
                                    'success',
                                    );
                                    location.reload();
                                    }
                            });
                    }
             });
        });
  /* End Delete Product */
    });
</script>