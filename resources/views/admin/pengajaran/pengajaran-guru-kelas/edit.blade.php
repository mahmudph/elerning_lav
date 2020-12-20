<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.pengajaran-guru-kelas.update', $pengajaran->id)}}" id="form-edit" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama">Nama Pelajaran </label>
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value="{{ $pengajaran->id}}">
          <input type="text" class="form-control" placeholder="Nama pengajaran" id="nama_pelajaran" name="nama_pelajaran" value="{{ $pengajaran->nama_pelajaran }}">
        </div>
      </form>
    </div>
  </div>
</div>

