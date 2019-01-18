@extends('layouts/app')
@section('title')
  @if(isset($title))
    {!! $title !!}
  @endif
@stop
@section('subtitle')
  @if(isset($subtitle))
    {!! $subtitle !!}
  @endif
@stop
@section('breadcrumb')
  @if(isset($breadcrumb))
    {!! $breadcrumb !!}
  @endif
@stop
@section('content')
    <{{ $component }}/>
@stop
