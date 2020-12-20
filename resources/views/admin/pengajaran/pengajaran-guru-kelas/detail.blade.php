@extends('layouts/app_admin')

@section('title', $title ?? "")
@section('halaman', $halaman ?? "")

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="float-left p-1 p-sm-1">
        <h6>Guru Pengajar Kelas <b>{{ $kelas->nama_kelas ?? ""}}</b></h6>
        </div>
        <div class="float-right">
          {{-- <button class="btn btn-sm btn-info float-right ml-1" id="tambah" data-toggle='modal' data-target='#modalContent'>Tambah</button> --}}
          <a href="{{ url()->previous() }}" class="btn btn-sm btn-danger float-right" >kembali</a>
        </div>
      </div>
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-hover table-striped w-100">
          <thead class="bg-primary-600">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Nip</th>
              <th>Gender</th>
              <th>Nomer Hp</th>
              {{-- <th width="50px">Action</th> --}}
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('javascript')
    @include('admin.pengajaran.pengajaran-guru-kelas.ajax')
    @include('admin.guru.datatables')
    <script>
      $(document).ready(function() {
        getDataTablesGuru('{{ route("admin.guru.data")."?id_kelas=".$id}}');
      })
    </script>
@endpush