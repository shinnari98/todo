@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
            <div class="panel-heading p-3">会員登録</div>
            <div class="panel-body p-3">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                    @endforeach
                </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="email">メールアドレス</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">ユーザー名</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">パスワード</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password-confirm">パスワード（確認）</label>
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                        <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
                    </div>
                    <div class="pb-3 pt-3">
                        <button type="submit" class="btn btn-primary ">送信</button>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</div>
@endsection