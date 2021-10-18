<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Restaurant Point of sale">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="Restaurant">

	<link rel="shortcut icon" href="{{ asset('assets/backend/img/logo.png')}}" />

	<title>My Ecommerce</title>

    <link href="{{ asset('assets/backend/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">
    <!-- Splide Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Foodie.</span>
                </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="{{ route('admin.dashboard') }}">
								<i class="align-middle" data-feather="bar-chart"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>

					<li class="sidebar-item">
							<a data-target="#product" data-toggle="collapse" class="sidebar-link collapsed">
								<i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Product</span>
							</a>
							<ul id="product" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
								<li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.categories') }}">Category</a></li>
								<li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.products') }}">All Products</a></li>
								<li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.add-product') }}">Add Product</a></li>
								<li class="sidebar-item"><a class="sidebar-link" href="#">Print Barcode</a></li>
							</ul>
					</li>

					<li class="sidebar-item">
						<a data-target="#adjustment" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Adjustments</span>
						</a>
						<ul id="adjustment" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Create Adjustment</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">All Adjustments</a></li>
						</ul>
				  </li>

					<li class="sidebar-item">
						<a data-target="#quotation" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Quotations</span>
						</a>
						<ul id="quotation" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Create Quotation</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">All Quotations</a></li>
						</ul>
				  </li>

					<li class="sidebar-item">
						<a data-target="#purchases" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="truck"></i> <span class="align-middle">Purchases</span>
						</a>
						<ul id="purchases" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Create Purchases</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">All Purchases</a></li>
						</ul>
				  </li>

					<li class="sidebar-item">
						<a data-target="#purchase_return" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="corner-down-right"></i> <span class="align-middle">Purchase Return</span>
						</a>
						<ul id="purchase_return" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Create Purchases Return</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">All Purchases Return</a></li>
						</ul>
				  </li>

					<li class="sidebar-item">
						<a data-target="#sales" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Sales</span>
						</a>
						<ul id="sales" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Create Sale</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">All Sales</a></li>
						</ul>
				  </li>

					<li class="sidebar-item">
						<a data-target="#sale_return" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="corner-left-up"></i> <span class="align-middle">Sales Return</span>
						</a>
						<ul id="sale_return" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Create Sale Return</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">All Sales Return</a></li>
						</ul>
				  </li>

					<li class="sidebar-item">
						<a data-target="#expenses" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Expenses</span>
						</a>
						<ul id="expenses" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Categories</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Create Expense</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">All Expenses</a></li>
						</ul>
				  </li>

					<li class="sidebar-item">
						<a data-target="#people" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">People</span>
						</a>
						<ul id="people" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Customers</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Supliers</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Roles and Permissions</a></li>
						</ul>
				  </li>

					<li class="sidebar-item">
						<a data-target="#report" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="send"></i> <span class="align-middle">Reports</span>
						</a>
						<ul id="report" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Profit / Loss Report</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Payments Report</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Sale Report</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Purchases Report</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Sales Return Report</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Purcases Return Report</a></li>
						</ul>
				  </li>

					<li class="sidebar-item">
						<a data-target="#user_management" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">User Management</span>
						</a>
						<ul id="user_management" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.create_user') }}">Create User</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('admin.all_users') }}">All Users</a></li>
						</ul>
				  </li>

					<li class="sidebar-item">
						<a data-target="#settings" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
						</a>
						<ul id="settings" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Currencies</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">System Settings</a></li>
						</ul>
				  </li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>

				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
                            <i class="align-middle" data-feather="search"></i>
                        </button>
					</div>
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('assets/backend/img/avatars/avatar-5.jpg') }}" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('assets/backend/img/avatars/avatar-2.jpg') }}" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('assets/backend/img/avatars/avatar-4.jpg') }}" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('assets/backend/img/avatars/avatar-3.jpg') }}" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                            <img src="{{ asset('assets/backend/img/avatars/avatar.jpg')}}" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark">{{ Auth::user()->name }}</span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">Log out</a>
                                <form action="{{ route('logout') }}" method="post" id="logout">
                                    @csrf
                                </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				{{$slot}}
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>AdminKit Demo</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  --}}
    <!-- Splide cdn -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/p1axcb7ns48ik69xt9zfslfzjgbny0saz5osw91e46i50y2f/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script src="{{ asset('assets/backend/js/app.js') }}"></script>

    @livewireScripts


    <script>
        tinymce.init({
            selector: '#description'
        });
    </script>

    <script>
        var splide = new Splide( '.splide' );
        var bar    = splide.root.querySelector( '.my-slider-progress-bar' );

        // Update the bar width:
        splide.on( 'mounted move', function () {
          var end = splide.Components.Controller.getEnd() + 1;
          bar.style.width = String( 100 * ( splide.index + 1 ) / end ) + '%';
        } );

        splide.mount();
    </script>

    <script>

        window.livewire.on("category_created",()=>{
            $("#addNewCategory").modal('hide');
            location.reload();
            swal("Great Job","Category Created Successfully","success",{
                button:"OK",
            });
        });

        window.livewire.on("category_updated",()=>{
            $("#editCategory").modal('hide');
            location.reload();
            swal("Great Job","Category Updated Successfully","success",{
                button:"OK",
            });
        });

        window.livewire.on("category_deleted",()=>{
            swal("Great Job","Category Deleted Successfully","success",{
                button:"OK",
            });

        });

        window.livewire.on("product_created",()=>{
        swal("Great Job","Product Created Successfully","success",{
            button:"OK",
            });
        });

        window.livewire.on("product_updated",()=>{
            swal("Great Job","Product Updated Successfully","success",{
                button:"OK",
            });
        });

        window.livewire.on("product_deleted",()=>{
            swal("Great Job","Product Deleted Successfully","success",{
                button:"OK",
            });
            location.reload();

        });

        window.livewire.on("please_select",()=>{
            swal("Please","Please , Select item that you want","warning",{
                button:"OK",
            });
            location.reload();
        });

    </script>

</body>

</html>
