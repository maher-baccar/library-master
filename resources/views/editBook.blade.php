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
                    <form method="POST" enctype="multipart/form-data" action="{{ route('books.update',$book->id) }}">
                        @csrf
                        @method('PUT')
                        <img src="{{ $book->image}}" class="img-fluid" style="height: 30%; width:30% ; margin:10px" >

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{ $book->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="text" value="{{ $book->location }}" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location" >

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>
                            <div class="col-md-6">
                                <input id="age" type="number" value="{{ $book->age }}" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age">
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">{{ __('Weight') }}</label>

                            <div class="col-md-6">
                                <input id="weight" type="number" value="{{ $book->weight }}" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required autocomplete="weight">

                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="breed" class="col-md-4 col-form-label text-md-end">{{ __('Breed') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('breed') is-invalid @enderror" id="breed" name="breed" required>
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
                                @error('breed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="male" type="radio" value="Male" class="custom-control-input" name="gender" required>
                                    <label class="custom-control-label" for="male">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="female" type="radio" value="Female" class="custom-control-input" name="gender" required>
                                    <label class="custom-control-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="vaccinated" class="col-md-4 col-form-label text-md-end">{{ __('Vaccinated') }}</label>

                            <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="vaccinatedYes" type="radio" value="Yes" class="custom-control-input" name="vaccinated" required>
                                    <label class="custom-control-label" for="vaccinatedYes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="vaccinatedNo" type="radio" value="No" class="custom-control-input" name="vaccinated" required>
                                    <label class="custom-control-label" for="vaccinatedNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sterilized" class="col-md-4 col-form-label text-md-end">{{ __('Sterilized') }}</label>

                            <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="sterilizedYes" type="radio" value="Yes" class="custom-control-input" name="sterilized" required>
                                    <label class="custom-control-label" for="sterilizedYes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="sterilizedNo" type="radio" value="No" class="custom-control-input" name="sterilized" required>
                                    <label class="custom-control-label" for="sterilizedNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" aria-label="description" name="description" >{{ $book->description }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

