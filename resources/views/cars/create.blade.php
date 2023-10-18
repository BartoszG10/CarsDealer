@extends('layouts.app')

@section('content')
<div class="container">
    <div>cos</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('lang.cars.add.title') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cars.store') }} " enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.name')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.model')}}</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control @error('model') is-invalid @enderror"
                                    name="model" value="{{ old('model') }}" required autocomplete="model" autofocus>

                                @error('model')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fuelType" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.fuelType')}}</label>

                            <div class="col-md-6">
                                <select name="fuelType" class="form-control">
                                    @foreach ($fuelTypes as $value => $label)
                                        <option value="{{ $label }}">{{ __('lang.enums.fuelType.' . $label) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="yearOfProduction" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.yearOfProduction') }}</label>

                            <div class="col-md-6">
                                <input id="yearOfProduction" type="number" min="1900" max="2099" step="1" value="2016" class="form-control @error('yearOfProduction') is-invalid @enderror"
                                    name="yearOfProduction" value="{{ old('yearOfProduction') }}" required autocomplete="yearOfProduction" autofocus>

                                @error('yearOfProduction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="transmission" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.transmission') }}</label>

                            <div class="col-md-6">
                                <input id="transmission" type="text" class="form-control @error('transmission') is-invalid @enderror"
                                    name="transmission" value="{{ old('transmission') }}" required autocomplete="transmission" autofocus>

                                @error('transmission')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="driveType" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.driveType') }}</label>

                            <div class="col-md-6">
                                <input id="driveType" type="text" class="form-control @error('driveType') is-invalid @enderror"
                                    name="driveType" value="{{ old('driveType') }}" required autocomplete="driveType" autofocus>

                                @error('driveType')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="addInfo" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.addInfo') }}</label>

                            <div class="col-md-6">
                                <input id="addInfo" type="text" class="form-control @error('addInfo') is-invalid @enderror"
                                    name="addInfo" value="{{ old('addInfo') }}" required autocomplete="addInfo" autofocus>

                                @error('addInfo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step=".01" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.image') }}</label>

                            <div class="col-md-6">
                                <input id="image_path" type="file" class="form-control @error('image_path') is-invalid @enderror"
                                    name="image_path" value="{{ old('image_path') }}" autocomplete="image_path" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('lang.button.add')}}
                                </button>
                                <a href="{{route('cars.index')}}" class="btn btn-danger mx-4">
                                    {{ __('lang.button.cancel')}}
                                </a>
                            </div>
                        </div>
                    </form>

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

