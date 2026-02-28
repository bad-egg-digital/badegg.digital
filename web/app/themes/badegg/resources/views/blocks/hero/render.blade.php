@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  <div class="block-hero">
    <h1 class="mini"><span class="tertiary-lighter">{{ get_field('tiny_title') }}</span></h1>
    <div class="block-hero-cols">
      <div class="block-hero-col block-hero-col-heading">
        <h2 class="section-title subhead">
          {!! $curlyBraceLeft !!}
          <span>{!! get_field('heading') !!}</span>
        </h2>
      </div>
      <div class="block-hero-col block-hero-col-text">
        {!! get_field('editor') !!}
      </div>
    </div>
    <div class="block-hero-doodle">
      @include('components.image', [
        'id' => get_field('doodle'),
        'size' => 'medium',
      ])
    </div>
  </div>
@overwrite
