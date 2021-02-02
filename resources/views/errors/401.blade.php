@extends('errors::layout')

@section('title', __('No autorizado'))
@section('code', '401')
@section('message', __('Acceso no autorizado'))
<h2>{{ $exception->getMessage() }}</h2>
