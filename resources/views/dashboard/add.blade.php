@extends('layout.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Mahasiswa</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama :</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nbi">NBI :</label>
                    <input type="text" id="nbi" name="nbi" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection
