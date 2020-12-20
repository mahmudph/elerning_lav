<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h6>Apa anda yakin untuk menghapus <b>{{ ucfirst($pelajaran->nama_pelajaran) }}</b> dari daftar pelajaran.?</h6>
      <form action="{{ route('admin.pelajaran.destroy', $pelajaran->id)}}" id="form-delete"  method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="{{ $pelajaran->id}}">  
      </form>
    </div>
  </div>
</div>
