@extends('errors::layout')

@section('title', __('Servidor no disponible'))
@section('code', '503')
@section('message', __('Servidor no disponible'))
<h2>{{ $exception->getMessage() }}</h2>

