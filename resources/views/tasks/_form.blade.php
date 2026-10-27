@csrf

<div class="field">
    <label for="title">Title *</label>
    <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}"
           class="{{ $errors->has('title') ? 'invalid' : '' }}">
    @error('title') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="4"
              class="{{ $errors->has('description') ? 'invalid' : '' }}">{{ old('description', $task->description) }}</textarea>
    @error('description') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="due_date">Due Date *</label>
    <input type="date" id="due_date" name="due_date"
           value="{{ old('due_date', optional($task->due_date)->format('Y-m-d')) }}"
           class="{{ $errors->has('due_date') ? 'invalid' : '' }}">
    @error('due_date') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="status">Status *</label>
    <select id="status" name="status" class="{{ $errors->has('status') ? 'invalid' : '' }}">
        @foreach (\App\Models\Task::STATUSES as $value => $label)
            <option value="{{ $value }}" @selected(old('status', $task->status) === $value)>{{ $label }}</option>
        @endforeach
    </select>
    @error('status') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="actions">
    <button type="submit" class="btn">{{ $submitLabel }}</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
</div>
