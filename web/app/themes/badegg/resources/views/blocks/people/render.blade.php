@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  @if($people)
    <div class="person-wrap container-large">
      @foreach($people as $person)
        @include('partials.content-person', ['post' => $person, 'hcolour' => $hcolour])
      @endforeach
    </div>
  @endif
@overwrite
