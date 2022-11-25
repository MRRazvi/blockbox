@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <x-alert type="danger" message="hi" />
    <x-forms.input name="firstName" />
@endsection
