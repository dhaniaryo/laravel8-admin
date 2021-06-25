@extends('layouts.adminlayouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>Data Jual Barang</h3>
            <br>
            <br>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Status Barang</th>
                        <th scope="col">Foto Barang</th>
                        <th scope="col">Harga Barang</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semua as $sm)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $sm->nama_jual }}</td>
                            <td>{{ $sm->status_jual }}</td>
                            <td><img width="100px" src="{{ asset('data_file/'.$sm->foto_jual) }}"></td>
                            <td>{{ $sm->harga_jual }}</td>
                            <td>
                                <a href="/ubahdatajual/{{$sm->id}}" class="btn btn-success" >Ubah</a>
                                <a href="/hapusdatajual/{{$sm->id}}" class="btn btn-danger" >Hapus</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            
        </div>
    </div>
@endsection