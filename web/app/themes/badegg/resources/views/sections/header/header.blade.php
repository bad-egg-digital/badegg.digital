<header class="menu-fixed inner inner-small inner-zero-x bg-white">
  <div class="container container-large">
    @if (has_nav_menu('primary_navigation'))
      <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu-primary-ul nolist', 'echo' => false]) !!}
      </nav>
    @endif
  </div>
</header>
