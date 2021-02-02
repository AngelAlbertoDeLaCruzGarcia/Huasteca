@extends('errors::layout')

@section('title', __('Pagina no encontrada'))
@section('code', '404')
@section('message', __('Pagina no encontrada'))
<h2>{{ $exception->getMessage() }}</h2>
