@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Навыки</h1>

    <a href="{{ route('skills.create') }}" class="btn btn-primary mb-3">Добавить навык</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($skills->count())
        <ul class="list-group">
            @foreach ($skills as $skill)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $skill->name }}

                    <div class="btn-group" role="group" aria-label="Действия">
                        <a href="{{ route('skills.edit', $skill) }}" class="btn btn-sm btn-warning me-2">Редактировать</a>

                        <form 
                            action="{{ route('skills.destroy', $skill) }}" 
                            method="POST" 
                            onsubmit="return confirm('Вы уверены, что хотите удалить этот навык?');"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <div class="alert alert-info mt-3">
            Навыков пока нет. Добавьте первый навык!
        </div>
    @endif
</div>
@endsection
