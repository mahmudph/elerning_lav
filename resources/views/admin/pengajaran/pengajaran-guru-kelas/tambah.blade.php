<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.pengajaran-guru-kelas.store')}}" id="form-tambah" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama">Nama pengajaran</label>
          <input type="text" class="form-control" placeholder="Nama pengajaran" id="nama_pengajaran" name="nama_pengajaran">
        </div>
      </form>
    </div>
  </div>
</div>
