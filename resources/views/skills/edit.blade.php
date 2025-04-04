@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Редактировать навык</h1>

    <form action="{{ route('skills.update', $skill) }}" method="POST" class="w-50">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Название навыка:</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                value="{{ $skill->name }}" 
                class="form-control" 
                placeholder="Введите название навыка" 
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection
