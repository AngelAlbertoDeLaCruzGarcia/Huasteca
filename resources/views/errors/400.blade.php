@extends('errors::layout')

@section('title', __('Error al interactuar'))
@section('code', '400')
@section('message', __('Error al interactuar con el sitio web'))
<h2>{{ $exception->getMessage() }}</h2>
