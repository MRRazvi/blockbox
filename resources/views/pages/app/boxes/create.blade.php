@extends('layouts.app')

@section('title', 'Create Box')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Create Box</div>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <x-forms.input name="key" />
                <x-forms.input name="data" />
                <x-button name="Create Box" />
            </form>
        </div>
    </div>
@endsection
