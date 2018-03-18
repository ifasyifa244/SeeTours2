
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        @if(Auth::check())
        <!-- Optionally, you can add icons to the links -->
        
        
          @endif
          
            @role('karyawan1')
            <li class="treeview">
          <a href="#"><i class="fa fa-tasks"></i> <span>Fasilitas Objek Wisata</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
            <ul class="treeview-menu">
            <li><a href="{{ url('admin/hotel')}}"><i class="fa fa-hotel"></i>Hotel</a></li>
            <li><a href="{{ url('admin/rumahmakan')}}"><i class="fa fa-cutlery"></i> Restoran</a></li>
            <li><a href="{{ url('admin/tempatoleholeh')}}"><i class="fa fa-shopping-cart"></i> Tempat Oleh-Oleh</a></li>
            </ul>
          </li>
            @endrole

            @role('admin')
            <li><a href="{{ url('admin/hakakses')}}"><i class="fa  fa-users"></i> <span>Hak Akses</span></a></li>
            <li><a href="{{ url('admin/objekwisata')}}"><i class="fa  fa-map-pin"></i> <span>Objek Wisata</span></a></li>
            <!-- <li><a href="{{ url('admin/kategori')}}"><i class="fa  fa-tags"></i> <span>Kategori</span></a></li> -->
            <li class="treeview">
          <a href="#"><i class="fa fa-tasks"></i> <span>Fasilitas Objek Wisata</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>

            <ul class="treeview-menu">
            <li><a href="{{ url('admin/hotel')}}"><i class="fa fa-hotel"></i>Hotel</a></li>
            <li><a href="{{ url('admin/rumahmakan')}}"><i class="fa fa-cutlery"></i> Restoran</a></li>
            <li><a href="{{ url('admin/tempatoleholeh')}}"><i class="fa fa-shopping-cart"></i> Tempat Oleh-Oleh</a></li>
            <li><a href="{{ url('admin/spbu')}}"><i class="fa  fa-tint"></i> SPBU/Pom Bensin</a></li>
            <li><a href="{{ url('admin/atm')}}"><i class="fa  fa-money"></i> Atm</a></li></ul>
            <li><a href="{{ url('admin/about')}}"><i class="fa  fa-pencil-square-o"></i> <span>Profil</span></a></li>
            <li><a href="{{route('kontaks.index')}}"><i class="fa  fa-envelope-square"></i> <span>Pesan</span></a></li>
          </li>
            @endrole

            @role('karyawan2')
            <li class="treeview">
          <a href="#"><i class="fa fa-tasks"></i> <span>Fasilitas Objek Wisata</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
            <ul class="treeview-menu">
            <li><a href="{{ url('admin/spbu')}}"><i class="fa  fa-tint"></i> SPBU/Pom Bensin</a></li>
            <li><a href="{{ url('admin/atm')}}"><i class="fa  fa-money"></i> Atm</a></li>
          </ul>
        </li>
            @endrole
          
      
      
        
      </ul>
    </section>