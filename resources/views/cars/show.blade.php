@extends('layouts.app')

@section('styles')
<style>
    .image{
        width: 100%;
        max-height: 500px;
    }
    .title {
        background-color: rgb(var(--color2)) !important;
        color: rgb(var(--color4))
    }
</style>
@endsection

@section('content')

<div class="container card">
    <div class="row text-center title mb-4 p-3">
            <div class="col-2"><a class="float-left" href="{{route('cars.index')}}">
                <button type="button" class="btn btn-primary my-2" title="{{ __('lang.button.back')}}"><i class="fa-solid fa-arrow-left"></i></button>
            </a></div>
            <div class="col-8">
                <h1>{{ __('lang.cars.show.title',['id' => $car->id])}}</h1>
            </div>
            <div class="col-2"><a class="float-right" href="{{route('cars.edit', $car->id)}}">
                <button type="button" class="btn btn-primary my-2" title="{{ __('lang.button.edit')}}"><i class="fa-solid fa-pen-to-square"></i></button>
            </a></div>
    </div>
    <div class="row text-center p-4">
        <div class="col-md-6 image">
            @if(!is_null($car->image_path))
                <img src="{{ asset('storage/'.$car->image_path) }}" class="w-100 shadow-1-strong rounded"  alt="{{ __('lang.cars.all.image') }}">
            @endif
        </div>
        <div class="col-md-6 description">
            <div class="row">

                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{$car->name}}" disabled>
                </div>
                <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.model') }}</label>

                <div class="col-md-6">
                    <input id="model" type="text" class="form-control" name="model" value="{{$car->model}}" disabled>
                </div>


                <label for="fuelType" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.fuelType') }}</label>

                <div class="col-md-6">
                    <input id="fuelType" type="text" class="form-control" name="fuelType" value="{{ __('lang.enums.fuelType.' . $car->fuelType) }} " disabled>
                </div>

                <label for="yearOfProduction" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.yearOfProduction') }}</label>

                <div class="col-md-6">
                    <input id="yearOfProduction" class="form-control" name="yearOfProduction" value="{{$car->yearOfProduction}}" disabled>

            </div>

                <label for="transmission" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.transmission') }}</label>

                <div class="col-md-6">
                    <input id="transmission" type="text" class="form-control" name="transmission" value="{{$car->transmission}}" disabled>
                </div>

                <label for="driveType" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.driveType') }}</label>

                <div class="col-md-6">
                    <input id="driveType" type="text" class="form-control" name="driveType" value="{{$car->driveType}}" disabled>

            </div>

                <label for="addInfo" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.addInfo') }}</label>

                <div class="col-md-6">
                    <input id="addInfo" type="text" class="form-control" name="addInfo" value="{{$car->addInfo}} " disabled>
                </div>

                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('lang.cars.all.price') }}</label>

                <div class="col-md-6">
                    <input id="price" type="number" class="form-control" name="price" value="{{$car->price}}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

