<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('guru.kelas.update', $kelas->id)}}" id="form-edit" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama">Nama Kelas </label>
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value={{$kelas->id}}>
        <input type="text" class="form-control" placeholder="Nama kelas" id="nama" name="nama_kelas" value="{{ $kelas->nama_kelas}}">
        </div>
        <div class="form-group">
          <label for="jmlh_bangku">Jumlah Bangku</label>
          <input type="number" class="form-control" placeholder="Jumlah Bangku" id="jmlh_bangku" name="jumlah_bangku" value="{{ $kelas->jumlah_bangku}}">
        </div>
        <div class="form-group">
          <label for="jumlah_kursi">Jumlah Kursi</label>
          <input type="number" class="form-control" placeholder="Jumlah Kursi" id="jmlh_kursi" name="jumlah_kursi" value="{{ $kelas->jumlah_kursi}}">
        </div>
      </form>
    </div>
  </div>
</div>
