@extends('home.parent')

@section('content')

<div class="row">
    <div class="card p-4">
        <h3 class="card-title">
            Create Profile {{ Auth::user()->name }}
        </h3>
        <form action="{{ route('storeProfile') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="col mb-3 mt-3">
                <label for="" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first name">
            </div>
            <div class="col mb-3">
                <label for="" class="form-label">Image Profile </label>
                <input type="file" class="form-control" name="image">
            </div>
            <button class="btn btn-info" type="submit">
                <i class="bi bi-plus">
                    Create Profile
                </i>
            </button>
        </form>
    </div>
</div>

@endsection