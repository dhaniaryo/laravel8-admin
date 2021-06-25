@extends('layouts.userlayouts')

@section('judul')
    Selamat Berbelanja
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <h3>Semua Menu</h3>
            <br>
            <br>


            <div class="prod-items section-items">
                @foreach ($semuajual as $sm)
                    <div class="prod-i">
                        <div class="prod-i-top">
                            <a href="#" class="prod-i-img">
                                <!-- NO SPACE --><img src="{{ asset('data_file/' . $sm->foto_jual) }}"
                                    alt="Adipisci aperiam commodi"><!-- NO SPACE -->
                            </a>

                            <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>

                            <div class="prod-i-properties">
                                <dl>
                                    {{ $sm->kategori_jual }}
                                </dl>
                            </div>
                        </div>
                        <h3>
                            <a href="#">{{ $sm->foto_jual }}</a>
                        </h3>
                        <p class="prod-i-price">
                            <b>Rp {{ $sm->harga_jual }}</b>
                        </p>
                    </div>




                @endforeach
            </div>



        </div>
    </div>
@endsection
