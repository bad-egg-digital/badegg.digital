<div class="menu-off-canvas bg-primary-darker has-gradient knockout" aria-hidden="true">
  <div class="inner">

    @if (has_nav_menu('footer_navigation'))
      {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'menu-off-canvas-ul nolist']) !!}
    @endif

  </div>

</div>
