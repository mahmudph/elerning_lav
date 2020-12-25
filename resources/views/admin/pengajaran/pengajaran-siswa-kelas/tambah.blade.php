<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.pengajaran-siswa-kelas.store')}}" id="form-tambah" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama">Nama Siswa</label>
          <input type="hidden" name="id_kelas" value="{{ $kelas->id }}">
          <select name="id_siswa" id="" class="form-control">
            @foreach ($siswas as $key => $siswa)
                <option value="{{ $key }}"> {{ $siswa }}</option>
            @endforeach
          </select>
        </div>
      </form>
    </div>
  </div>
</div>
