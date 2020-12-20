<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h6>Apa anda yakin untuk menghapus <b>{{ ucfirst($tugas->nama_tugas) }}</b> dari daftar Tugas Kelas.?</h6>
      <form action="{{ route('guru.data_tugas.destroy', $tugas->id)}}" id="form-delete"  method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="{{ $tugas->id}}">
      </form>
    </div>
  </div>
</div>
