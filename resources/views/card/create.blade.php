@extends('layouts.app')
@section('Page-name')
    Create new Card
@endsection
@section('content')
    <div class="container mt-2">
        <a class="btn btn-danger  text-white d-inline-block my-3" href="{{ route('dashboard') }}">&larr; Back to Dashboard
        </a>
        <form action="{{ route('card.store') }}" method="POST" enctype="multipart/form-data" id="createForm" class="my-4">
            @csrf
            <div class="mb-4 row">
                <label for="title" class="form-label">Create New Product</label>
                <input type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror" oninput="validateName()">
                {{-- messaggio error --}}
                <div id="title-error" class="text-danger"></div>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3 row">
                <label for="photo" class="form-label @error('photo') is-invalid @enderror">Photo</label>
                @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="file" name="photo" id="photo" class="form-control px-0"
                    accept=".png, .jpg, .jpeg, .gif">
                <div class="invalid-feedback" id="photo-feedback"></div>
            </div>

            <div class="mb-4 row">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                    rows="5" maxlength="1000" oninput="validateDescription()"></textarea>
                {{-- messaggio error --}}
                <div id="description-error" class="text-danger"></div>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4 row">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price"
                    class="form-control @error('price') is-invalid @enderror" oninput="validatePrice()">
                {{-- messaggio error --}}
                <div id="price-error" class="text-danger"></div>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" onclick="submitForm(event)" class="btn btn-success ">Create</button>
        </form>
    </div>

    </div>
@endsection
@section('script')
    <script>
        function submitForm(event) {
            let isValidForm = validateName() && validateDescription() && validatePrice();
            if (isValidForm) {
                document.getElementById('createForm').submit(); //se tutto coretto manda form
                return true;
            } else {
                validateName();

                validateDescription();
                validatePrice();
                event.preventDefault(); // Serve per bloccare l'invio del form
                return false;
            }
        }
        // -----validate-name-------------
        function validateName() {
            let nameInput = document.querySelector('input[name="title"]');
            let nameValue = nameInput.value;
            let nameError = document.querySelector('#title-error');
            if (!nameValue.trim()) {
                nameError.textContent = 'Il campo "Nome Piatto" deve essere compilato.';
                nameInput.classList.add('is-invalid');
                nameInput.style.border = '1px solid red';
                return false;
            } else {
                nameError.textContent = '';
                nameInput.style.border = '1px solid green';
                nameInput.classList.remove('is-invalid');
                return true;

            }
        }
        // -------validazione----ingredienti --------
        function validateIngredients() {
            let ingredientsInput = document.querySelector('input[name="ingredients"]');
            let ingredientsValue = ingredientsInput.value;
            let ingredientsError = document.querySelector('#ingredients-error');
            if (!ingredientsValue.trim()) {
                ingredientsError.textContent = 'Il campo "Ingredienti" deve essere compilato.';
                ingredientsInput.classList.add('is-invalid');
                ingredientsInput.style.border = '1px solid red';
                return false;
            } else {
                ingredientsError.textContent = '';
                ingredientsInput.style.border = '1px solid green';
                ingredientsInput.classList.remove('is-invalid');
                return true;

            }
        }
        //------validazione ----description------
        function validateDescription() {
            let descriptionInput = document.querySelector('textarea[name="description"]');
            let descriptionValue = descriptionInput.value;
            let descriptionError = document.querySelector('#description-error');
            if (!descriptionValue.trim()) {
                descriptionError.textContent = 'Il campo "Descrizione" deve essere compilato ed è di max 1000 caratteri';
                descriptionInput.classList.add('is-invalid');
                descriptionInput.style.border = '1px solid red';

                return false;
            } else {
                descriptionError.textContent = '';
                descriptionInput.style.border = '1px solid green';
                descriptionInput.classList.remove('is-invalid');
                return true;
            }
        }
        //-----validazione-----price--------
        function validatePrice() {
            let priceInput = document.querySelector('input[name="price"]');
            let priceValue = priceInput.value.trim();
            let priceError = document.querySelector('#price-error');

            if (priceValue === '' || priceValue < 0) {
                priceError.textContent = 'Il campo "Prezzo" deve contenere un valore numerico positivo.';
                priceInput.classList.add('is-invalid');
                priceInput.style.border = '1px solid red';
                return false;
            } else {
                priceError.textContent = '';
                priceInput.classList.remove('is-invalid');
                priceInput.style.border = '1px solid green';
                return true;
            }

        }
    </script>
@endsection
