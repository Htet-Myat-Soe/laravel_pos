<div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">All Users</a></li>
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
                <h5 class="card-title">All of Users Table</h5>
                <h6 class="card-subtitle text-muted">Just admin and moderator can create new users.</h6>
                @can('create user')
                    <a href="{{ route('admin.create_user') }}" class="btn btn-dark my-2">Create User</a>
                @endcan
            </div>
            <div class="row mx-2">
                <div class="col-lg-3 col-md-3 col-sm-12 my-2">
                    <a class="btn btn-dark  my-2" wire:click="exportExcel()" href="javascript:void(0)">Export Excel</a>
                    <a class="btn btn-dark" wire:click="exportPDF()"  href="javascript:void(0)">Print PDF</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                    <select class="form-select" aria-label="Per Page" wire:model="page_amount">
                        <option selected value="20">Per Page</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">500</option>
                    </select>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 my-2">
                        <input class="form-control" type="text" placeholder="Search By name" wire:model="users_search" aria-label="Search By name or email">
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
                        <th>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="selectPage" id="check-all">
                            </div>
                        </th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                @if (count($users) > 0)

                    @foreach ($users as $user)
                    <tr class="@if($this->isChecked($user->id)) table-primary @endif">
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $user->id }}" wire:model="checked" id="check-all">
                            </div>
                        </td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><p class="text-right">There is no any user.</p></td>
                        </tr>
                    </tbody>
                @endif
            </table>
            <div class="paginate my-5">
                {{ $users->links() }}
            </div>
        </div>
        </div>
    </div>
   </div>
</div>
