@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Редактировать проект</h1>

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Название:</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                value="{{ $project->name }}" 
                class="form-control" 
                required
            >
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание:</label>
            <textarea 
                name="description" 
                id="description" 
                class="form-control" 
                rows="4" 
                required
            >{{ $project->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Навыки:</label>
            <div>
                @foreach ($skills as $skill)
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="skills[]"
                            value="{{ $skill->id }}"
                            id="skill-{{ $skill->id }}"
                            {{ $project->skills->contains($skill->id) ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="skill-{{ $skill->id }}">
                            {{ $skill->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-success">Обновить</button>
    </form>
</div>
@endsection
