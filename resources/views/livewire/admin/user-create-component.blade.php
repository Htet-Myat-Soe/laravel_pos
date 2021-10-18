<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.all_users') }}">All Users</a></li>
                        <li class="breadcrumb-item"><a href="#">Create User</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
       <div class="row">
           <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Create New User</h5>
                    <h6 class="card-subtitle text-muted">Admin can create new user.</h6>
                </div>
                <div class="card-body">
                    @if(Session::has('user_created'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="alert-icon">
                            <i class="far fa-fw fa-bell"></i>
                        </div>
                        <div class="alert-message">
                            {{ Session::get('user_created') }}
                        </div>
                    </div>
                    @endif
                    <form wire:submit.prevent="createUser" id="userCreate">
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Name" wire:model="name">
                                @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control"  wire:model="email" placeholder="example@gmail.com">
                                @error('email')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" wire:model="password" placeholder="Secret Key">
                                @error('password')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" wire:model="phone" placeholder="+959-xxx-xxx-xxx">
                                @error('phone')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-2 text-sm-right">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" placeholder="Address" wire:model="address" rows="3"></textarea>
                                @error('address')
                                    <p class="text-danger m-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           </div>
       </div>
   </div>
</div>
