@extends('layout.master')

@section('content')


 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah</a>
            <form action="{{ route('mahasiswa.index') }}" method="GET" class="form-inline">
            <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search" value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-success">Search</button>
        </form>
       </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                     <tr>
                         <th>No</th>
                         <th>Nama</th>
                         <th>NBI</th>
                         <th>Actions</th>
                 </thead>
                 <tbody>
                     @foreach ($mahasiswas as $key => $item)
                     <tr>
                         <td>{{ $mahasiswas->firstItem()+ $key }}</td>
                         <td>{{ $item->nama }}</td>
                         <td>{{ $item->nbi }}</td>
                         <td>
                            <a href="{{ route('mahasiswa.show', $item->id) }}" class="btn btn-info btn-sm">Show</a>
                             <a href="{{ route('mahasiswa.edit', $item->id) }}"class="btn btn-primary btn-sm">Edit</a>
                             <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST"  style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?');">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                             </form>
                         </td>
                     </tr>
                 @endforeach
                 <!-- Tampilkan pagination links -->

                 </tbody>
             </table>
             <div>
                Showing
                {{ $mahasiswas->firstItem() }}
                to
                {{ $mahasiswas->lastItem() }}
                of
                {{ $mahasiswas->total() }}
            </div>
            <div class="d-flex justify-content-end">
                {{ $mahasiswas->links() }}
            </div>
        </div>
     </div>
 </div>

@endsection

