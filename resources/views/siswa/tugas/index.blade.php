@extends('layouts/app_siswa')

@section('title', $title ?? "")
@section('halaman', $halaman ?? "")

@section('content')
  <div class="container">

    <div class="card">
      <div class="card-header">
          <div class="float-left">
          <small>Data Tugas Pelajaran <b> {{ $pelajaran->pelajaran[0]->nama_pelajaran ?? ''}}</b></small>
          </div>
          <div class="float-right">
              <a href="{{ route('siswa.home')}}" class="btn btn-sm btn-danger float-right" id="tambah">Kembali</a>
          </div>
      </div>
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-hover table-striped w-100">
          <thead class="bg-primary-600">
            <tr>
              <th width="1px">No</th>
              <th>Nama Tugas</th>
              <th>Tanggal Tugas</th>
              <th>Tanggal dikerjakan</th>
              <th>Nilai</th>
              <th>Keterangan</th>
              <th width="50px">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection
@push('javascript')
    @include('siswa.tugas.ajax')
    @include('siswa.tugas.datatables')
@endpush

