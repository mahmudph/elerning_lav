<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.users.store')}}" id="form-tambah">
        <div class="form-group">
          @csrf
          <label for="name">Username </label>
          <input type="hidden" name="id">
          <input type="text" class="form-control" placeholder="Nama user" id="nama" name="name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" placeholder="Email" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="">
        </div>
         <div class="form-group">
          <label for="conf_pass">Konfirmasi Password</label>
          <input type="password" class="form-control" placeholder="Konfirmasi Password" id="conf_pass" name="conf_pass" >
        </div>
        <div class="form-group">
          <label for="role">Tipe User</label>
            <select name="role" id="role" class="form-control">
              @foreach (config('master.role') as $role)
                <option value="{{ $role }}"> {{ $role }} </option>
             @endforeach
          </select>
        </div>
      </form>
    </div>
  </div>
</div>
