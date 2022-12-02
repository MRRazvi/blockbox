@extends('layouts.app')

@section('title', 'Create Box')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Create Box</div>
        </div>
        <div class="card-body">
            @if(session()->has('encrypted'))
                <x-alert type="success" message="{{ session()->get('encrypted') }}" />
            @endif

            <form action="{{ route('boxes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="data" class="form-label">Data</label>
                    <textarea
                        class="form-control @error('data') is-invalid @enderror"
                        id="data"
                        rows="10"
                        name="data"
                    >{{ old('data') }}</textarea>

                    @error('data')
                        <span id="data-error" class="error invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="metadata" class="form-label">Metadata</label>
                    <textarea
                        class="form-control @error('metadata') is-invalid @enderror"
                        id="data"
                        rows="10"
                        name="data"
                    >{{ old('metadata') }}</textarea>

                    @error('metadata')
                        <span id="data-error" class="error invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <x-button name="Create Box" />
            </form>
        </div>
    </div>
@endsection
