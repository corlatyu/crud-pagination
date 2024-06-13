@extends('layout.master')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Tiket</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Nama Wisata:</strong> {{ $ticket->nama_wisata }}</p>
                <p><strong>Harga Ticket:</strong> {{ $ticket->harga_ticket }}</p>
                <p><strong>Gambar:</strong></p>
                <img src="{{ asset($ticket->gambar) }}" width="300" alt="Gambar Tiket">
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('ticket.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endsection
