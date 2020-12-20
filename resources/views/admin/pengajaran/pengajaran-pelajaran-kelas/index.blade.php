@extends('layouts/app_admin')

@section('title', $title ?? "")
@section('halaman', $halaman ?? "")

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
      </div>
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-hover table-striped w-100">
          <thead class="bg-primary-600">
            <tr>
              <th width="10px">No</th>
              <th>Nama Kelas</th>
              <th width="100px">Detail Pelajaran</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection
@push('javascript')
    @include('admin.pengajaran.pengajaran-pelajaran-kelas.ajax')
    @include('admin.pengajaran.pengajaran-pelajaran-kelas.datatables')
@endpush

