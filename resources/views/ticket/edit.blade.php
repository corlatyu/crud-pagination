@extends('layout.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
        </div>
        <div class="card-body">
                    <form action="{{ route('ticket.update', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_wisata">Nama Wisata:</label>
                            <input type="text" id="nama_wisata" name="nama_wisata" value="{{ $ticket->nama_wisata }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_ticket">Harga Ticket:</label>
                            <input type="text" id="harga_ticket" name="harga_ticket" value="{{ $ticket->harga_ticket }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar:</label>
                            <input type="file" id="gambar" name="gambar" class="form-control-file">
                            @if ($ticket->gambar)
                                <img src="{{ asset($ticket->gambar) }}" width="100" class="mt-2">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
    </div>
</div>
@endsection
