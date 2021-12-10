@extends('layouts.user')
@section('content')
    <section>
        <div class="product-v1 pro-v4">
            <div class="container">
                <div class="menu-prv1">
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">/</a></li>
                        <li><a href="">Shop Products</a></li>
                        <li><a href="">/</a></li>
                        <li><a href="">{{$item->name}}</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 pro-v4">
                        <div class="product-img-slide pro-v4">
                            <div class="product-images quickview">
                                <div class="main-img js-product-slider-normal">
                                    @foreach($item->photo as $key => $media)
                                        <a href="#" class="hover-images effect"><img src="{{ $media->getUrl() }}" alt="photo" class="img-responsive"></a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="multiple-img-list js-click-product-normal">
                                @foreach($item->photo as $key => $media)
                                    <div class="product-col">
                                        <div class="img pro-v4 ">
                                            <img src="{{ $media->getUrl() }}" alt="photo" class="img-responsive">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="product-info s8 pro-v1 pro-v4">
                            <div class="sale-para2 shop-1 pro-v1 shop-5 shop-6 shop-7 shop-8 pro-v1">
                                <p><a href="#">{{$item->name}}</a></p>
                                <ul>
                                    @for($i=0; $i < $item->rating; $i++)
                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    @endfor
                                    <li><a class="sales-36" href="#">Rp {{$item->price}}</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="short-desc">
                                <p class="product-desc s8 pro-v1 pro-v4">{{$item->description}}</p>
                            </div>
                            <div class="color pr1 pro-v4">
                                <h4>Color</h4>
                                <ul>
                                    @foreach($item->colors as $key => $color)
                                        <li><a href="#"><div style="width: 20px; height: 20px; border-radius: 50%;background-color: {{$color->hex}}"></div></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="color pr1 pro-v4">
                                <h4>Special For</h4>
                                <ul>
                                    @foreach($item->special_fors as $key => $special_for)
                                        <li><a href="">{{$special_for->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="size shop5 pro-1 pro-v4">
                                <h4>Location</h4>
                                <ul>
                                    <li><a href="">{{$item->location->district}}</a></li>
                                </ul>
                            </div>
                            <div class="zoa-qtt pro-v1">
                                <button type="button" class="quantity-left-minus btn btn-number js-minus" data-type="minus" data-field="">
                                </button>
                                <input type="text" name="number" value="1" class="product_quantity_number js-number">
                                <button type="button" class="quantity-right-plus btn btn-number js-plus" data-type="plus" data-field="">
                                </button>
                            </div>
                            <div class="product-bottom-group shop7 s8 pro-v1 pro-v2">
                                <a href="#" class="fa fa-shopping-bag shop7 pro-v1">
                                    <span class="zoa-icon-quick-view shop7"></span>
                                </a> <a href="#" class="fa fa-balance-scale shop7 pro-v1">
                                    <span class="zoa-icon-heart shop7"></span>
                                </a>
                                <a href="#" class="fa fa-heart shop7">
                                    <span class="zoa-icon-cart shop7"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- details -->
    </section>
@endsection
