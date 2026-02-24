@if(!$is_preview)
  <section {!! get_block_wrapper_attributes() !!}>
@endif

<div class="wp-block-inner">
    @yield('block-content')
</div>

@if(!$is_preview)
  </section>
@endif
