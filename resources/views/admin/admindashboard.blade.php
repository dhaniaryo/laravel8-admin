@extends('layouts.adminlayouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="facts-wrap">
                <h3 class="component-ttl component-ttl-ct"><span>Jumlah Penjualan Terkini</span></h3>
                <div class="row facts-list">
                    <div class="cf-xs-6 cf-sm-4 cf-md-4 cf-lg-3 col-xs-6 col-sm-4 col-lg-3 facts-i">
                        <p data-num="{{ $pengguna }}" class="facts-i-num">{{ $pengguna }}</p>
                        <h3 class="facts-i-ttl">User Aktif</h3>
                    </div>
                    <div class="cf-xs-6 cf-sm-4 cf-md-4 cf-lg-3 col-xs-6 col-sm-4 col-lg-3 facts-i">
                        <p data-num="{{ $semua }}" class="facts-i-num">{{ $semua }}</p>
                        <h3 class="facts-i-ttl">Semua Penjualan</h3>
                    </div>
                    <div class="cf-xs-6 cf-sm-4 cf-md-4 cf-lg-3 col-xs-6 col-sm-4 col-lg-3 facts-i">
                        <p data-num="{{ $jasa }}" class="facts-i-num">{{ $jasa }}</p>
                        <h3 class="facts-i-ttl">Semua Penjualan jasa</h3>
                    </div>
                    <div class="cf-xs-6 cf-sm-4 cf-md-4 cf-lg-3 col-xs-6 col-sm-4 col-lg-3 facts-i">
                        <p data-num="{{ $barang }}" class="facts-i-num">{{ $barang }}</p>
                        <h3 class="facts-i-ttl">Semua Penjualan Barang</h3>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection