<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.new-pengajaran.update', $pengajaran->id)}}" id="form-edit" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama">Nama Pelajaran </label>
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value="{{ $pengajaran->id}}">
          <div class="firm-group">
              <select name="id_pelajaran" id="id_pelajaran" class="form-control">
                  @foreach ($pelajarans as $key => $pelajaran)
                    <option value="{{ $key }} {{ ($key == $pengajaran->id_pelajaran) ?  'selected' : '' }}">{{ $pelajaran }}</option>
                  @endforeach
              </select>
          </div>
          <div class="firm-group">
              <label for="nama">Nama Guru </label>
              <select name="id_guru" id="id_guru" class="form-control">
                  @foreach ($gurus as $key => $guru)
                    <option value="{{ $key }} {{ ($key == $pengajaran->id_guru) ?  'selected' : '' }}">{{ $guru }}</option>
                  @endforeach
              </select>
          </div>
          <div class="firm-group">
              <label for="nama">Nama Kelas </label>
              <select name="id_kelas" id="id_kelas" class="form-control">
                  @foreach ($kelas as $key => $kel)
                    <option value="{{ $key }} {{ ($key == $pengajaran->id_kelas) ?  'selected' : '' }}">{{ $kel }}</option>
                  @endforeach
              </select>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

