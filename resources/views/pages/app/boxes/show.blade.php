@extends('layouts.app')

@section('title', 'Show Box')

@section('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('boxes.decrypt', $box->id) }}" method="POST">
                @csrf
                <x-forms.input name="key" placeholder="Enter your key to decrypt the data" />
                <x-button name="Decrypt" />
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">Box: {{ $box->uuid }}</div>
        </div>
        <div class="card-body">
            <pre><code class="language-json">{{ isset($data) ? $data : $box->data }}</code></pre>
        </div>
    </div>
@endsection
