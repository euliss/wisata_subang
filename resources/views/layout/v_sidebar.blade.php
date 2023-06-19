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

      <li class="nav-heading">Maste Data</li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Users' ? '':'collapsed'  }}" href="{{ route('users') }}">
          <i class="bi bi-people"></i>
          <span>Kelola User</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Destinations' ? '':'collapsed'  }}" href="{{ url('destinations') }}">
          <i class="bi bi-building"></i>
          <span>Kelola Destinasi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Categories' ? '':'collapsed'  }}" href="{{ route('categories') }}">
          <i class="bi bi-intersect"></i>
          <span>Kelola Kategori</span>
        </a>
      </li>
      <li class="nav-heading">Reference</li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Articles' ? '':'collapsed'  }}" href="{{ url('articles') }}">
          <i class="bi bi-file-earmark-richtext-fill"></i>
          <span>Kelola Artikel</span>
        </a>
      </li>
      <li class="nav-heading">Report</li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Report' ? '':'collapsed'  }}" href="{{ url('report') }}">
          <i class="bi bi-newspaper"></i>
          <span>Laporan Pengunjung</span>
        </a>
      </li>
      
    @else
    <li class="nav-heading">Dashboard</li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Partner' ? '':'collapsed'  }}" href="{{ url('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-heading">Master Data</li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Destinasi' ? '':'collapsed'  }}" href="{{ url('destinations') }}">
          <i class="bi bi-building"></i>
          <span>Kelola Destinasi</span>
        </a>
      </li>
    @endif

  </ul>
</div>
</aside>