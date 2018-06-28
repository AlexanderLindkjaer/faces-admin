@extends('layouts.logged-in')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="row">
      <aside class="profile-card">
      <header>
        <a><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/559107/profile/profile-512_1.jpg"></a>
        <h1>Dalianny Vieira</h1>
        <h2>Hello!</h2>
      </header>
      <div class="profile-bio">
        <p>You can call me Dali. I'm a brazilian <strong>frontend web developer, illustrator, and designer</strong>. Making some cool things with coffee and code.</p>
        <ul class="social-icons list-unstyled list-inline">
          <li><a href="https://www.behance.net/daliannyvieira"><i class="fa fa-behance"></i></a></li>
          <li><a href="https://codepen.io/daliannyvieira/"><i class="fa fa-codepen"></i></a></li>
          <li><a href="https://github.com/daliannyvieira/"><i class="fa fa-github"></i></a></li>
          <li><a href="https://twitter.com/daliannyvieira"><i class="fa fa-twitter"></i></a></li>
        </ul>
      </div>
  </aside>
    </div>


</div>
@endsection
