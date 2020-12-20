<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h6>Apa anda yakin untuk menghapus <b>{{ ucfirst($guru->nama_guru) }}</b> dari daftar guru.?</h6>
      <form action="{{ route('admin.guru.destroy', $guru->id)}}" id="form-delete"  method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="{{ $guru->id}}">  
      </form>
    </div>
  </div>
</div>
