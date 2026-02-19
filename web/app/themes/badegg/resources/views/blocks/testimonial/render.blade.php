@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  @include('partials.content-testimonial', ['post' => $testimonial])
@overwrite
