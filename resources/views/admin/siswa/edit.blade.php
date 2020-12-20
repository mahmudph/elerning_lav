<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.siswa.update', $siswa->id)}}" id="form-edit">
        <div class="form-group">
          @csrf
          <label for="nama_siswa">Nama </label>
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value="{{ $siswa->id}}">
          <input type="text" class="form-control" placeholder="Nama siswa" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}">
        </div>
        <div class="form-group">
          <label for="id_user">User</label>
          <select name="id_user" id="id_user" class="form-control">
            @foreach($users as $key => $user)
              <option value="{{ $key }}" {{ ($key == $siswa->id_user) ? 'selected' : '' }}> {{ $user }} </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nis">Nis</label>
          <input type="number" class="form-control" placeholder="Nis" id="nis" name="nis" value="{{ $siswa->nis }}">
        </div>
         <div class="form-group">
          <label for="gender">Jenis Kelamin</label>
          <select name="gender" id="gender" class="form-control">
            @foreach(config('master.gender') as $key => $val)
              <option value="{{ $key }}" {{ ($siswa->gender == $key) ? 'selected' : '' }} > {{ $val }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nomer_hp">Nomer Hp</label>
        <input type="text" class="form-control" placeholder="Nomer hp" id="nomer_hp" name="nomer_hp" value="{{ $siswa->nomer_hp }}">
        </div>
         <div class="form-group">
          <label for="tgl_lahir">Tanggal Lahir</label>
         <input type="date" class="form-control" placeholder="Tanggal lahir" id="nama" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}">
        </div>
        <div class="form-group">
          <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Tempat lahir" id="nip" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
        <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $siswa->alamat }}</textarea>
        </div>
      </form>
    </div>
  </div>
</div>
