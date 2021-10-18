<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">All Categories</a></li>
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
                 <h5 class="card-title">All of Categories Table</h5>
                 <h6 class="card-subtitle text-muted my-2">Just admin and moderator can create new categories.</h6>
                 @can('create category')
                     <a href="javascript:void(0)" type="button" class="btn btn-dark" data-toggle="modal" data-target="#addNewCategory">Add New Category</a>
                 @endcan
             </div>
             <div class="row mx-2">
                 <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                     <a class="btn btn-dark  my-2" href="javascript:void(0)" wire:click.prevent="exportExcel">Export Excel</a>
                     <a class="btn btn-dark" href="javascript:void(0)" wire:click.prevent="deleteSelected">Delete</a>
                 </div>
                 <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                     <select class="form-select" aria-label="Per Page" wire:model="page_amount">
                         <option selected value="15">Per Page</option>
                         <option value="20">20</option>
                         <option value="50">50</option>
                         <option value="100">100</option>
                         <option value="150">150</option>
                     </select>
                 </div>
                 <div class="col-lg-5 col-md-5 col-sm-12 my-2">
                         <input class="form-control" type="text" placeholder="Search By name" wire:model="search" aria-label="Search By name or email">
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
                         <th style="width: 10%">
                             <div class="form-check">
                                 <input class="form-check-input" type="checkbox" wire:model="selectPage" id="check-all">
                             </div>
                         </th>
                         <th style="width: 10%">Id</th>
                         <th style="width: 40%">Name</th>
                         <th style="width: 15%">Product Count</th>
                         <th style="width: 25%">Action</th>
                     </tr>
                 </thead>
                 @if(count($categories) > 0)
                 <tbody>
                    @foreach ($categories as $category)
                    <tr class="@if($this->isChecked($category->id)) table-primary @endif">
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="checked" value="{{ $category->id }}" id="check-all">
                            </div>
                        </td>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ count($category->products) }}</td>
                        <td class="table-action">
                           <a href="javascript:void(0)" type="button"  data-toggle="modal" wire:click.prevent="editCategory({{ $category->id }})" data-target="#editCategory" ><i class="align-middle" data-feather="edit-2"></i></a>
                           <a href="javascript:void(0)" onclick="cat_delete();" wire:click.prevent="delete({{ $category->id }})"><i class="align-middle" data-feather="trash"></i></a>
                       </td>
                   </tr>
                    @endforeach
                </tbody>
                @else
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><p class="text-right">There is no any category.</p></td>
                        </tr>
                    </tbody>
                @endif
             </table>
             <div class="paginate my-5">
                 {{ $categories->links() }}
             </div>
         </div>
         </div>
     </div>
    </div>


{{-- Add New Category --}}
<div class="modal fade" id="addNewCategory" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                 <form id="categoryForm">
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Category Name" wire:model="name" wire:keyup="generateSlug">
                                @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Slug Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="slug" placeholder="{{$slug}}" value="{{$slug}}" wire:model="slug"  readonly>
                                @error('slug')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button  type="button" class="btn btn-dark float-right" wire:click.prevent="store">Create</button>
                    </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Category --}}
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                 <form id="categoryForm">
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Category Name" wire:model="name" wire:keyup="generateSlug" value="{{ $name }}">
                                @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Slug Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="slug" placeholder="{{$slug}}" value="{{$slug}}" wire:model="slug"  readonly>
                                @error('slug')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button  type="button" class="btn btn-dark float-right" wire:click.prevent="update">Update</button>
                    </form>
            </div>
        </div>
    </div>
</div>

</div>

