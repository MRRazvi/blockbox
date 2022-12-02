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
        <div class="card-header">
            <div class="card-title">Box</div>
        </div>
        <div class="card-body">
            <pre><code class="language-json">{{ json_encode($box, JSON_PRETTY_PRINT) }}</code></pre>
        </div>
    </div>
@endsection
