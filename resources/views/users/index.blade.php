@extends('layouts.user')
@section('content')
<div class="sec-home2">
    <div class="container">
        <div class="single-product-tab bd-bottom">
            <ul class="tabs text-center">
                <li class="active"><a class="st-tabs" data-toggle="pill" href="#feat">Newest</a></li>
            </ul>
            <a class="view-home2" href="{{route('user.products')}}">view all products <i class="fa fa-angle-right"></i></a>
            <div class="tab-content">
                <div class="border-tabs-home2"></div>
                <div id="feat" class="tab-pane fade in active ">
                    <div class="row">
                        @foreach($items as $item)
                        <div class="col-md-2 col-sm-2 col-xs-12 images-hp2">
                            <div class="product-item pro-v1 home1 home3-mgbt bottom-home2 ">
                                <div class="product-img">
                                    <a href="{{route('user.detailProduct')}}">
                                        @foreach($item->photo as $key => $media)
                                            <img src="{{ $media->getUrl() }}" alt="" class="img-responsive">
                                        @endforeach
                                    </a>
                                    <div class="sale-img shop1 shop2">
                                        <div class="before shop1 v2"></div>
                                    </div>
                                    <div class="ribbon zoa-hot shop-v1"><span>{{$item->category->name}}</span></div>
                                    <div class="product-button-group product-details">
                                        <a href="#" class="zoa-btn zoa-quickview">
                                            <span class="fa fa-shopping-bag"></span>
                                        </a>
                                        <a href="#" class="zoa-btn zoa-wishlist">
                                            <span class="fa fa-whatsapp"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="sale-para2 shop-1 pro-v1">
                                    <p><a href="#">{{$item->name}}</a></p>
                                    <ul>
                                        @for($i=0; $i < $item->rating; $i++)
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                @endfor
                                                <br>
                                            <li><a class="sales-36" href="#">Rp {{$item->price}}</a>
                                            </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
