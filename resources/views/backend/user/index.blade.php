@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between">
                        <h4>{{ __('title.user_index') }}</h4>
                        <div><a href="{{ route('admin.user.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> {{ __('button.create') }}</a></div>
                    </div>
                    <div class="card-body">
                        @if(count($users) > 0)
                            <table class="table table-striped">
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td style="width: 279px">
                                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-dark">
                                                <i class="fas fa-edit"></i> {{ __('button.edit') }}
                                            </a>
                                            <form action="{{ route('admin.user.destroy', $user->id)}}" method="post" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" style="cursor: pointer;">
                                                    <i class="far fa-trash-alt"></i> {{ __('button.delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        @else
                            <p>Пусто</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop