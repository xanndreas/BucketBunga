@extends('layouts.user')
@section('content')
    <section>
        <div class="about">
            <img src="{{asset('assets/images/bgr-about.jpg')}}" alt="">
            <div class="container">
                <div class="para-about">
                    <h4>Florist</h4>
                    <p>Florist adalah sistem informasi yang bertujuan untuk membantu penjual bunga khususnya di wilayah Kota Malang.
                    Tersedia banyak pilihan bunga dari beberapa penjual buket bunga. Pada Sistem Informasi ini, pembeli juga dapat melakukan
                    pencarian berdasarkan filter yang tersedia.</p>
                </div>
            </div>
        </div>
        <div class="our">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 about-us">
                        <div class="mission">
                            <h4>Our Mission</h4>
                            <p>This lovely green striped dress with ruffles over the shoulders is by French design
                                Tartine et Chocolat. Made in soft, fine cotton, it has beautifully embroidered
                                dragonflies and sequinned flowers, and there are mother-of-pearl logo button
                                fasteners on the back. Marco Campomaggi thinks</p>
                        </div>
                        <div class="service">
                            <h4>Our Service</h4>
                            <ul>
                                <li><a href=""><i class="fa fa-circle" aria-hidden="true"></i>Design</a></li>
                                <li><a href=""><i class="fa fa-circle" aria-hidden="true"></i>Sale</a></li>
                                <li><a href=""><i class="fa fa-circle" aria-hidden="true"></i>Stylist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
