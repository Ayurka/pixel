@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between">
                        <h4>{{ __('title.section_index') }}</h4>
                        <div><a href="{{ route('admin.section.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> {{ __('button.create') }}</a></div>
                    </div>
                    <div class="card-body">
                        @if(count($sections) > 0)
                            <table class="table table-striped">
                                <tbody>
                                @foreach($sections as $section)
                                    <tr>
                                        <td style="width: 150px">
                                            <img src="{!! $section->logo ? Storage::url('files/'. $section->logo) : '/no-photo.png' !!}" class="img-thumbnail" width="100">
                                        </td>
                                        <td>
                                            <h6>{{ $section->name }}</h6>
                                            <div>{{ $section->description }}</div>
                                        </td>
                                        <td style="width: 250px">
                                            @if(count($section->getPivotUsers))
                                                <ul>
                                                    @foreach($section->getPivotUsers as $user)
                                                        <li>{{ $user->name }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p>Пусто</p>
                                            @endif
                                        </td>
                                        <td style="width: 270px">
                                            <a href="{{ route('admin.section.edit', $section->id) }}" class="btn btn-dark">
                                                <i class="fas fa-edit"></i> {{ __('button.edit') }}
                                            </a>
                                            <form action="{{ route('admin.section.destroy', $section->id)}}" method="post" style="display: inline-block;">
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
                            {{ $sections->links() }}
                        @else
                            <p>Пусто</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop