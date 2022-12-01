@extends('layouts.app')

@section('title', 'All Blocks')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1">
                    <i class="fas fa-boxes"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Blocks</span>
                    <span class="info-box-number">{{ count($blocks) }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Blocks</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped datatable" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>UUID</th>
                        @if (auth()->user()->role == 'admin')
                            <th>User</th>
                        @endif
                        <th>Node</th>
                        <th>Database</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blocks as $block)
                        @php
                            $_data = json_decode($block->data);
                        @endphp

                        <tr>
                            <td>{{ $block->id }}</td>
                            <td>{{ $block->uuid }}</td>
                            @if (auth()->user()->role == 'admin')
                                <td>{{ $block->user->email }}</td>
                            @endif
                            <td>
                                <span class="badge badge-primary">{{ $_data->node }}</span>
                                {{ \App\Models\Node::where('id', $_data->node)->first()->host ?? '' }}
                            </td>
                            <td>{{ $_data->database ?? '' }}</td>
                            <td>{{ $block->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
