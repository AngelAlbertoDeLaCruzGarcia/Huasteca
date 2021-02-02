@extends('errors::layout')

@section('title', __('Muchas solicitudes'))
@section('code', '429')
@section('message', __('Muchas solicitudes'))
<h2>{{ $exception->getMessage() }}</h2>
