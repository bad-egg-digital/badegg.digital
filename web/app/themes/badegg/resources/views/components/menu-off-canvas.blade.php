<div class="menu-off-canvas bg-primary-dark knockout">
  <div class="inner">

    @if (has_nav_menu('footer_navigation'))
      {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'menu-off-canvas-ul nolist']) !!}
    @endif

    @include('partials.contact-info', ['class' => 'menu-off-canvas-contact nolist'])

  </div>

</div>
