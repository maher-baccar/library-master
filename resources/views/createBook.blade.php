@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container alert">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{$message}}
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('books.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <label for="image"style=" cursor:pointer; color:#adacac"><i class="fa-solid fa-cloud-arrow-up"></i> Book cover</label>
                                <input id="image" type="file" style="display:none ; visibility:none;" name="image" accept="image/*" required autofocus>
                                <div class="display"></div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="caterogy" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('category') is-invalid @enderror" id="caterogy" name="caterogy" required>
                                    <option value="Unknown">-- Unknown --</option>
                                    <option value="History">History</option>
                                    <option value="Science">Science</option>
                                    <option value="Economics">Economics</option>
                                    <option value="Religion">Religion</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Art">Art</option>
                                    <option value="Psychology">Psychology</option>
                                    <option value="Sociology">Sociology</option>
                                    <option value="Philosophy">Philosophy</option>
                                    <option value="Politics">Politics</option>
                                    <option value="Geography">Geography</option>
                                    <option value="Physics">Physics</option>

                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" >

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" aria-label="description" name="description" id="description"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const display = document.querySelector(".display");
    const input = document.querySelector("#image");
    let img = document.querySelector("img");

    input.addEventListener("change", () => {
        let reader = new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.addEventListener("load", () => {
            display.innerHTML = `<img src=${reader.result} alt=''/>`;
        });
    });
</script>
@endsection
