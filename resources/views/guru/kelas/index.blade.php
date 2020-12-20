@extends('layouts/app_guru')

@section('title', $title ?? "")
@section('halaman', $halaman ?? "")

@section('content')
  <div class="container">

    <div class="card">
      <div class="card-header">
        <div class="float-left">
            <small>Daftar Kelas Pembelajaran </small>
        </div>
      </div>
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-hover table-striped w-100">
          <thead class="bg-primary-600">
            <tr>
              <th width="10px">No</th>
              <th>Nama Kelas</th>
              <th width="200px">Detail</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection
@push('javascript')
    @include('guru.kelas.ajax')
    @include('guru.kelas.datatables')
@endpush

