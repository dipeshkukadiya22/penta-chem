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
                        <h2 class="content-header-title float-start mb-0">Users</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Users</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <button type="button" class="btn btn-outline-secondary waves-effect" data-bs-toggle="modal" data-bs-target="#editUser">Add User</button>
                </div>
               
            </div>

            <!-- Edit User Modal -->
            <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-5 px-sm-5 pt-50">
                            <div class="text-center mb-2">
                                <h1 class="mb-1">Add User</h1>
                            </div>
                            <form id="editUserForm" method="POST" action="{{route('adduser')}}" class="row gy-1 pt-75">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Name</label>
                                    <input type="text" id="modalEditUserName" name="name" class="form-control" placeholder="john doe" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserEmail">Email</label>
                                    <input type="text" id="modalEditUserEmail" name="email" class="form-control"  placeholder="example@domain.com" />
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserEmail">Password</label>
                                    <input type="password" id="modalEditUserEmail" name="password" class="form-control"  placeholder="**************" />
                                </div>
                                
                                <div class="col-12 text-center mt-2 pt-50">
                                    <button type="submit" class="btn btn-primary me-1">Add User</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                        Discard
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit User Modal -->
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
                            <h4 class="card-title">Users</h4>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $item)
                                    <tr>
                                        <td>
                                            {{$loop->index+1}}
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            {{$item->email}}
                                        </td>
                                        <td>Admin</td>
                                        <td><span class="badge rounded-pill badge-light-primary me-1">Active</span></td>
                                        <td>
                                                    <div class="">
                                                    
                                                        <a href="javascript:void(0)" class="edit-btn" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#editUserData">
                                                            <img src="../app-assets/icon/editing.svg" width="15px"></a>
                                                        </a>
                                                                    
                                                        <a href="javascript:void(0)" class="delete-btn" data-id="{{ $item->id }}" style="margin-left: 10px">
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
<!-- Edit User Modal -->
<div class="modal fade" id="editUserData" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-5 px-sm-5 pt-50">
                            <div class="text-center mb-2">
                                <h1 class="mb-1">Edit User</h1>
                            </div>
                            <form id="editUser" method="POST" action="{{route('user.edit')}}" class="row gy-1 pt-75">
                                @csrf
                                <div class="col-12" hidden>
                                    <label class="form-label" for="modalEditUserId">Id</label>
                                    <input type="text" id="editId" name="editId" class="form-control" placeholder="" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalEditUserName">Name</label>
                                    <input type="text" id="editName" name="editName" class="form-control" placeholder="" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserEmail">Email</label>
                                    <input type="text" id="editEmail" name="editEmail" class="form-control"  placeholder="example@domain.com" />
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalEditUserEmail">Password</label>
                                    <input type="password" id="editPassword" name="editPassword" class="form-control"  placeholder="**************" />
                                </div>
                                
                                <div class="col-12 text-center mt-2 pt-50">
                                    <button type="submit" class="btn btn-primary me-1">Edit User</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                        Discard
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit User Modal -->
<!--End::Modal - Edit Product Category>-->
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ url('/app-assets/vendors/css/forms/sweetalert2/sweetalert2.js') }}"></script>

<script>
    $(document).ready(function () {
        $(".edit-btn").click(function () {
            let categoryId = $(this).data("id");
            $.ajax({
                url: "{{ route('user.get') }}",
                type: "GET",
                data: { id: categoryId },
                success: function (response) {
                    if (response.success) {
                        $("#editId").val(response.data.id);
                        $("#editName").val(response.data.name);
                        $("#editEmail").val(response.data.email);
                    } else {
                        alert("Error fetching data.");
                    }
                },
                error: function () {
                    alert("Failed to retrieve data.");
                }
            });
        });
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
                            url: "/admin/allusers/destroy/" + categoryId,
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