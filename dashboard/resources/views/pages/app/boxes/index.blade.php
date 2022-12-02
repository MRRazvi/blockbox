@extends('layouts.app')

@section('title', 'Boxes')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1">
                    <i class="fas fa-box"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Boxes</span>
                    <span class="info-box-number">{{ count($boxes) }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Boxes Management</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped datatable" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Operation</th>
                        <th>Data</th>
                        <th>Metadata</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boxes as $box)
                        <tr>
                            <td>
                                <a href="{{ route('boxes.show', $box['id']) }}">{{ $box['id'] }}</a>
                            </td>
                            <td>{{ $box['operation'] }}</td>
                            <td>{{ isset($box['asset']) ? 'YES' : 'NO' }}</td>
                            <td>{{ isset($box['metadata']) ? 'YES' : 'NO' }}</td>
                            <td>
                                <a href="{{ route('boxes.show', $box['id']) }}" id="view_user">
                                    <span class="fa fa-eye"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
