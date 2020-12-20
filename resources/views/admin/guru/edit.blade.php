<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.guru.update', $guru->id)}}" id="form-edit" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama_guru">Nama</label>
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="id" value="{{ $guru->id}}">
          <input type="text" class="form-control" placeholder="Nama guru" id="nama_guru" name="nama_guru" value="{{ $guru->nama_guru }}">
        </div>
        <div class="form-group">
          <label for="id_user">User</label>
          <select name="id_user" id="id_user" class="form-control">
            @foreach($users as $key => $user)
              <option value="{{ $key }}" {{ ($key === $guru->id_user) ? 'selected' : '' }}> {{ $user }} </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nip">Nip</label>
          <input type="number" class="form-control" placeholder="Nip" id="nip" name="nip" value="{{ $guru->nip }}">
        </div>
         <div class="form-group">
          <label for="nama">Jenis Kelamin</label>
          <select name="gender" id="gender" class="form-control">
            @foreach(config('master.gender') as $key => $val)
              <option value="{{ $key }}" {{ ($guru->gender == $key) ? 'selected' : '' }} > {{ $val }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nomer_hp">Nomer Hp</label>
        <input type="text" class="form-control" placeholder="Nomer hp" id="nomer_hp" name="nomer_hp" value="{{ $guru->nomer_hp }}">
        </div>
         <div class="form-group">
          <label for="tgl_lahir">Tanggal Lahir</label>
         <input type="date" class="form-control" placeholder="Tanggal lahir" id="nama" name="tgl_lahir" value="{{ $guru->tgl_lahir }}">
        </div>
        <div class="form-group">
          <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Tempat lahir" id="nip" name="tempat_lahir" value="{{ $guru->tempat_lahir }}">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
        <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $guru->alamat }}</textarea>
        </div>
      </form>
    </div>
  </div>
</div>
