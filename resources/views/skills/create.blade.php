@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Добавить навык</h1>

    <form action="{{ route('skills.store') }}" method="POST" class="w-50">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Название навыка:</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control" 
                placeholder="Введите название навыка"
                required
            >
        </div>
        
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection
