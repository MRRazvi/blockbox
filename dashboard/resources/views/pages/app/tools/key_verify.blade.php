@extends('layouts.app')

@section('title', 'Verify Key')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Verify Key</div>
        </div>
        <div class="card-body">
            @if(session()->has('decrypted'))
                <x-alert type="success" message="{{ session()->get('decrypted') }}" />
            @endif

            <form action="{{ route('tools.key.verify') }}" method="POST">
                @csrf
                <x-forms.input name="key" />
                <x-forms.input name="encryption" />
                <x-button name="Verify Key" />
            </form>
        </div>
    </div>
@endsection
