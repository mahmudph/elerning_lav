@extends('layouts/app_guru')

@section('title', $title ?? "")
@section('halaman', $halaman ?? "")

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
          <div class="float-left">
              <small>
              Daftar Siswa <b>{{ $kelas->nama_kelas ?? ""}}</b>
              </small>
          </div>
          <div class="float-right">
              <a href="{{ route('guru.data_kelas.index') }}" class="btn btn-sm btn-danger float-lg-right" >Kembali</a>
          </div>
      </div>
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-hover table-striped w-100">
          <thead class="bg-primary-600">
            <tr>
              <th width="5px">No</th>
              <th>Nama</th>
              <th>Nis</th>
              <th>Gender</th>
              <th>Nomer Hp</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection
@push('javascript')
    @include('guru.siswa.ajax')
    @include('guru.siswa.datatables')

    <script>
      $(document).ready(function() {
        getDataTablesSiswa(`{{ route('guru.data_siswa.data', $id_kelas) }}`);
      })
    </script>
@endpush

