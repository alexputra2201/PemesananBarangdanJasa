  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center justify-content-between">
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
          <div class="container">
            <nav class="navbar brand">
                <img src="assets/img/heheee.png" alt="" style="height: 70px;"></a>
            </nav>
          </div>
          <nav id="navbar" class="navbar">
              <ul>
                  <li><a class="nav-link scrollto {{ Request::is('home') ? 'active' : ''}}" href="#hero">Home</a></li>
                  <li><a class="nav-link scrollto" href="#about">About</a></li>
                  <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                  <li><a class="nav-link scrollto {{ Request::is('career') ? 'active' : ''}}" href="/career">Career</a></li>

                  @auth
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Welcome back, {{ auth()->user()->username }}
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          @can('admin')
                          <li><a class="dropdown-item" href="/dashboard">
                                  <i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          @endcan
                          <li>
                              <form action="/logout" method="post">
                                  @csrf
                                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                      Logout</button>
                              </form>
                          </li>
                      </ul>
                  </li>
                  @else

                  <li><a class="nav-link scrollto " href="/login">Login</a></li>
              </ul>
              @endauth
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->