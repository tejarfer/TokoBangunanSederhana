<div class="sidebar">
  <div class="logo">
    <i class='bx bxs-building-house'></i>
    <span class="namaLogo">TBSederhana</span>
  </div>

  <ul class="nav-links">
    <li>
      <div class="link-icon">
        <a href="/dashboard">
          <i class='bx bxs-dashboard'></i>
          <span class="nama_link">Dashboard</span>
        </a>
      </div>
    </li>
    @if(Auth::check() && Auth::user()->email == 'admin@gmail.com')
    <li>
      <div class="link-icon">
        <a href="/tampil-barang">
          <i class='bx bxs-package'></i>
          <span class="nama_link">Products</span>
        </a>
      </div>
    </li>
    @endif
    <li>
      <div class="link-icon">
        <a href="/tampil-penjualan">
          <i class='bx bxs-store'></i>
          <span class="nama_link">Order</span>
        </a>
      </div>
    </li>
    @if(Auth::check())
    <li>
      <div class="link-icon">
        <a href="tampil-list-order">
          <i class='bx bx-list-ul'></i>
          <span class="nama_link">List Order</span>
        </a>
      </div>
    </li>
    <li>
      <div class="link-icon">
        <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class='bx bx-log-out'></i>
          <span class="nama_link">Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
      </div>
    </li>
    @endif
  </ul>
</div>


<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
  <i class='bx bx-menu'></i>
    <div class="collapse navbar-collapse justify-content-end " id="navbarText" style="color:white;">
      @if(Auth::check() && Auth::user()->name != null)
        {{Auth::user()->name}}
      @else
      <a href="{{ route('login') }}" style="color:white; text-decoration: none;"><span>Login</span></a>
      @endif
    </div>
  </div>
</nav>

<section class="home-section">
<div class="content">
    @yield('content')
</div>
</section>


<script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
</script>