<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('guru.data_mengerjakan.store', $pengerjaan->id)}}" id="form-tambah" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama">Nilai</label>
          <input type="hidden" name="id_pengerjaan_tugas" value="{{ $pengerjaan->id}}">
        <input type="text" class="form-control" placeholder="Nilai" id="nama" name="nilai" value="{{ $pengerjaan->tugas_nilai->nilai }}">
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea type="text" class="form-control" name="keterangan" placeholder="Keterangan">{{ $pengerjaan->tugas_nilai->keterangan}}</textarea>
        </div>
      </form>
    </div>
  </div>
</div>
