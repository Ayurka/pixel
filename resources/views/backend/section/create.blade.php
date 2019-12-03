@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('title.section_create') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.section.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nameInput">{{ __('label.name') }}</label>
                                <input type="text" class="form-control" name="name" id="nameInput">
                            </div>
                            <div class="form-group">
                                <label for="descriptionInput">{{ __('label.description') }}</label>
                                <textarea class="form-control" name="description" id="descriptionInput"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="logo" class="custom-file-input" id="inputLogo">
                                    <label class="custom-file-label" for="inputLogo">Логотип</label>
                                </div>
                            </div>
                            @if(count($users) > 0)
                                <h4>{{ __('title.users') }}</h4>
                                <div class="form-group">
                                    @foreach($users as $key => $user)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="users[]" value="{{ $user->id }}" id="defaultCheck{{$key}}">
                                            <label class="form-check-label" for="defaultCheck{{$key}}">
                                                {{ $user->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <a href="{{ route('admin.section.index') }}" class="btn btn-info">{{ __('button.cancel') }}</a>
                                <button type="submit" class="btn btn-success">{{ __('button.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop