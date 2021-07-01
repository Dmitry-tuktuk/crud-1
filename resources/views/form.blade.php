@extends('layout')

@section('title', isset($user) ? 'Update ' .$user->name : 'Create user')

@section('content')
    <form method="POST"
          @if(isset($user))
          action="{{route('users.update', $user)}}"
          @else
          action="{{route('users.store')}}"
          @endif>
        @csrf
        @isset($user)
            @method('PUT')
        @endisset
        <div class="row">
            <div class="col mt-3">
                <input name="name"
                       value="{{old('name', isset($user) ? $user->name : null) }}"
                       type="text" class="form-control" placeholder="Name" aria-label="Name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <input name="email"
                       value="{{old('email', isset($user) ? $user->email : null) }}"
                       type="text" class="form-control" placeholder="Email" aria-label="email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <a type="button" class="btn btn-secondary" href="{{route('users.index')}}">Back to users</a>
            </div>
            <div class="col-md-6 text-right">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>
    </form>

@endsection
