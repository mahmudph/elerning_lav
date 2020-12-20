<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h6>Apa anda yakin untuk menghapus <b>item ini.?</h6>
      <form action="{{ route('admin.new-pengajaran.destroy', $pengajaran->id)}}" id="form-delete"  method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="{{ $pengajaran->id}}">
      </form>
    </div>
  </div>
</div>
