<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h6>Apa anda yakin untuk menghapus <b>{{ ucfirst($user->name) }}</b> dari daftar user.?</h6>
      <form action="{{ route('admin.users.destroy', $user->id)}}" id="form-delete"  method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="{{ $user->id}}">  
      </form>
    </div>
  </div>
</div>
