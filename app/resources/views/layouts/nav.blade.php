<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="https://mdbgo.com/">
      <img
        src="/images/mdb.png"
        height="16"
        alt="MDB Logo"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{route('logIn')}}">メインページ</a>
        </li>
      </ul>
    

      <!-- Left links -->

      <div class="d-flex align-items-center">
        <a href="#" id="logout" class="me-2">
          ログアウト
        </a>
        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none">
        @csrf
        </form>
        <script>
          document.getElementById('logout').addEventListener('click',function(event){
            event.preventDefault();
            document.getElementById('logout-form').submit();
          });
          </script>
          @if(Auth::check())
          <form action="{{route('user.show',['user' => Auth::user()->id])}}" method="GET">
           <input type="hidden" name="id" value="{{Auth::user()->id}}">
           <button type="submit" class="btn btn-primary me-3">ユーザー情報</button>
          @endif
        </form>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->