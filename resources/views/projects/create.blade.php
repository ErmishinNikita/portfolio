@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Добавить проект</h1>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Название:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание:</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Навыки:</label>
            <div class="form-check">
                @foreach ($skills as $skill)
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="skills[]" 
                            value="{{ $skill->id }}" 
                            id="skill-{{ $skill->id }}"
                        >
                        <label class="form-check-label" for="skill-{{ $skill->id }}">
                            {{ $skill->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
