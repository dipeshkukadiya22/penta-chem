<h2>This is product page</h2>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
        Add Product
    </button>
</div>


<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Sr No</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Technical Specification<tht>
                <th>Action</th>    
            </tr>
        </thead>
        @php $srno=1; @endphp

        @foreach ($products as $item )

            <tr>
                <td>{{$srno++}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->product_code}}</td>
                <td >{{$item->technical_specification}}</td>
                <td>
                <button type="button" value="{{ $item->id }}" class="view_product btn btn-primary btn-sm">View</button>
                </td>
             
            </tr>
        
        @endforeach
        
    </table>
</div>
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- Subcategory Form -->
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="product_name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product code</label>
                        <input type="text" name="product_code" class="form-control" value=" {{$productcode}} " readonly>
                    </div>
                @php
                    // Group subcategories by category
                    $groupedCategories = $subcategories->groupBy('category.category_name');
                @endphp

                @foreach ($groupedCategories as $categoryName => $subcategories)
                    <h3>{{ $categoryName }}</h3> <!-- Display Category Name Once -->

                    @foreach ($subcategories as $subcategory)
                        <label for="{{ $subcategory->subcategory_name }}">{{ $subcategory->subcategory_name }}:</label>
                        <input type="text" name="{{ $subcategory->subcategory_name }}" required>
                        <br><br>
                    @endforeach
                @endforeach

                <button type="submit">Save</button>
            </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>