<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0; ">
      <a target="_blank" href="/" class="site_title" style="background: #2A3F54;">
        &nbsp;Benifit
      </a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix" style="margin-top: 9%;">
      <div class="profile_pic">
        @if(!empty(Auth::User()->photo))
        <img src="{{ asset(''.Auth::User()->photo) }}" alt="..." class="img-circle profile_img">
        @else
        <img src="{{ asset('admin-style/images/user.png') }}" alt="..." class="img-circle profile_img">
        @endif
        
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{ isset(Auth::User()->username) ? Auth::User()->username : '' }}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>

        <ul class="nav side-menu">
            <li>
                <a href="{{ route('dashboard') }}">{{__('main.DashBoard')}}</a>
            </li>
            <li>
              <a><i class="fa fa-gear"></i> {{__('main.Employee')}} <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('employee') }}">{{__('main.Employee')}}</a></li>
                <li><a href="{{ route('showCardPrint') }}">{{__('main.card_print')}}</a></li>
              </ul>
            </li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->
  </div>
</div>
