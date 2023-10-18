@extends('layouts.app')

@section('content')

<div class="container">
    @include('helpers.flash-messeges')
    <div class="row">

        <div class="col-6">
            <h1>{{ __('lang.users.all.title')}}</h1>
        </div>
        <div class="col-6">
            <a class="float-right mx-2" href="/password/reset"><button class="btn btn-primary" title="{{ __('lang.button.send_email')}}"><i class="fa-sharp fa-regular fa-envelope"></i></button></a>
            <a class="float-right" href="{{route('users.create')}}"><button class="btn btn-primary" title="{{ __('lang.button.add')}}"><i class="fa-solid fa-plus"></i></button></a>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">{{ __('lang.users.all.id')}}</th>
                <th scope="col">{{ __('lang.users.all.email')}}</th>
                <th scope="col">{{ __('lang.users.all.name')}}</th>
                @can('isAdmin')
                <th scope="col">{{ __('lang.users.all.role')}}</th>    
                @endcan
                <th scope="col">{{ __('lang.users.all.status')}}</th>  
                <th scope="col">{{ __('lang.users.all.actions')}}</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>
                @can('isAdmin')
                <td>
                    {{ $user->role }}
                    <button title="{{ __('lang.users.message.change_role_message')}}" class="btn btn-sm role" data-id="{{ $user->id }}"> <i class="fa-sharp fa-solid fa-arrows-rotate spin"></i> </button>
                </td>
                
                @endcan
                @if(Cache::has('user-is-online-' . $user->id))

                    <td class="text-success">{{ __('lang.users.all.online')}}</td>
                @else
                    <td class="text-danger">{{ __('lang.users.all.offline')}}</td>
                @endif
                
                <td>
                    <a href="{{ route('users.edit', $user->id)}}">
                        <button title="{{ __('lang.button.edit')}}" class="btn btn-success btn-sm"> <i class="fa-regular fa-pen-to-square"></i> </button>
                    </a>
                    <button title="{{ __('lang.button.remove')}}" class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}"><i class="fa-solid fa-trash"></i>  </button>
                    
                </td>
            </tr>
            @endforeach

            
        </tbody>
    </table>
    {{$users->links()}}
</div>
    @endsection
@section('javascript')
const deleteURL = "{{ url('users')}}/";
const titleDeleteMessage = "{{__('lang.message.delete_message_title', ['name' => $user->name])}}";
const successDeleteMessage = "{{__('lang.message.success_delete')}}";

const titleRoleMessage = "{{__('lang.message.role_change_title')}}";
const successRoleMessage = "{{__('lang.message.success_role_change')}}";
const yes = "{{__('lang.message.yes')}}";
const no = "{{__('lang.message.no')}}";

@endsection
@section('js-files')
<script src="{{ asset('js/delete.js') }}"></script>
<script src="{{ asset('js/users.js') }}"></script>
@endsection