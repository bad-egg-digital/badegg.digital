@if(@$link)
  <a href="{{ @$link['url'] }}" target="{{ @$link['target'] ?: '_self' }}" class="btn {{ @$colour ?: 'primary' }} {{ $style ?: 'solid' }} {{ @$class }}">
    <span>{{ @$link['title'] }}</span>
  </a>
@endif
