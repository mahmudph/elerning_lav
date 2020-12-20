<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h6>Apa anda yakin untuk menghapus <b>{{ ucfirst($siswa->nama_siswa) }}</b> dari daftar siswa.?</h6>
      <form action="{{ route('admin.siswa.destroy', $siswa->id)}}" id="form-delete"  method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="{{ $siswa->id}}">  
      </form>
    </div>
  </div>
</div>
