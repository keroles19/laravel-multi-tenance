<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo" style="padding-left: 1em !important;">

        <a href="javascript:void(0);" class="app-brand-link">
              <span class="app-brand-logo demo bg-black ">
              <img src="{{asset('assets/img/favicon/favicon.png')}}" alt="{{ env('APP_NAME') }} "
                   class="" style="width: 80%;height: 67px;">
              </span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-3">
        <!-- Dashboard  -->
        @hasanyrole('super_admin|merchant')
        <li class="menu-item {{  activeClass('dashboard.home')  }}">
            <a href="{{route('dashboard.home')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Page 1"> Home </div>
            </a>
        </li>
        @endrole
    </ul>
</aside>
