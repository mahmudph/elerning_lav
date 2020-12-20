@extends('layouts/app_siswa')

@section('title', $title ?? "")
@section('halaman', $halaman ?? "")

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
      </div>
      <div class="card-body">
           @isset($pelajarans)
                @foreach (array_chunk($pelajarans, 3) as $chuck)
                    <div class="row">
                        @foreach($chuck as  $pelajaran)
                            <div class="col-md-4">
                                <div class="card"  style="min-height: 170px; max-height:170px">
                                    <div class="card-header bg-success">
                                        <div class="float-left">
                                            <b>{{ Str::upper($pelajaran['nama_pelajaran']) ?? '' }}</b>
                                        </div>
                                        <div class="float-right">
                                            <small>{{ $pelajaran['nama_kelas'] ?? '' }}</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <small class="font-size:10px">{{ $pelajaran['deskripsi_pelajaran']}}</small>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-left" >
                                            <p style="font-size:12px">Nama Pengajar <b>{{ $pelajaran['nama_guru'] }}</b></p>
                                        </div>
                                        <div class="float-right">
                                            <a href="{{ route('siswa.data_tugas.detail',['id_kelas' => $pelajaran['id_kelas'], 'id_pengajaran' =>$pelajaran['id']])}}" class="btn btn-info btn-xs">Tugas</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
           @endisset
        </div>
    </div>
  </div>
@endsection

