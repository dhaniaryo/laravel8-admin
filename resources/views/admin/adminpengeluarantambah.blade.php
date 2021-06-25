@extends('layouts.adminlayouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>Tambah Data Jual Barang</h3>
            <br>
            <br>
            <div class="card-body">
                <form method="POST" action="/tambahdatapengeluaran/proses" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="nama_jual" class="col-md-4 col-form-label text-md-right">{{__('Nama Pengeluaran')}}</label>
                        <div class="col-md-6">
                            <input id="nama_jual" type="text" class="form-control @error('nama_jual') is-invalid @enderror" name="nama_jual" value="{{ old('nama_jual') }}" required autocomplete="nama_jual" autofocus>
                            @error('nama_jual')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="created_by" class="col-md-4 col-form-label text-md-right">{{__('Pembuat Pengeluaran')}}</label>
                        <div class="col-md-6">
                            <input id="created_by" type="text" class="form-control @error('created_by') is-invalid @enderror" name="created_by" value="{{ old('created_by') }}" required autocomplete="created_by" autofocus>
                            @error('created_by')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kategori_jual" class="col-md-4 col-form-label text-md-right">{{ __('Kategori Pengeluaran') }}</label>
                        <div class="col-md-6">
                        <select name="kategori_jual" id="kategori_jual" class="col-md-6 form-control">
                            <option value="Barang">Barang</option>
                            <option value="Jasa">Jasa</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status_jual" class="col-md-4 col-form-label text-md-right">{{ __('Status Pengeluaran') }}</label>
                        <div class="col-md-6">
                        <select name="status_jual" id="status_jual" class="col-md-6 form-control">
                            <option value="Keluar">Keluar</option>
                            <option value="Masuk">Masuk</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{ __('Foto Pengeluaran') }}</label>
                        <div class="col-md-6">
                        <input type="file" name="file" id="file">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_jual" class="col-md-4 col-form-label text-md-right">{{ __('Total Pengeluaran') }}</label>
    
                        <div class="col-md-6">
                            <input id="harga_jual" type="text" class="form-control @error('harga_jual') is-invalid @enderror" name="harga_jual" value="{{ old('harga_jual') }}" required autocomplete="harga_jual" autofocus>
    
                            @error('harga_jual')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="/datapengeluaransemua" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Tambah') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection