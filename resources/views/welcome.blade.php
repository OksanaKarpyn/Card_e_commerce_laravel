@extends('layouts.app')
@section('content')
    <div class="container my-5">

        <div class="row">
            @foreach ($cards as $card)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <div class="card-img-top-container">

                            <img src="{{ asset('storage/' . $card->photo) }}" class="card-img-top p-2" alt="Card image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $card->title }}</h5>
                            {{-- <p class="card-text">{{ $card->description }}</p> --}}
                            {{-- <p class="card-text"><strong>Prezzo:</strong> ${{ $card->price }}</p> --}}
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#cardModal-{{ $card->id }}">
                                More Info
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="cardModal-{{ $card->id }}" tabindex="-1"
                    aria-labelledby="cardModalLabel-{{ $card->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content ">
                            <div class="modal-header bg-orange">
                                <h5 class="modal-title" id="cardModalLabel-{{ $card->id }}">{{ $card->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body bg-light">
                                {{-- <img src="{{ $card->photo }}" class="card-img-top mb-3" alt="Card image"> --}}
                                <p>{{ $card->description }}</p>
                                <p><strong>Prezzo:</strong> ${{ $card->price }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
