@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>Ini Halaman Index News</h3>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-flex justify-content-end py-2">
                <a href="{{ route('news.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i>
                    Create News
                </a>
            </div>
        </div>
    </div>
@endsection
