<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.pelajaran.update', $pelajaran->id)}}" id="form-edit" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama">Nama Pelajaran </label>
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value="{{ $pelajaran->id}}">
          <input type="text" class="form-control" placeholder="Nama pelajaran" id="nama_pelajaran" name="nama_pelajaran" value="{{ $pelajaran->nama_pelajaran }}">
        </div>
        <div class="form-group">
            <label for="nama">Deskripsi Pelajaran </label>
            <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control">{{$pelajaran->deskripsi}}</textarea>
        </div>
      </form>
    </div>
  </div>
</div>
