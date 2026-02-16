@if(@$props['angle_' . $position . '_colour'])
  <div class="{{ implode(' ', $CssClasses->angleClasses($position, $props)) }}"></div>
@endif
