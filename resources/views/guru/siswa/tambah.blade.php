<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.siswa.store')}}" id="form-tambah" method="POST">
        <div class="form-group">
          @csrf
          <label for="nama_siswa">Nama Siswa </label>
          <input type="hidden" name="id" >
          <input type="text" class="form-control" placeholder="Nama siswa" id="nama" name="nama_siswa" >
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
          <label for="nis">Nis</label>
          <input type="number" class="form-control" placeholder="Nis" id="nis" name="nis" >
        </div>
         <div class="form-group">
          <label for="gender">Jenis Kelamin</label>
          <select name="gender" id="gender" class="form-control">
            <option value="">Pilih Jenis Kelamin</option>
            @foreach(config('master.gender') as $key => $val)
              <option value="{{ $key }}" > {{ $val }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nomer_hp">Nomer Hp</label>
          <input type="text" class="form-control" placeholder="Nomer hp" id="nomer_hp" name="nomer_hp">
        </div>
         <div class="form-group">
          <label for="tgl_lahir">Tanggal Lahir</label>
         <input type="date" class="form-control" placeholder="Tanggal lahir" id="tgl_lahir" name="tgl_lahir">
        </div>
        <div class="form-group">
          <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" placeholder="Tempat lahir" id="tempat_lahir" name="tempat_lahir">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
        <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
      </form>
    </div>
  </div>
</div>
