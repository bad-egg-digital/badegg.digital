<div class="card card-service-tier rounded border border-thin border-grey-lightest bg-white">
  <div class="card-service-tier-heading bg-{{ $CssClasses->ColourTintClass($colour, $tint) }} @if($contrast) knockout @endif">
    <div class="inner">
      <h3 class="section-title">{{ $name }}</h3>
      <p><small>{{ $price_label }}</small>
        <strong><sup>£</sup><span>{{ $price_amount }}</span></strong>
      </p>
    </div>
    <div class="section-angle section-angle-bottom-right sharp bg-white"></div>
  </div>
  <div class="card-service-tier-content inner  wysiwyg">
    @if($for)
      <h4>{{ __('for', 'badegg')}}</h4>
      {!! apply_filters('the_content', $for) !!}
    @endif

    @if($includes)
      <h4>{{ __('includes', 'badegg')}}</h4>

      <ul>
        @if($x > 0 && $pricing_tiers[$x - 1]['includes'])
          <li class="card-service-tier-previous {{ $CssClasses->ColourTintClass($pricing_tiers[$x - 1]['colour'], $pricing_tiers[$x - 1]['tint']) }}">
            <strong><em>{{ __('everything from', 'badegg') }} {{ strtolower($pricing_tiers[$x - 1]['name']) }}</em></strong>
          </li>
        @endif

        {!! str_replace('</p', '</li', str_replace('<p', '<li', (apply_filters('the_content', $includes)))) !!}

      </ul>
    @endif
  </div>
</div>
