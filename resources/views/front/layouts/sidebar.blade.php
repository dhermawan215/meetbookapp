<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('app.dashboard') }}">
            <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
            <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="{{ route('app.dashboard') }}" class="dropdown-toggle">
                        <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                    </a>

                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-calendar-date"></span><span class="mtext">Agenda</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('agenda.create') }}">Add Agenda</a></li>
                        <li><a href="{{ route('agenda.index') }}">Your Agenda</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
