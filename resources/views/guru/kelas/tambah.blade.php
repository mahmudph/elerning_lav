<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.kelas.store')}}" id="form-tambah" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama_kelas">Nama Kelas </label>
          <input type="hidden" name="id" >
          <input type="text" class="form-control" placeholder="Nama kelas" id="nama_kelas" name="nama_kelas" >
        </div>
        <div class="form-group">
          <label for="jmlh_bangku">Jumlah Bangku</label>
          <input type="number" class="form-control" placeholder="Jumlah Bangku" id="jumlah_bangku" name="jumlah_bangku" >
        </div>
        <div class="form-group">
          <label for="jumlah_kursi">Jumlah Kursi</label>
          <input type="number" class="form-control" placeholder="Jumlah Kursi" id="jumlah_kursi" name="jumlah_kursi">
        </div>
      </form>
    </div>
  </div>
</div>
