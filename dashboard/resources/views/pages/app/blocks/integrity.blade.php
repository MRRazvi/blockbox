@extends('layouts.app')

@section('title', 'Check Integrity')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Check Integrity</div>
        </div>
        <div class="card-body">
            <form action="{{ route('blocks.integrity') }}" method="post">
                @csrf

                @if (auth()->user()->role == 'admin')
                    <x-forms.dropdown name="user" :options="$users" />
                @endif

                <x-button name="Start Checking" />
            </form>
        </div>
    </div>

    @php
    $results = session()->get('results');
    @endphp

    @if($results)
        <div class="card">
            <div class="card-header">
                <div class="card-title">Result</div>
            </div>
            <div class="card-body">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th>Node</th>
                            <th>Host</th>
                            <th>Database</th>
                            <th>Size (MB)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                            <tr>
                                <td>{{ $result['node'] }}</td>
                                <td>{{ $result['host'] }}</td>
                                <td>{{ $result['database'] }}</td>
                                <td>{{ $result['size'] }}</td>
                                <td>
                                    <span class="fa fa-circle @if($result['status'] == 'working') text-green @else text-red @endif"></span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
