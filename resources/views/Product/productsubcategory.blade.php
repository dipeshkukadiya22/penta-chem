@extends('Admin.app')
@section('content')
    <link rel="stylesheet" type="text/css"
        href="{{ url('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{url('/app-assets/vendors/css/forms/select/select2.min.css')}}">
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
                            <h2 class="content-header-title float-start mb-0">Technical Specifications</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Technical Specifications</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">


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

                            <div class="card-body">
                                <div class="accordion accordion-border" id="accordionBorder" data-toggle-hover="true">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingBorderOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#accordionBorderOne"
                                                aria-expanded="false" aria-controls="accordionBorderOne">
                                                Add New Technical Specifications
                                            </button>
                                        </h2>
                                        <div id="accordionBorderOne" class="accordion-collapse collapse"
                                            aria-labelledby="headingBorderOne" data-bs-parent="#accordionBorder"
                                            style="">
                                            <div class="accordion-body">
                                                <form class="needs-validation" method="POST" action="{{ route('productsubcategory.store') }}">
                                                    @csrf
                                                    <div class="row g-1">
                                                        <div class="col-md-4 col-12 mb-3 position-relative">


                                                            <label class="form-label">Technical Specifications Title</label>
                                                            <select name="category_list" class="select2 form-control" id="select2-basic">
                                                                @foreach ($category as $row)
                                                                    <option value="{{ $row->id }}">
                                                                        {{ $row->category_name }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        <div class="col-md-4 col-12 mb-3 position-relative">
                                                            <label class="form-label"
                                                                for="validationTooltip02">Technical Specifications</label>
                                                            <input type="text" class="form-control" name="category_name"
                                                                id="validationTooltip02" placeholder="Chemical Formula ">

                                                        </div>

                                                        <div class="col-md-3 col-12 mb-3 position-relative">
                                                            <label class="form-label"
                                                                for="validationTooltip02">Remarks</label>
                                                            <input type="text" class="form-control" name="remark"
                                                                id="validationTooltip02" placeholder="remark">

                                                        </div>
                                                        <div class="col-md-1 col-12 position-relative">
                                                            <button
                                                                class="btn btn-primary waves-effect mt-2 waves-float waves-light"
                                                                type="submit">Add</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <!--Table Starts here -->

                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Technical Specifications Title</th>
                                            <th>Technical Specifications</th>
                                            <th>Remarks</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($productcategory as $item)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{getSpecificationtitle($item->product_category)}}</td>
                                            <td>{{$item->subcategory_name}}</td>
                                            <td>{{$item->remark}}</td>
                                            <td>
                                                    <div class="">
                                                    
                                                        <a href="javascript:void(0)" class="edit-btn" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editProductCategory">
                                                            <img src="../app-assets/icon/editing.svg" width="15px"></a>
                                                        </a>
                                                                    
                                                        <a href="javascript:void(0)" class="delete-btn" data-id="{{ $item->id }}" style="margin-left: 10px">
                                                            <img src="../app-assets/icon/delete.svg" width="15px"></a>
                                                        </a>
            
                                                       </div>
                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </section>
                <!--/ Basic table -->



                <!--End table-->

            </div>
        </div>
    </div>

<!--begin::Modal - Edit Product Category-->
<div class="modal fade" id="editProductCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded">
            <!-- Modal Header -->
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title">Edit Technical Specifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body px-4">
                <form method="POST" id="productcategory" class="form edit-form" action="{{ route('productsubcategory.edit') }}">
                    @csrf
                    <input type="hidden" class="form-control"  name="id" id="edit_id" required>

                    <!-- Category Name Field -->
                    <div class="mb-3 mt-3">
        
                        <label class="form-label edit-label" >Technical Specifications Title</label>
                        <select name="edit_category_list" class="select2 form-control" id="edit_category_list">
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">
                                    {{ $row->category_name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <!-- Sub Category Name Field -->
                    <div class="mb-3 mt-3">
                        <label class="form-label edit-label" for="edit_category_name">Technical Specifications</label>
                        <input type="text" class="form-control" name="edit_subcategory_name" id="edit_subcategory_name" placeholder="Enter Chemical Formula" required>
                    </div>

                    <!-- Remarks Field -->
                    <div class="mb-3">
                        <label class="form-label edit-label" for="remark">Remarks</label>
                        <input type="text" class="form-control" name="edit_remark" id="edit_remark" placeholder="Enter Remarks">
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div> <!-- End of Modal Body -->
        </div> <!-- End of Modal Content -->
    </div>
</div>

<!--End::Modal - Edit Product Category>-->
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ url('/app-assets/vendors/css/forms/sweetalert2/sweetalert2.js') }}"></script>

<script>
    $(document).ready(function () {
        $(".edit-btn").click(function () {
            let categoryId = $(this).data("id");
            $.ajax({
                url: "{{ route('productsubcategory.get') }}",
                type: "GET",
                data: { id: categoryId },
                success: function (response) {
                    if (response.success) {
                        $("#edit_id").val(response.data.id);
                        $("#edit_category_list").val(response.data.product_category).trigger('change');
                        $("#edit_subcategory_name").val(response.data.subcategory_name);
                        $("#edit_remark").val(response.data.remark);
                    } else {
                        alert("Error fetching data.");
                    }
                },
                error: function () {
                    alert("Failed to retrieve data.");
                }
            });
        });
        /* Delete Product sub category with with confirmation dialog */
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
                            url: "/productsubcategory/destroy/" + categoryId,
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
    /* End Delete Product sub category */
    });
</script>