@extends('layouts.app')


@section('content')
<div class="container">
    @include('helpers.flash-messeges')
    <div class="row ">

        <div class=" col-6">
            <h1>{{ __('lang.cars.all.title')}}</h1>
        </div>
        <div class="col-6">
            <a class="float-right" href="{{route('cars.create')}}">
                <button type="button" class="btn btn-primary" title="{{ __('lang.button.add')}}"><i class="fa-solid fa-plus"></i></button>
            </a>
        </div>
    </div>
    <div class="table-responsive-md">
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

            <tbody>

                @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->model}}</td>
                    <td>{{ __('lang.enums.fuelType.' . $car->fuelType) }}  </td>
                    <td>{{ $car->yearOfProduction}}</td>
                    <td>{{ $car->transmission}}</td>
                    <td>{{ $car->driveType}}</td>
                    <td>{{ $car->addInfo}}</td>
                    <td>{{ $car->price}}</td>
                    <td>
                        <a href="{{route('cars.show', $car->id)}}">
                            <button title="{{ __('lang.button.display')}}" class="btn btn-primary btn-sm"> <i
                                    class="fa-regular fa-address-card"></i> </button>
                        </a>
                        <a href="{{route('cars.edit', $car->id)}}">
                            <button title="{{ __('lang.button.edit')}}" class="btn btn-success btn-sm"> <i
                                    class="fa-regular fa-pen-to-square"></i> </button>
                        </a>
                        <button title="{{ __('lang.button.remove')}}" class="btn btn-danger btn-sm delete" data-id="{{ $car->id }}"> <i
                                class="fa-solid fa-trash"></i> </button>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        {{ $cars->links() }}
    </div>

</div>


@endsection

@section('javascript')
const deleteURL = "{{ url('cars')}}/";
const titleDeleteMessage = "{{__('lang.message.delete_message_title', ['name' => $car->name])}}";
const successDeleteMessage = "{{__('lang.message.success_delete')}}";

const titleRoleMessage = "{{__('lang.message.role_change_title')}}";
const successRoleMessage = "{{__('lang.message.success_role_change')}}";
const yes = "{{__('lang.message.yes')}}";
const no = "{{__('lang.message.no')}}";
@endsection

@section('js-files')
<script src="{{ asset('js/delete.js') }}"></script>
@endsection