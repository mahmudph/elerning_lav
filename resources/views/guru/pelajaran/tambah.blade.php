<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('guru.data_tugas.store')}}" id="form-tambah" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama">Nama Tugas</label>
          <input type="text" class="form-control" placeholder="Nama Tugas" id="nama" name="nama_tugas">
        </div>
        <div class="form-group">
          <label for="soal">Soal</label>
            <textarea name="soal" class="form-control" cols="30" rows="10">
            </textarea>
        </div>
      </form>
    </div>
  </div>
</div>
