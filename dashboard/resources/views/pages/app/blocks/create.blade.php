@extends('layouts.app')

@section('title', 'Create Blocks')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Create Blocks</div>
        </div>
        <div class="card-body">
            <form action="{{ route('blocks.store') }}" method="POST">
                @csrf
                <x-forms.dropdown name="user" :options="$users" />
                <x-forms.input name="number" label="Number of Blocks" />
                <x-button name="Create Blocks" />
            </form>
        </div>
    </div>
@endsection
