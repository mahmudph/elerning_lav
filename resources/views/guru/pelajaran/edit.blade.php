<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('guru.data_tugas.update', $tugas->id)}}" id="form-edit" method="POST">
        <div class="form-group">
            @csrf
            @method('PUT')
            <label for="nama">Nama Tugas</label>
            <input type="hidden" name="id" value="{{ $tugas->id}}">
            <input type="text" class="form-control" placeholder="Nama Tugas" id="nama" name="nama_tugas" value="{{ $tugas->nama_tugas }}">
        </div>
        <div class="form-group">
          <label for="soal">Soal</label>
            <textarea class="form-control"name="soal" cols="30" rows="10">{{ $tugas->soal}}</textarea>
        </div>
      </form>
    </div>
  </div>
</div>
