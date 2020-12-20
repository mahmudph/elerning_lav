<div class="container">
  <div class="row">
    <div class="col-md-12">
    <form action="{{ route('admin.users.update', $user->id)}}" id="form-edit">
        <div class="form-group">
          @csrf
          <label for="name">Username </label>
          <input type="hidden" name="_method" value="PUT" >
          <input type="hidden" name="id" value="{{ $user->id}}">
          <input type="text" class="form-control" placeholder="Nama user" id="nama" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        </div>
         <div class="form-group">
          <label for="tgl_lahir">Konfirmasi Password</label>
         <input type="password" class="form-control" placeholder="Konfirmasi Password" id="conf_pass" name="conf_pass" >
        </div>
        <div class="form-group">
          <label for="role">Tipe User</label>
          <select name="role" id="role" class="form-control">
             @foreach (config('master.role') as $role)
                <option value="{{ $role }}" {{ ($role == $user->role) ? 'selected' : ''  }}> {{ $role }} </option>
             @endforeach
          </select>
        </div>
      </form>
    </div>
  </div>
</div>
