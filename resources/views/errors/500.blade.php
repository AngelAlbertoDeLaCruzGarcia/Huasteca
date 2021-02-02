@extends('errors::layout')

@section('title', __('Error en servidor'))
@section('code', '500')
@section('message', __('Error en servidor'))
<h2>{{ $exception->getMessage() }}</h2>
