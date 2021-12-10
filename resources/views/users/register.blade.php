@extends('layouts.user')
@section('content')
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12 contact-para">
                    <div class="logo-para contact">
                        <p>Florist adalah sistem informasi yang bertujuan untuk membantu <br>
                            penjual bunga khususnya di wilayah Kota Malang.
                            Tersedia banyak pilihan bunga dari beberapa penjual buket bunga. <br>
                            Pada Sistem Informasi ini, pembeli juga dapat melakukan
                            pencarian berdasarkan filter yang tersedia.
                        </p>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12 form-ct">
                    <div class="form-v4 contact">
                        <form method="post" class="form-customer form-login" action="{{ route('storeRegister') }}">
                            @csrf
                            <div class="form-group ">
                                <input type="text" class="form-control form-account" placeholder="Name*" name="name">
                            </div>
                            <div class="form-group ">
                                <input type="email" class="form-control form-account"  placeholder="Email address*" name="email">
                            </div>
                            <div class="form-group ">
                                <input type="password" class="form-control form-account" placeholder="Your Messenger*" name="password">
                            </div>


                            <div class="btn-button-group mg-top-30 mg-bottom-15 bt-contact">
                                <button type="submit" class="zoa-btn btn-login hover-white contact">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
