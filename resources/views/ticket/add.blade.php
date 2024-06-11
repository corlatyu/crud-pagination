@extends('layout.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Wisata</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('ticket.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_wisata">Nama Wisata:</label>
                    <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" required>
                </div>
                <div class="form-group">
                    <label for="harga_ticket">Harga Ticket:</label>
                    <input type="text" class="form-control" id="harga_ticket" name="harga_ticket" required>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar:</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection
