@extends('layout.master')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Mahasiswa</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Nama:</strong> {{ $mahasiswas->nama }}</p>
                <p><strong>NBI:</strong> {{ $mahasiswas->nbi }}</p>
            
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endsection
