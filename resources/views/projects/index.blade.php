@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Проекты</h1>

    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-4">Добавить проект</a>

    @if($projects->count())
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h2 class="card-title">{{ $project->name }}</h2>
                            <p class="card-text">{{ $project->description }}</p>

                            <p class="card-text">
                                <strong>Навыки:</strong>
                                {{ $project->skills->pluck('name')->implode(', ') }}
                            </p>

                            <div class="mt-auto">
                                <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm me-2">
                                    Редактировать
                                </a>

                                <form 
                                    action="{{ route('projects.destroy', $project) }}" 
                                    method="POST" 
                                    class="d-inline"
                                    onsubmit="return confirm('Вы уверены, что хотите удалить этот проект?');"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            Проектов пока нет. Вы можете добавить новый проект.
        </div>
    @endif
</div>
@endsection
