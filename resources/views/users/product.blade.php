@extends('layouts.user')
@section('content')
    <section>
        <div class="wrappage">
            <div class="shop-page">
                <div class="container">
                    <div class="row shop">
                        <div class="col-md-8 col-sm-6 col-xs-12 shoppage1">
                            <div class="we-found">
                                <h4>We found <strong>{{count($items)}}</strong> products available for you</h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 shoppage1">
                            <div class="wrappage">
                                <!-- Filters -->
                                <div class="dropdown drop-filter">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                        <span class="caret"></span><img class="img-filter" src="{{asset('assets/images/icon7.png')}}" alt="">Filters</button>
                                    <div class=" dropdown-menu filter-shoppage filter-shoppage-2">
                                        <div class="container container-filter">
                                            <div class="row">
                                                <div class="col-md-3 widget-filter filter-cate no-pd-top">
                                                    <h4>Sort by</h4>
                                                    <ul>
                                                        @foreach($categories as $item)
                                                            <li><a href="{{route('user.filter',['id' => $item->id, 'type' => 'category'])}}">{{$item->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 widget-filter filter-cate filter-size">
                                                    <h4>Special For</h4>
                                                    <ul>
                                                        @foreach($specialFor as $item)
                                                            <li><a href="{{route('user.filter',['id' => $item->id, 'type' => 'specialFor'])}}">{{$item->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 widget-filter filter-cate filter-size">
                                                    <h4>Color</h4>
                                                    <ul class="color2">
                                                        @foreach($colors as $item)
                                                            <li><a href="{{route('user.filter',['id' => $item->id, 'type' => 'color'])}}"><div style="width: 20px; height: 20px; border-radius: 50%;background-color: {{$item->hex}}"></div></a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 widget-filter filter-cate filter-size">
                                                    <h4>Location</h4>
                                                    <div class="ul-1 shop3">
                                                        <ul>
                                                            @foreach($locations as $item)
                                                                <li><a href="{{route('user.filter',['id' => $item->id, 'type' => 'location'])}}">{{$item->district}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrappage">
                                        <div class="filter-collection-left hidden-lg hidden-md">
                                            <a class="btn"><i class="zoa-icon-filter"><img src="{{asset('assets/images/icon7.png')}}" alt=""></i> Filter</a>
                                        </div>
                                        <div class="col-xs-12 hidden-md hidden-lg col-left collection-sidebar" id="filter-sidebar">
                                            <div class="close-sidebar-collection hidden-lg hidden-md">
                                                <span>Filter</span><i class="icon_close ion-close"></i>
                                            </div>
                                            <div class="widget-filter filter-cate no-pd-top">
                                                <h4>Sort by</h4>
                                                <ul>
                                                    @foreach($categories as $item)
                                                        <li><a href="{{route('user.filter',['id' => $item->id, 'type' => 'category'])}}">{{$item->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="widget-filter filter-cate filter-size">
                                                <h4>Special For</h4>
                                                <ul>
                                                    @foreach($specialFor as $item)
                                                        <li><a href="{{route('user.filter',['id' => $item->id, 'type' => 'specialFor'])}}">{{$item->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="widget-filter filter-cate filter-size">
                                                <h4>Color</h4>
                                                <ul class="color2">
                                                    @foreach($colors as $item)
                                                    <li><a href="{{route('user.filter',['id' => $item->id, 'type' => 'color'])}}"><div style="width: 20px; height: 20px; border-radius: 50%;background-color: {{$item->hex}}"></div></a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="widget-filter filter-cate filter-size">
                                                <h4>Location</h4>
                                                <div class="ul-1 shop3">
                                                    <ul>
                                                        @foreach($locations as $item)
                                                            <li><a href="{{route('user.filter',['id' => $item->id, 'type' => 'location'])}}">{{$item->district}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <a class="zoa-btn btn-filter">
                                                Filter
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border shopv1"></div>
                </div>
            </div>
            <!-- Products -->
            <div class="list">
                <div class="container">
                    <div class="row">
                        <div class="list-products st-bottom">
                            @foreach($items as $item)
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12  product-item shopv2">
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
                            @endforeach
                        </div>
                        <div class="border"></div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
