<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>


      <?php foreach($menu_1 as $row): ?>
        @if($row->route == "")

            <li class="treeview {{ Request::is('staticpage/*/edit/'.$row->id) ? 'active' : '' }}">

              <a href="#">
                <i class="fa fa-edit"></i> <span>{{$row->nama}}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>


              <ul class="treeview-menu">
                <?php foreach($menu_2 as $row_2): ?>
                  @if($row_2->id_parent==$row->id)
                    @if($row_2->type=="page")
                    <li class="{{ Request::is('staticpage/'.$row_2->id_post.'/edit/'.$row_2->id_parent) ? 'active' : '' }}"><a href="{{ url('staticpage/'.$row_2->id_post.'/edit/'.$row_2->id_parent) }}"><i class="fa fa-circle-o"></i> {{$row_2->nama}} </a></li>
                    @elseif($row_2->type=="data")
                    <li class="{{ Request::is($row_2->route) ? 'active' : '' }}"><a href="{{ url($row_2->route) }}"><i class="fa fa-circle-o"></i> {{$row_2->nama}}</a></li>
                    @endif
                  @endif
                  <?php endforeach ?>


              </ul>
            </li>
      @else
      <li class="{{ Request::is($row->route) ? 'active' : '' }}"><a href="{{ url($row->route) }}"><i class="fa fa-laptop"></i> <span>{{$row->nama}}</span></a></li>
      @endif
      <?php endforeach ?>










    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
