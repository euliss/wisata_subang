<aside id="sidebar" class="sidebar">
  <div class="sidebar-img" style="background:none">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading">Dashboard</li>
    @if(Auth::user()->level == 1)
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Dashboard' ? '':'collapsed'  }}" href="{{ route('home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Master Data</li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Users' ? '':'collapsed'  }}" href="{{ route('users') }}">
          <i class="bi bi-people"></i>
          <span>Manage Users</span>
        </a>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Products' ? '':'collapsed'  }}" href="{{ route('products') }}">
          <i class="bi bi-layers"></i>
          <span>Manage Destinations</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Categories' ? '':'collapsed'  }}" href="{{ route('categories') }}">
          <i class="bi bi-intersect"></i>
          <span>Manage Categories</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <!-- <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'News' ? '':'collapsed'  }}" href="{{ route('news') }}">
          <i class="bi bi-boxes"></i>
          <span>Manage News</span>
        </a>
      </li> -->
      <!-- End Profile Page Nav -->
      <!-- <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Partner' ? '':'collapsed'  }}" href="{{ route('partner') }}">
          <i class="bi bi-building"></i>
          <span>Manage Partner</span>
        </a>
      </li> -->
      <!-- End Profile Page Nav -->
    @else
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Partner' ? '':'collapsed'  }}" href="{{ url('dashboard') }}">
          <i class="bi bi-building"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Destinasi' ? '':'collapsed'  }}" href="{{ url('destinations') }}">
          <i class="bi bi-building"></i>
          <span>Destinasi</span>
        </a>
      <!-- </li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Komentar' ? '':'collapsed'  }}" href="{{ route('partner') }}">
          <i class="bi bi-building"></i>
          <span>Komentar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Laporan Pengunjung' ? '':'collapsed'  }}" href="{{ route('partner') }}">
          <i class="bi bi-building"></i>
          <span>Laporan Pengunjung</span>
        </a>
      </li> -->
    @endif

  </ul>
</div>
</aside>