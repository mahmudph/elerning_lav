@extends('layouts/app_guru')

@section('title', $title ?? "")
@section('halaman', $halaman ?? "")

@section('content')
  <div class="container">

    <div class="card">
      <div class="card-header">
          <div class="float-left">
              <small>
              Data Pelajaran kelas <b>{{ $kelas->nama_kelas }}</b>
              </small>
          </div>
          <div class="float-right">
              <a href="{{ route('guru.data_kelas.index')}}" class="btn btn-sm btn-danger float-right" id="tambah">Kembali</a>
          </div>
      </div>
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-hover table-striped w-100">
          <thead class="bg-primary-600">
            <tr>
              <th width="1px">No</th>
              <th>Nama Pelajaran</th>
              <th>Detail</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection
@push('javascript')
    @include('guru.pelajaran.ajax')
    @include('guru.pelajaran.datatables')
@endpush

