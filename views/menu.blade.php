<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid" >
 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li>          
          <a class="navbar-brand" href="/"><img class="logo" src="{{ asset('images/logo.png') }}"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li> -->

         <li class="nav-item">
          <a class="nav-link" href="/userlist">User List</a>
        </li>

      </ul>
      <form action="/userlist/search/" method="post" class="d-flex">
      @csrf
        <input class="form-control me-2" name="search" type="text" placeholder="Search..." aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>
