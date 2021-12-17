{{View:: make('title')}}
{{View:: make('menu')}}

<div class="container">

  <form action="register" method="post">
  @csrf
    <div class="mb-3">
      <label for="exampleFullName" class="form-label">Full Name</label>
      <input type="text" class="form-control" name="fullname" id="exampleInputName">
      <div id="nameHelp" class="form-text"></div>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control"name="password" id="exampleInputPassword1">
    </div>
    
    <button type="submit" class="btn btn-primary">Register</button>
    <button type="button" onclick="javascript:history.back()" class="btn btn-danger">Cancel</button>
  </form>
</div>

{{View:: make('footer')}}