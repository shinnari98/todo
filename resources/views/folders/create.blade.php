@extends('layouts.app')

@section('title')
Todo App
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
            <div class="panel-heading p-3">フォルダを追加する</div>
            <div class="panel-body p-3">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('folders.create') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="pb-1">フォルダ名</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                    </div>
                    <div class="text-right pt-3">
                        <button type="submit" class="btn btn-primary">送信</button>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</div>
@endsection