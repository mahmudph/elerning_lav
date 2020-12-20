@extends('layouts/app_guru')

@section('title', $title ?? "")
@section('halaman', $halaman ?? "")

@section('content')
  <div class="container">

    <div class="card">
      <div class="card-header">
          <div class="float-left" >
              <p class="pt-2">
                <small>Kelas <b>{{ ucfirst(($kelas->nama_kelas ?? "") ) ?? ""}}</b> <br>
                    Daftar Siswa Yang Mengerjakan Tugas <b>{{ ucfirst(($tugas->nama_tugas ?? "")) ?? ''}}</b>
                </small>
              </p>
          </div>
          <div class="float-right mt-3">
              <a href="{{ route('guru.data_tugas.show', $kelas->id ?? "")}}" class="btn btn-sm btn-danger float-right" id="tambah">Kembali</a>
          </div>
      </div>
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-hover table-striped w-100">
          <thead class="bg-primary-600">
            <tr>
              <th width="50px">No</th>
              <th>Nama Pelajaran</th>
              <th>Nama Siswa</th>
              <th>Tanggal Pengumpulan</th>
              <th>Lihat Jawabah</th>
              <th>Nilai</th>
              <th>Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection
@push('javascript')
    @include('guru.mengerjakan.ajax')
    @include('guru.mengerjakan.datatables')
@endpush

