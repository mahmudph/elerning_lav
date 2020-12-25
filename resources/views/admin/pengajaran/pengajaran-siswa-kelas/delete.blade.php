<div class="container">
  <div class="row">
    <div class="col-md-12">
      <p>Apa anda yakin untuk menghapus siswa <b>{{ ucfirst($siswa_kelas->siswa->nama_siswa ) }}</b> dari daftar kelas.?</p>
      <form action="{{ route('admin.pengajaran-siswa-kelas.destroy', $siswa_kelas->id)}}" id="form-delete"  method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="{{ $siswa_kelas->id}}">
      </form>
    </div>
  </div>
</div>
