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
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Destinasi' ? '':'collapsed'  }}" href="#" data-bs-toggle="modal" data-bs-target="#laporanDestinasi{{Auth::user()->id}}">
          <i class="bi bi-newspaper"></i>
          <span>Laporan Destinasi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $sidebarTitle === 'Destinasi' ? '':'collapsed'  }}" href="#" data-bs-toggle="modal" data-bs-target="#komentarDestinasi{{Auth::user()->id}}">
          <i class="bi bi-chat-dots"></i>
          <span>Komentar Destinasi</span>
        </a>
      </li>

      
    @endif

  </ul>
</div>
</aside>

@if(Auth::user()->level == 2)
{{-- @foreach ($articles as $item) --}}
<div class="modal fade" id="laporanDestinasi{{Auth::user()->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pilih Destinasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/modal-laporan-destinasi" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <label>Destinasi</label>
              <select required class="form-control" name="id_destinasi" >
                <option value="">Pilih Destinasi</option>
                @foreach($dataModalDestinasi as $val)
                <option value="{{ $val->id }}">{{ $val->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</a>
      </div>
    </form>
    </div>
  </div>
</div><!-- End Basic Modal-->
{{-- @endforeach --}}

<div class="modal fade" id="komentarDestinasi{{Auth::user()->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pilih Destinasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/modal-komentar-destinasi" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <label>Destinasi</label>
              <select required class="form-control" name="id_destinasi" >
                <option value="">Pilih Destinasi</option>
                @foreach($dataModalDestinasi as $val)
                <option value="{{ $val->id }}">{{ $val->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</a>
      </div>
    </form>
    </div>
  </div>
</div><!-- End Basic Modal-->
@endif
