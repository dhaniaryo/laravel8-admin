@extends('layouts.adminlayouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>Data Pengeluaran</h3>
            <br>
            <br>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pengeluaran</th>
                        <th scope="col">Status Pengeluaran</th>
                        <th scope="col">Foto Pengeluaran</th>
                        <th scope="col">Total Pengeluaran</th>
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
                                <a href="/ubahdatapengeluaran/{{$sm->id}}" class="btn btn-success" >Ubah</a>
                                <a href="/hapusdatapengeluaran/{{$sm->id}}" class="btn btn-danger" >Hapus</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            
        </div>
    </div>
@endsection