<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">All Products</a></li>
                        <li class="breadcrumb-item"><a href="#">Create New Product</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
   <div class="container">
       <div class="row">
           <div class="col-12">
               <div class="card">
                   <div class="card-header">
                       <h3>Create New Product</h3>
                   </div>
                   <div class="card-body">
                    <form id="product_add" wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" wire:keyup="generateSlug">
                                    @error('name')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" wire:model="slug" value="{{ $slug }}" readonly>
                                    @error('slug')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="cost" class="form-label">Cost</label>
                                    <input type="text" class="form-control @error('cost') is-invalid @enderror" id="cost" placeholder="MMK 0.00" wire:model="cost">
                                    @error('cost')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="MMK 0.00" wire:model="price">
                                    @error('price')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 col-sm-12 mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Category" id="category" wire:model="category_id">
                                    <option>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                    @error('category_id')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="barcode" class="form-label">Barcode</label>
                                <select class="form-select @error('barcode') is-invalid @enderror" aria-label="Barcode Symbology" id="barcode" wire:model="barcode">
                                    <option>Select Barcode</option>
                                    <option value="TYPE_CODE_128">Code 128</option>
                                    <option value="TYPE_CODE_39">Code 39</option>
                                    <option value="TYPE_UPC_A">UPC-A</option>
                                    <option value="TYPE_UPC_E">UPC-E</option>
                                    <option value="TYPE_EAN_13">EAN-13</option>
                                    <option value="TYPE_EAN_8">EAN-8</option>
                                </select>
                                    @error('barcode')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" wire:model="quantity">
                                    @error('quantity')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="alert_quantity" class="form-label">Alert quantity</label>
                                    <input type="number" class="form-control @error('alert_quantity') is-invalid @enderror" id="alert_quantity" wire:model="alert_quantity">
                                    @error('alert_quantity')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="tax" class="form-label">Tax</label>
                                    <input type="number" class="form-control @error('tax') is-invalid @enderror" id="tax" wire:model="tax">
                                    @error('tax')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-3">
                                <label for="tax_type" class="form-label">Tax Type</label>
                                <select class="form-select @error('tax_type') is-invalid @enderror" aria-label="Tax Type" id="tax_type" wire:model="tax_type">
                                    <option>Select Tax Type</option>
                                    <option value="1">Inclusive</option>
                                    <option value="2">Exclusive</option>
                                </select>
                                    @error('tax_type')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="product_code" class="form-label">Product_code</label>
                                    <input type="text" class="form-control @error('product_code') is-invalid @enderror" id="product_code" wire:model="product_code">
                                    @error('product_code')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" class="form-control @error('unit') is-invalid @enderror" id="unit" wire:model="unit">
                                    @error('unit')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="15" wire:model="description"></textarea>
                                    @error('description')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="mb-3">Images</label>
                                <div class="dropzone mx-auto">
                                        @if ($images)
                                            @foreach ($images as $image)
                                                <img src="{{ $image->temporaryUrl() }}" width="100px"  height="100px" alt="">
                                            @endforeach
                                        @else
                                        <label for="file" class="images_label text-center">
                                            <input name="file" type="file" id="file" multiple="multiple" wire:model="images" class="form-control @error('images') is-invalid @enderror">
                                            <h2>You can upload multiple images.</h2>
                                            <h4 class="text-primary">Click here to upload.</h4>
                                        </label>
                                        @endif
                                </div>
                                    @error('images')
                                       <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12"><button class="btn btn-dark float-right" type="submit">Create</button></div>
                        </div>
                    </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
