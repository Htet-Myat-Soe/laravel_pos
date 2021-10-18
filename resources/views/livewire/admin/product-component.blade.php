<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">All Products</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
     <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">All of Products Table</h5>
                    <h6 class="card-subtitle text-muted my-2">Just admin and moderator can create new products.</h6>
                    @can('create product')
                        <a href="{{ route('admin.add-product') }}" type="button" class="btn btn-dark">Add New Product</a>
                    @endcan
                </div>
                <div class="row mx-2">
                    <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                        <a class="btn btn-dark my-2" href="javascript:void(0)" wire:click.prevent="exportExcel">Export Excel</a>
                        <a class="btn btn-dark" href="javascript:void(0)" wire:click.prevent="deleteSelected">Delete</a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                        <select class="form-select" aria-label="Per Page" wire:model="page_amount">
                            <option selected value="20">Per Page</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="1000">1000</option>
                        </select>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 my-2">
                            <input class="form-control" type="text" placeholder="Search By name or product code" wire:model="search" aria-label="Search By name or email">
                    </div>
                </div>
                @if(count($checked) > 0)
                <div class="col-12">
                    <p class="ml-3 mt-2">You have selected <strong>{{ count($checked) }}</strong>.</p>
                </div>
                @endif
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th style="width: 5%">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model="selectPage" id="check-all">
                                </div>
                            </th>
                            <th style="width: 15%">Image</th>
                            <th style="width: 25%">Name</th>
                            <th style="width: 15%">Price</th>
                            <th style="width: 12%">Quantity</th>
                            <th style="width: 15%">Category</th>
                            <th style="width: 23%">Action</th>

                        </tr>
                    </thead>
                    @if(count($products) > 0)
                    <tbody>
                    @foreach ($products as $product)
                    <tr class="@if($this->isChecked($product->id)) table-primary @endif">
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="checked" value="{{ $product->id }}" id="check-all">
                            </div>
                        </td>
                        <td>
                            <?php $images = explode(",", $product->images ); ?>
                            <img src="{{asset('assets/images/products')}}/{{$images[1]}}" width="100px" height="100px" alt="{{$product->name}}">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td class="table-action">
                            <a href="{{ route('admin.edit-product',['slug' => $product->slug]) }}"><i class="align-middle" data-feather="edit-2"></i></a>
                            <a href="{{ route('admin.show-product',['slug' => $product->slug]) }}"><i data-feather="eye"></i></a>
                            <a href="javascript:void(0)"  wire:click.prevent="deleteProduct({{ $product->id }})" ><i data-feather="trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><p class="text-right">There is no product.</p></td>
                        </tr>
                    </tbody>
                @endif
                </table>
                <div class="paginate my-5">
                    {{ $products->links() }}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


