@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('title.user_edit') }} {{ $user->name }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.user.update', $user->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="nameInput">{{ __('label.name_user') }}</label>
                                <input type="text" class="form-control" name="name" id="nameInput" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="emailInput">{{ __('label.email') }}</label>
                                <input type="email" class="form-control" name="email" id="emailInput" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="passwordInput">{{ __('label.password') }}</label>
                                <input type="password" class="form-control" name="password" id="passwordInput">
                            </div>
                            <div class="form-group">
                                <label for="passwordConfirmInput">{{ __('label.password_confirm') }}</label>
                                <input type="password" class="form-control" name="password_confirmation" id="passwordConfirmInput">
                            </div>
                            <div class="form-group">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-info">{{ __('button.cancel') }}</a>
                                <button type="submit" class="btn btn-success">{{ __('button.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop