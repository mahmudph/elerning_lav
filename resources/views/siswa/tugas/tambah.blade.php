<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('siswa.data_tugas.store')}}" id="form-tambah" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama">Soal</label>
            <input type="hidden" name="id_siswa_tugas" value={{ $pengerjaan->id }}>
            <input type="hidden" name="id_guru_mengajar" value={{ $pengerjaan->id_guru_mengajar }}>
            <input type="hidden" name="id_tugas" value={{ $pengerjaan->tugas->id }}>
            <textarea name="" id="" cols="30" rows="3" class="form-control" disabled>{{$pengerjaan->tugas->soal}}</textarea>
        </div>
        <div class="form-group">
          <label for="soal">Jawaban</label>
            <textarea name="jawaban" class="form-control" cols="30" rows="5"></textarea>
        </div>
      </form>
    </div>
  </div>
</div>
