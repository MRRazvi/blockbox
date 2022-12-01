@extends('layouts.app')

@section('title', 'Generate Key')

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <script>
        new ClipboardJS('.clipboardjs');
    </script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">256-bit Key</div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($keys as $index => $key)
                    <div class="input-group mb-3 col-md-4">
                        <input type="text" id="key_{{ $index }}" class="form-control" value="{{ $key }}">

                        <div class="input-group-append">
                            <button type="button" class="input-group-text clipboardjs" data-clipboard-target="#key_{{ $index }}">
                                <i class="fas fa-clipboard"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
