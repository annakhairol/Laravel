{{View::make('title')}}
{{View::make('menu')}}

<div class="container">
    <!-- @include('message') -->
<!--     @if(Session::has('success'))
     <div class="alert alert-success"> {{ Session::get('success') }}</div>
    @endif -->
    <table class="table caption-top">
      <caption>List of users</caption>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Full Name</th>
          <th scope="col">Email Address</th>
          <!-- <th scope="col">Password</th> -->
          <th scope="col">Created Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
         @if($users->isNotEmpty())
            @foreach($users as $user)
            <tr>
               <th scope="row">{{ $loop->iteration }} </th>
               <td>{{ $user->name }}</td>
               <td>{{ $user->email }}</td>
               <!-- <td>{{ $user->password }}</td> -->
               <td>{{ date('D, d F Y',strtotime($user->created_at)) }}
               <td>
               <a href="/userget?rid={{ $user->id }}"><img src="/images/icon/edit.png" title="Edit" class="icons"></a>
               <a href="/userdelete?rid={{ $user->id }}"><img src="/images/icon/delete.png" title="Delete"class="icons" onclick="clicked(event)"></a>
               </td>
            </tr>
            @endforeach
        @else 
                <tr>
                    <td colspan="6">No search found</td>
                </tr>
        @endif
      </tbody>
    </table>

    <script>
    function clicked(e)
    {
        if(!confirm('Are you sure?')) {
            e.preventDefault();
        }
    }
    </script>
    
    <div class="pagination">
        {{ $users->links() }}
    </div>
</div>
