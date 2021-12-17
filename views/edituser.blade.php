{{View:: make('title')}}
{{View:: make('menu')}}

@if(Request::get('success') == 1)
<div class="alert alert-primary" role="alert">
    Successfully update <a href="userlist">User List</a>
</div>
@elseif(Request::get('success') == 2)
<div class="alert alert-primary" role="alert">
    Failed to update <a href="userlist">User List</a></h1>
</div>
@endif

<div class="container">
  <form action="useredit?rid={{ Request::get('rid') }}" method="post" >
  @csrf
    <div class="mb-3">
      <label for="exampleFullName" class="form-label">Full Name</label>
      <input type="text" class="form-control" name="fullname" id="exampleInputName" value="{{ $users->name }}">
      <div id="nameHelp" class="form-text"></div>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $users->email }}">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control"name="password" id="exampleInputPassword1" value="{{ $users->password }}">
    </div>
    
    <button type="submit" class="btn btn-primary" onclick="clicked(event)">Update</button>
    <button type="button" onclick="javascript:history.back()" class="btn btn-danger">Cancel</button>
  </form>
</div>
<script>
function clicked(e)
{
    if(!confirm('Are you sure?')) {
        e.preventDefault();
    }
}
</script>