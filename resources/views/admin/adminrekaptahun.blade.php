@extends('layouts.adminlayouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>Rekap Penjualan dan Pengeluaran Tahun Ini</h3>
            
<br>
<br>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Penjualan</th>
                        <th scope="col">Foto Penjualan</th>
                        <th scope="col">Harga Penjualan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semua as $sm)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $sm->nama_jual }}</td>
                            <td><img width="100px" src="{{ asset('data_file/'.$sm->foto_jual) }}"></td>
                            <td>{{ $sm->harga_jual }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection