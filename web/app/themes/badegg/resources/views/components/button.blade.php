@if(@$link)
  <a href="{{ @$link['url'] }}" target="{{ @$link['target'] ?: '_self' }}" class="btn {{ $CssClasses->ColourTintClass(@$colour, @$tint) }} {{ @$style ?: 'solid' }} {{ @$class }}">
    <span>{{ @$link['title'] }}</span>
  </a>
@endif
