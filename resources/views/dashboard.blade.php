@extends('layouts.app')
@section('content')
    {{-- <div class="container">
        <p>Benvenuto, {{ $user->name }}</p>
        <a class="btn btn-success text-white me-3 fs-5 my-5" href="{{ route('card.create') }}">Crea Nuovo Prodotto</a>
        <div class="row">
            @foreach ($cards as $card)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                    <div class="card" style="width: 16rem;">
                        <div class="card-img-top-container">
                            <img src="{{ asset('storage/' . $card->photo) }}" class="card-img-top p-2 " alt="Card image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $card->title }}</h5>
                            {{-- <p class="card-text">{{ $card->description }}</p> --}}
    {{-- <p class="card-text"><strong>Prezzo:</strong> ${{ $card->price }}</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#cardModal-{{ $card->id }}">
                                More info
                            </button> <a class="btn btn-warning me-4 m-1" href="{{ route('card.edit', $card) }}">Edit</a>
                            <a class="btn btn-success me-4 " href="{{ route('card.show', $card) }}">Show</a>
                            <form action="{{ route('card.destroy', $card->id) }}" class="d-inline-block " method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ">Delete</button>
                            </form>
                        </div>
                    </div>
                </div> --}}

    <!-- Modal -->
    {{-- <div class="modal fade" id="cardModal-{{ $card->id }}" tabindex="-1"
                    aria-labelledby="cardModalLabel-{{ $card->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cardModalLabel-{{ $card->id }}">{{ $card->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $card->description }}</p>
                                <p><strong>Prezzo:</strong> ${{ $card->price }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> 
    </div> --}}


    <div class="container mt-5">
        <div class="row">
            <h1>Welcome! {{ $user->name }}</h1>
            <a class="btn btn-success text-white me-3 fs-5 my-5 w-25" href="{{ route('card.create') }}">Create New
                Product</a>
        </div>
        <div class="row my-5">
            @if ($cards->count() === 0)
                <h2 class="col-5 m-auto my-4"><em>There are no products created yet.</em></h2>
            @else
                <table class="table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>

                            <th scope="col"colspan="2">Price</th>
                            <th scope="col"colspan="2" class="text-center">Azioni</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cards as $index => $card)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td><img src="{{ asset('storage/' . $card->photo) }}" class="card-img-top p-2 "
                                        alt="Card image" style="width: 60px;">
                                    {{ $card->title }}</td>
                                <td colspan="2">{{ $card->price }} &euro;</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a class="btn btn-success text-white me-4 "
                                        href="{{ route('card.show', $card) }}">Show</a>

                                    <a class="btn btn-warning me-4 m-1" href="{{ route('card.edit', $card) }}">Edit</a>

                                    <form action="{{ route('card.destroy', $card->id) }}" class="d-inline-block "
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
