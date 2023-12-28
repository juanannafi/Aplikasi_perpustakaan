@extends('/layout/main')
@section('content')
<div class="container mt-3">
  <div class="row ">
    <div class=" mt-4">
      <form action="/users/store" method="POST">
        @csrf
        <div class="row">
          <div class="col-5">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input
                  required
                  type="text"
                  class="form-control"
                  name="name"
                  autocomplete="off"
                />
              </div> 
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                  required
                  type="email"
                  class="form-control"
                  name="email"
                  autocomplete="off"
                />    
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input
                    required
                    type="text"
                    class="form-control"
                    name="password"
                    autocomplete="off"
                />    
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" id="">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
        </div>
        
        <div class="float-start">
          <a href="/users" class="btn btn-secondary">Back</a>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection