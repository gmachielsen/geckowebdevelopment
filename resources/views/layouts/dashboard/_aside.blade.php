<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
          <!-- <p class="app-sidebar__user-designation">{{ implode(', ', auth()->user()->roles->pluck('name')->toArray()) }}</p> -->
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.websites.index')}}"><i class="app-menu__icon fa fa-window-maximize"></i><span class="app-menu__label">Websites</span></a></li>
      </ul>
    </aside>