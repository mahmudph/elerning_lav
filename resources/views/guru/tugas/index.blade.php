@extends('layouts/app_guru')

@section('title', $title ?? "")
@section('halaman', $halaman ?? "")

@section('content')
  <div class="container">

    <div class="card">
      <div class="card-header">
          <div class="float-left">
          <small>Data Tugas Pelajaran <b> {{ $pelajaran->nama_pelajaran ?? ''}}</b></small>
          </div>
          <div class="float-right">
              <button class="btn btn-sm btn-info float-right ml-2" id="tambah" data-id="{{ $pelajaran->id }}" data-toggle='modal' data-target='#modalContent'>Tambah</button>
              <a href="{{ route('guru.data_pelajaran.show', $pelajaran->id ?? ""  )}}" class="btn btn-sm btn-danger float-right" id="tambah">Kembali</a>
          </div>
      </div>
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-hover table-striped w-100">
          <thead class="bg-primary-600">
            <tr>
              <th width="1px">No</th>
              <th>Nama Tugas</th>
              <th>Lihat Soal Tugas</th>
              <th>Tanggal Tugas</th>
              <th>Detail</th>
              <th width="50px">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection
@push('javascript')
    @include('guru.tugas.ajax')
    @include('guru.tugas.datatables')
@endpush

