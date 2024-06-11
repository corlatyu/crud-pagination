@extends('layout.master')

@section('content')

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Data Wisata</h6>
     </div>
     <div class="card-body">
        <div class="d-flex justify-content-right mb-3">
            <a href="{{ route('ticket.create') }}" class="btn btn-primary">Tambah</a>
        </div>
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>Nama Wisata</th>
                         <th>Harga Ticket</th>
                         <th>Gambar</th>
                         <th>Actions</th>
                     </tr>
                 </thead>
                 <tbody>
                 @foreach ($tickets as $key => $item)
                     <tr>
                         <td>{{ $tickets->firstItem()+ $key }}</td>
                         <td>{{ $item->nama_wisata }}</td>
                         <td>{{ $item->harga_ticket }}</td>
                         <td><img src="{{ asset($item->gambar) }}" width="100"></td>
                         <td>
                             <a href="{{ route('ticket.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                             <form action="{{ route('ticket.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tiket ini?');">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                             </form>
                         </td>
                     </tr>
                     @endforeach
                 </tbody>
             </table>
             <div>
                Showing
                {{ $tickets->firstItem() }}
                to
                {{ $tickets->lastItem() }}
                of
                {{ $tickets->total() }}
            </div>
            <div class="d-flex justify-content-end">
                {{ $tickets->links() }}
            </div>
         </div>
     </div>
 </div>
@endsection
