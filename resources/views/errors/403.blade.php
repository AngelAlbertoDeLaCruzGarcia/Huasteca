@extends('errors::layout')

@section('title', __('Solicitud denegada'))
@section('code', '403')
@section('message', __('Solicitud denegada'))
<h2>{{ $exception->getMessage() }}</h2>
