@extends('layouts.app')

@section('title')
Todo App
@endsection

@section('link')
@include('share.flatpickr.styles')
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
            <div class="panel-heading p-3">タスクを編集する</div>
            <div class="panel-body p-3">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                    @endforeach
                </div>
                @endif
                <form action="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}"
                    method="POST">
                    @csrf
                    <div class="form-group pb-2">
                        <label for="title">タイトル</label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ old('title') ?? $task->title }}" />
                    </div>
                    <div class="form-group pb-2">
                        <label for="status">状態</label>
                        <select name="status" id="status" class="form-control">
                            @foreach(\App\Models\Task::STATUS as $key => $val)
                            <option value="{{ $key }}" {{ $key==old('status', $task->status) ? 'selected' : '' }}
                                >
                                {{ $val['label'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pb-2">
                        <label for="due_date">期限</label>
                        <input type="text" class="form-control" name="due_date" id="due_date"
                            value="{{ old('due_date') ?? $task->formatted_due_date }}" />
                    </div>
                    <div class="text-right pt-2">
                        <button type="submit" class="btn btn-primary">送信</button>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</div>

@endsection

@section('JS')
@include('share.flatpickr.scripts')
@endsection