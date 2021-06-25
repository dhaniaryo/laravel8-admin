@extends('layouts.adminlayouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>Data User</h3>
            <br>
            <br>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengguna as $pn)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $pn->name }}</td>
                            <td>{{ $pn->email }}</td>
                            <td>
                                <a href="/ubahdatapengguna/{{ $pn->id }}" class="btn btn-success">Ubah</a>
                                <a href="/hapusdatapengguna/{{ $pn->id }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>
@endsection
