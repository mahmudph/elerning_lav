<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.guru.store')}}" id="form-tambah">
        <div class="form-group">
          @csrf
          <label for="nama">Nama </label>
          <input type="hidden" name="id" >
          <input type="text" class="form-control" placeholder="Nama guru" id="nama" name="nama" >
        </div>
        <div class="form-group">
          <label for="id_user">User</label>
          <select name="id_user" id="id_user" class="form-control">
            <option value="">Pilih Users</option>
            @foreach($users as $key => $user)
              <option value="{{ $key }}"> {{ $user }} </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nip">Nip</label>
          <input type="number" class="form-control" placeholder="Nip" id="nip" name="nip" >
        </div>
         <div class="form-group">
          <label for="nama">Jenis Kelamin</label>
          <select name="gender" id="gender" class="form-control">
            <option value="">Pilih Jenis Kelamin</option>
            @foreach(config('master.gender') as $key => $val)
              <option value="{{ $key }}" > {{ $val }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nip">Nomer Hp</label>
        <input type="text" class="form-control" placeholder="Nomer hp" id="nomer_hp" name="nomer_hp">
        </div>
         <div class="form-group">
          <label for="tgl_lahir">Tanggal Lahir</label>
         <input type="date" class="form-control" placeholder="Tanggal lahir" id="nama" name="tgl_lahir">
        </div>
        <div class="form-group">
          <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Tempat lahir" id="nip" name="tempat_lahir">
        </div>
        <div class="form-group">
          <label for="nip">Alamat</label>
        <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
      </form>
    </div>
  </div>
</div>
