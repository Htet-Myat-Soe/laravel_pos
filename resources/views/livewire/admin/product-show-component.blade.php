<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">All Products</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $name }}</a></li>
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
                       <h3 class="font-weight-bold">{{ $name }}</h3>
                       <p><strong>Created at</strong> {{ $created_at }}</p>
                   </div>
                   <div class="card-body">
                       <div class="row my-3">
                           <div class="col-md-4 col-sm-12 my-3" id="product_show">
                            <div class="splide">
                                <div class="splide__track">
                                  <ul class="splide__list">
                                      <?php $imgs = explode(",",$images); ?>
                                    @foreach ($imgs as $image)
                                    @if ($image)
                                    <li class="splide__slide">
                                        <img src="{{ asset('assets/images/products') }}/{{ $image }}" alt="">
                                    </li>
                                    @endif
                                    @endforeach
                                  </ul>
                                </div>

                                <!-- Add the progress bar element -->
                                <div class="my-slider-progress">
                                  <div class="my-slider-progress-bar"></div>
                                </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-sm-12 my-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Name -  </strong>{{ $name }}</li>
                                <li class="list-group-item"><strong>Category -  </strong>{{ $category }}</li>
                                <li class="list-group-item"><strong>Price -  </strong>MMK {{ $price }}</li>
                                <li class="list-group-item"><strong>Cost -  </strong>MMK {{ $cost }}</li>
                                <li class="list-group-item"><strong>Quantity -  </strong>{{ $quantity }}</li>
                                <li class="list-group-item"><strong>Alert Quantity -  </strong>{{ $alert_quantity }}</li>
                                <li class="list-group-item"><strong>Product Code -  </strong>{{ $product_code }}</li>
                            </ul>
                           </div>
                           <div class="col-md-4 col-sm-12 my-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Tax -  </strong> {{ $tax }} %</li>
                                <li class="list-group-item"><strong>Tax Type -  </strong>{{ $tax_type }}</li>
                                <li class="list-group-item"><strong>Unit -  </strong>{{ $unit }}</li>
                                <li class="list-group-item"><strong>Barcode Type -  </strong>{{ $barcode }}</li>
                                <li class="list-group-item">Barcode</li>
                            </ul>
                           </div>
                       </div>
                       @if ($description)
                        <div class="row mt-2">
                            <div class="col-12">
                            <h4>Description</h4>
                            <p class="p-2 text-justify">
                                {!! $description !!}
                            </p>
                            </div>
                        </div>
                       @endif
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
