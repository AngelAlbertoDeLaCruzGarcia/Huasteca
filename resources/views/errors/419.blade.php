@extends('errors::layout')

@section('title', __('Pagina expirada'))
@section('code', '419')
@section('message', __('Pagina expirada'))
<h2>{{ $exception->getMessage() }}</h2>

