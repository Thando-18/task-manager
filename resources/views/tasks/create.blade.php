@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <div class="top"><h1>Add Task</h1></div>
    <div class="card">
        <form method="POST" action="{{ route('tasks.store') }}" novalidate>
            @include('tasks._form', ['submitLabel' => 'Save Task'])
        </form>
    </div>
@endsection
