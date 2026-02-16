@extends('layouts.block-acf', [
  'block' => $block,
  'is_preview' => $is_preview,
  'context' => $context,
  'knockout' => true,
])

@section('block-content')
  @include('components.image', ['id' => get_field('image')])
  {{--<InnerBlocks template="<?php //echo esc_attr( wp_json_encode( $template ) ); ?>" />--}}
@overwrite
