@extends('layouts.app')

@section('styles')
<style>
    .search-form{
        font-size: 15px;
    }
    .search-form div{
        padding: 10px;
    }
    .label{
        color: #E0DFD5;
        background-color: RGBA(40, 42, 58, 0.8);
    }
    .input{
        background-color: RGB(238, 238, 238);
    }
    </style>
@endsection
@section('content')

<div class='container'> 
    <div class="search-form"> 
        <form action="{{ route('cars.searchForm') }}" class="filter-form" method="GET">
            <div class="row">
                <div class="col-lg-4 col-md-12 text-center">
                    <div class="label">
                        <label for="name">{{ __('lang.cars.all.name')}}</label>
                    </div>
                    <div class="input"> 
                        <input type="text" name="name" id="name" >
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 text-center">
                    <div class="label">
                        <label for="model">{{ __('lang.cars.all.model')}}</label>
                    </div>
                    <div class="input"> 
                        <input type="text" name="model" id="model" >
                    </div>
                </div>
                <div class="col-lg-4 col-md-12  text-center">
                    <div class="label">
                        <label for="fuelType">{{ __('lang.cars.all.fuelType')}}</label>
                    </div>
                    <div class="input"> 
                        <select name="fuelType" id="fuelType">
                            <option value=""></option>
                            @foreach ($fuelTypes as $value => $label )
                                <option value="{{ $value }}">
                                    {{ __('lang.enums.fuelType.' . $label) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12  text-center">
                    <div class="label">
                        <label for="yearOfProduction">{{ __('lang.cars.all.yearOfProduction')}}</label>
                    </div>
                    <div class="input"> 
                        <input type="number" name="yearOfProduction" id="yearOfProduction" >
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 text-center">
                    <div class="label">
                        <label for="transmission">{{ __('lang.cars.all.transmission')}}</label>
                    </div>
                    <div class="input"> 
                        <input type="text" name="transmission" id="transmission">
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 text-center">
                    <div class="label">
                        <label for="driveType">{{ __('lang.cars.all.driveType')}}</label>
                    </div>
                    <div class="input"> 
                        <input type="text" name="driveType" id="driveType">
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2 col-md-12 text-center">
                    <div class="label">
                        <label for="price_min">{{ __('lang.cars.all.price_min')}}</label>
                    </div>
                    <div class="input"> 
                        <input type="number" name="price_min" id="price_min">
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 text-center">
                    <div class="label">
                        <label for="price_max">{{ __('lang.cars.all.price_max')}}</label>
                    </div>
                    <div class="input"> 
                        <input type="number" name="price_max" id="price_max">
                    </div>
                </div>
                <div class="col-12">
                    <a href="#" class="btn btn-lg btn-block btn-info" id="filter-button"><i class="fas fa-search"></i> {{ __('lang.cars.all.filter_button') }}</a>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive-md my-5">
        <h2>{{__('lang.cars.all.find') .': '}} <span id="number">0</span></h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">{{ __('lang.cars.all.id')}}</th>
                    <th scope="col">{{ __('lang.cars.all.name')}}</th>
                    <th scope="col">{{ __('lang.cars.all.model')}}</th>
                    <th scope="col">{{ __('lang.cars.all.fuelType')}}</th>
                    <th scope="col">{{ __('lang.cars.all.yearOfProduction')}}</th>
                    <th scope="col">{{ __('lang.cars.all.transmission')}}</th>
                    <th scope="col">{{ __('lang.cars.all.driveType')}}</th>
                    <th scope="col">{{ __('lang.cars.all.addInfo')}}</th>
                    <th scope="col">{{ __('lang.cars.all.price')}}</th>
                    <th scope="col">{{ __('lang.cars.all.actions')}}</th>
                </tr>
            </thead>

            <tbody id="car-wrapper">
                @foreach ($cars as $car)
                
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('javascript')

const deleteURL = "{{ url('cars')}}/";
const editButton = "{{ __('lang.button.edit')}}";
const displayButton = "{{ __('lang.button.display')}}";
const removeButton = "{{ __('lang.button.remove')}}";

@endsection

@section('js-files')
<script src="{{asset("js/search.js")}}"></script>
<script src="{{asset("js/delete.js")}}"></script>
@endsection
