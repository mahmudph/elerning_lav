<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.new-pengajaran.store')}}" id="form-tambah" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama">Nama Pelajaran </label>
          <div class="firm-group">
              <select name="id_pelajaran" id="id_pelajaran" class="form-control">
                  <option value="">Pilih Pelajaran</option>
                  @foreach ($pelajarans as $key => $pelajaran)
                    <option value="{{ $key }}">{{ $pelajaran }}</option>
                  @endforeach
              </select>
          </div>
          <div class="firm-group">
              <label for="nama">Nama Guru </label>
              <select name="id_guru" id="id_guru" class="form-control">
                  <option value="">Pilih Guru</option>
                  @foreach ($gurus as $key => $guru)
                    <option value="{{ $key }}" >{{ $guru }}</option>
                  @endforeach
              </select>
          </div>
          <div class="firm-group">
              <label for="nama">Nama Kelas </label>
              <select name="id_kelas" id="id_kelas" class="form-control">
                  <option value="">Pilih Kelas</option>
                  @foreach ($kelas as $key => $kel)
                    <option value="{{ $key }}">{{ $kel }}</option>
                  @endforeach
              </select>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

