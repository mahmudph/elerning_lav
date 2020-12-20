<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.pelajaran.store')}}" id="form-tambah" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama">Nama Pelajaran</label>
          <input type="text" class="form-control" placeholder="Nama pelajaran" id="nama_pelajaran" name="nama_pelajaran">
        </div>
          <div class="form-group">
            <label for="nama">Deskripsi Pelajaran </label>
            <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
      </form>
    </div>
  </div>
</div>
