@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
            <div class="panel-heading p-3">ログイン</div>
            <div class="panel-body p-3">
                @if($errors->any())
                <div class="alert alert-danger">
                    @if($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
                    @endif
                    @if($errors->has('password'))
                    <p>{{ $errors->first('password') }}</p>
                    @endif
                </div>
                @endif
                {{-- @if (section('success'))
                <div class="alert alert-success">
                    <p>{{section('success')}}</p>
                </div>
                @endif --}}
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="email">メールアドレス</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">パスワード</label>
                        <input type="password" class="form-control" id="password" name="password" />
                    </div>
                    <div class="text-right pb-3 pt-3">
                        <button type="submit" class="btn btn-primary">送信</button>
                    </div>
                </form>
            </div>
        </nav>
        <div class="text-center pt-3">
            <a href="{{ route('forgot.password.form')/* route('password.request') */ }}">パスワードの変更はこちらから</a>
        </div>
    </div>
</div>
@endsection