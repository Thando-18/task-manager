@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="top"><h1>Edit Task</h1></div>
    <div class="card">
        <form method="POST" action="{{ route('tasks.update', $task) }}" novalidate>
            @method('PUT')
            @include('tasks._form', ['submitLabel' => 'Update Task'])
        </form>
    </div>
@endsection
