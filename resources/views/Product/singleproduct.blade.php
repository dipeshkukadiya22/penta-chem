@extends('Admin.app')
@section('content')
 <!-- BEGIN: Content-->
 <style>
    .customgrid-2 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
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
                        <h2 class="content-header-title float-start mb-0">{{$product->product_name}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">{{$product->product_name}}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('editproduct',$product->id)}}" class="btn btn-outline-secondary waves-effect">Edit Product</a>
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
                            <h4 class="card-title">Technical Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="customgrid-2">
                                @foreach($technical as $categoryName => $fields)
                                
                                <div>
                                    <h3>{{ getPropertytitles($categoryName) }}</h3>
    
                                    @foreach($fields as $field => $value)
        
                                    <p><strong>{{ getPropertytitle($field) }}:</strong> {{$value}}</p>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>

                            <hr>

                            <div class="">
                                <h3>Storage & Shelf Life</h3>
                                <p>{{$product->storageandlife}}</p>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection