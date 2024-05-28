@extends('frontEnd.layouts.masters')

@section('content')
    
    <!-- SLIDER AREA START (slider-3) -->
    @include('frontEnd.Inc.slider')
    <!-- SLIDER AREA END -->

    <div class="ltn__product-tab-area ltn__product-gutter pt-85 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title">Our Products</h1>
                    </div>
                    <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center">
                        <div class="nav">

                            @foreach ($categories as $category)
                                <a class="{{ $loop->index == 0 ? 'active show' : '' }}" data-bs-toggle="tab"
                                    href="#categoryTab-{{ $category->id }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    @foreach ($categories as $category)
                    <div class="tab-pane fade {{ $loop->index == 0 ? 'active show' : '' }}" id="categoryTab-{{ $category->id }}">
                        {{-- {{ dd($category->products) }} --}}
                        <div class="ltn__product-tab-content-inner">
                            <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                <!-- ltn__product-item -->
                                @foreach ( $category->products as $products)

                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="{{ asset( $products->image ? Storage::url($products->image) : 'assets/asset/img/No Product Image.png' )}}" alt="#" style="height: 180px"></a>

                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a onclick="quickProductView({{ $products->id }})"  href="#" title="Quick View">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li class="product-item">
                                                        <a title="Add to Cart" class="add-to-cart-btn" data-product="{{ $products }}">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="product-details.html">{{ $products->name }}</a>
                                            </h2>
                                            <div class="product-price">
                                                <span>{{ $products->price}}.TK</span>
                                            </div>

                                            <div class="product-stock">
                                               <strong class="text-danger ps-2">In stock:</strong> <span>{{ $products->stock_quantity}} </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('js_file')

    <script>
        function quickProductView(productId){
            // event.preventDefault();
            // console.log(productId);

            $.ajax({

                "url" : "{{ url('product_modal') }}/" + productId,
                "method" : "POST",
                "datatype" : "json",
                "data" : {
                    "_token" : '{{ csrf_token() }}'
                },
                success: function(response){ 
                    // console.log(response);
                    $('#load_modal').html(response.html);
                    $('#quick_view_modal').modal('show');
                },
                error: function(error){
                    console.log(error)
                }


            });
        }
    </script>
    
@endpush
