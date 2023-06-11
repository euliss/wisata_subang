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
          <span>Manage Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Destinations' ? '':'collapsed'  }}" href="{{ url('destinations') }}">
          <i class="bi bi-building"></i>
          <span>Manage Destinations</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Articles' ? '':'collapsed'  }}" href="{{ url('articles') }}">
          <i class="bi bi-layers"></i>
          <span>Manage Articles</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Report' ? '':'collapsed'  }}" href="{{ url('report') }}">
          <i class="bi bi-layers"></i>
          <span>Manage Report</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Categories' ? '':'collapsed'  }}" href="{{ route('categories') }}">
          <i class="bi bi-intersect"></i>
          <span>Manage Categories</span>
        </a>
      </li>
    @else
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Partner' ? '':'collapsed'  }}" href="{{ url('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Destinasi' ? '':'collapsed'  }}" href="{{ url('destinations') }}">
          <i class="bi bi-building"></i>
          <span>Manage Destinations</span>
        </a>
      </li>
    @endif

  </ul>
</div>
</aside>