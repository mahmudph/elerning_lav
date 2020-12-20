<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h6>Apa anda yakin untuk menghapus <b>{{ ucfirst($kelas->nama_kelas) }}</b> dari daftar kelas.?</h6>
      <form action="{{ route('admin.kelas.destroy', $kelas->id)}}" id="form-delete"  method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="{{ $kelas->id}}">  
      </form>
    </div>
  </div>
</div>
