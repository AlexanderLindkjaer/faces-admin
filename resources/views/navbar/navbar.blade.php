<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-green mb-3">
<div class="flex-row d-flex">
    <button type="button" class="navbar-toggler mr-2 " data-toggle="offcanvas" title="Toggle responsive left sidebar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#" title="Free Bootstrap 4 Admin Template">FaceFunAdmin</a>
</div>
<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="navbar-collapse collapse" id="collapsingNavbar">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">Home</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="//www.codeply.com">Link</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#myAlert" data-toggle="collapse">Alert</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">About</a>
        </li>
    </ul>
</div> -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
</nav>
