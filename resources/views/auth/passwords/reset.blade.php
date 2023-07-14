@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="panel panel-default">
                <div class="panel-heading p-3">パスワード再発行</div>
                <div class="panel-body p-3">
                    @if($errors->any())
                    {{-- @php var_dump($errors); @endphp --}}
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{ route('newPassword.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{$token}}">
                        <div class="form-group pb-2">
                            <label for="email">メールアドレス</label>
                            <div class="form-control">{{$email}}</div>
                            <input type="hidden" id="email" name="email" value="{{$email}}" />
                        </div>
                        <div class="form-group">
                            <label for="password">新しいパスワード</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="パスワードを入力してください" />
                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">新しいパスワード（確認）</label>
                            <input type="password" class="form-control" id="password-confirm"
                                name="password_confirmation" placeholder="確認パスワードを入力してください" />
                            <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
                        </div>
                        <div class="text-right pt-2">
                            <button type="submit" class="btn btn-primary">送信</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection