@extends('layouts.app')
@section('content')
    <div class="container my-5">
        {{-- style="width: 18rem;" --}}
        <div class="d-flex">
            <div>
                @if ($singleCard->photo)
                    <img class="rounded col-12 p-3" src="{{ asset('storage/' . $singleCard->photo) }}" alt="foto"
                        style="width: 24rem;">
                @else
                    <div class="img-link d-flex justify-content-center align-items-center">
                        <img class="rounded-circle" src="https://picsum.photos/200/200" alt="">
                    </div>
                @endif
            </div>
            <div class="card-body d-flex align-items-center">
                <div class="ms-5">
                    <h2 class="card-title">{{ $singleCard->title }}</h2>
                    <p class="card-text">{{ $singleCard->description }}</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection
