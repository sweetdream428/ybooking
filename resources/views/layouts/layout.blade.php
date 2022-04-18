<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                <span class="brand-logo">
                    <h4>LOGO</h4>
                </span>
                <h2 class="brand-text"></h2>
                </a></li>
			
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>

    <div class="main-menu-content">
@if (Auth::user()->is_superuser != 3 && Auth::user()->is_superuser != 4)
        <ul class="navigation navigation-main">
            <li class="nav-item"><a class="d-flex align-items-center rounded @if(Request::path() == 'datatrans-category') bg-primary @endif" href="{{route('datatrans.category.index')}}"><span class="menu-title text-truncate @if(Request::path() == 'datatrans-category') text-white @endif">Categories</span></a>
            </li>
        </ul>
        
        <ul class="navigation navigation-main">
            <li class="nav-item"><a class="d-flex align-items-center rounded @if(Request::path() == 'datatrans-service-list') bg-primary @endif" href="{{route('datatrans.service.index')}}"><span class="menu-title text-truncate @if(Request::path() == 'datatrans-service-list') text-white @endif">Services</span></a>
            </li>
        </ul>
		
		<ul class="navigation navigation-main">
            <li class="nav-item"><a class="d-flex align-items-center rounded @if(Request::path() == 'datatrans-location') bg-primary @endif" href="{{route('datatrans.location.index')}}"><span class="menu-title text-truncate @if(Request::path() == 'datatrans-location') text-white @endif">Location</span></a>
            </li>
        </ul>

        <ul class="navigation navigation-main">
            <li class="nav-item"><a class="d-flex align-items-center rounded @if(Request::path() == 'datatrans-employee') bg-primary @endif" href="{{route('datatrans.employee.index')}}"><span class="menu-title text-truncate @if(Request::path() == 'datatrans-employee') text-white @endif">Employees</span></a>
            </li>
        </ul>

        <ul class="navigation navigation-main">
            <li class="nav-item"><a class="d-flex align-items-center rounded @if(Request::path() == 'datatrans-order') bg-primary @endif" href="{{route('datatrans.order.index')}}"><span class="menu-title text-truncate @if(Request::path() == 'datatrans-order') text-white @endif">Orders</span></a>
            </li>
        </ul>
    
        <ul class="navigation navigation-main">
            <li class="nav-item"><a class="d-flex align-items-center rounded @if(Request::path() == 'datatrans-merchant') bg-primary @endif" href="{{route('datatrans.merchant.index')}}"><span class="menu-title text-truncate @if(Request::path() == 'datatrans-merchant') text-white @endif">Merchant</span></a>
            </li>
        </ul>

        <ul class="navigation navigation-main">
            <li class="nav-item"><a class="d-flex align-items-center rounded @if(Request::path() == 'datatrans-mailcontent') bg-primary @endif" href="{{route('datatrans.mailcontent.index')}}"><span class="menu-title text-truncate @if(Request::path() == 'datatrans-mailcontent') text-white @endif">Mail Content</span></a>
            </li>
        </ul>
		
		<ul class="navigation navigation-main">
            <li class="nav-item"><a class="d-flex align-items-center rounded @if(Request::path() == 'datatrans-setting') bg-primary @endif" href="{{route('datatrans.setting.index')}}"><span class="menu-title text-truncate @if(Request::path() == 'datatrans-setting') text-white @endif">Setting</span></a>
            </li>
        </ul>
		@endif

        <ul class="navigation navigation-main">
            <li class="nav-item"><a class="d-flex align-items-center rounded @if(Request::path() == 'getevents') bg-primary @endif" href="{{route('calendar.getevents')}}"><span class="menu-title text-truncate @if(Request::path() == 'getevents') text-white @endif">Calendar</span></a>
            </li>
        </ul>

        @if (Auth::user()->is_superuser == 1)
            <ul class="navigation navigation-main">
                <li class="nav-item"><a class="d-flex align-items-center rounded @if(Request::path() == 'datatrans-user') bg-primary @endif" href="{{route('datatrans.user.index')}}"><span class="menu-title text-truncate @if(Request::path() == 'datatrans-user') text-white @endif">User</span></a>
                </li>
            </ul>
        @endif    
        
    </div>
</div>