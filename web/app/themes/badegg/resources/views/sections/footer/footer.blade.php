<footer class="content-info">
  <div class="section-angle section-angle-bottom-left bg-white"></div>
  <div class="section-angle section-angle-bottom-left bg-primary-dark bg-blur bg-blur-blue">
    <div class="bg-blur-image lazy-bg" data-bg="{{ Vite::asset('resources/images/bg-blur-blue.jpg') }}"></div>
  </div>
  <div class="footer bg-primary-dark knockout bg-blur bg-blur-blue">
    <div class="section container container-larger">
      @if (has_nav_menu('footer_navigation'))
        <nav class="footer-nav" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'container_class' => 'nav-footer-container', 'menu_class' => 'footer-nav-ul nolist', 'echo' => false]) !!}
        </nav>
      @endif
    </div>

    <div class="footer-copyright inner-small inner-zero-x bg-primary-darker">
      <div class="container container-larger">
        <div class="footer-copyright-col">
          <p>
            <span>&copy;2021-{{ date('Y') }} {{ $company_legal }},</span>
            <span>{{ __('All Rights Reserved', 'badegg') }}</span>
          </p>

          <p>{{ __('Company Number', 'badegg') }}: {{ $company_number }}</p>
        </div>

        @if (has_nav_menu('legal_navigation'))
          {!! wp_nav_menu(['theme_location' => 'legal_navigation', 'menu_class' => 'nav nolist', 'echo' => false]) !!}
        @endif
      </div>
    </div>
    <div class="bg-blur-image lazy-bg" data-bg="{{ Vite::asset('resources/images/bg-blur-blue.jpg') }}"></div>
  </div>
</footer>
