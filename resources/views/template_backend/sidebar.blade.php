	<div class="d-flex align-items-stretch">
      <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MENU</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="{{ route('home') }}" class="sidebar-link text-muted active"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
          <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Post</span></a>
            <div id="pages" class="collapse">
              <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                <li class="sidebar-list-item"><a href="{{ route('post.index') }}" class="sidebar-link text-muted pl-lg-5">Data Post</a></li>
                <li class="sidebar-list-item"><a href="{{ route('post.sampah') }}" class="sidebar-link text-muted pl-lg-5">Data Sampah Post</a></li>
              </ul>
            </div>
          </li>
          @if(auth()->user()->level == 'admin')
              <li class="sidebar-list-item"><a href="{{ route('kategori.index') }}" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Kategori</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('tag.index') }}" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Tag</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('user.index') }}" class="sidebar-link text-muted"><i class="o-user-1 mr-3 text-gray"></i><span>User</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('komentar.index') }}" class="sidebar-link text-muted"><i class="o-archive-1 mr-3 text-gray"></i><span>Komentar</span></a></li>
          @endif
        </ul>
      </div>