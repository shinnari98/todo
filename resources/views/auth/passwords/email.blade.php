@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
            <div class="panel-heading p-3">パスワード再発行</div>
            <div class="panel-body p-3">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <form action="{{route('forgot.password.link') /* route('password.email') */ }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="メールアドレスを入力"
                            value="{{old('email')}}" />
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="text-right pt-4">
                        <button type="submit" class="btn btn-primary">再発行リンクを送る</button>
                    </div>

                </form>
                <div class="text-left pt-3">
                    <a href="{{route('login')}}">ログイン</a>
                </div>
            </div>
        </nav>
    </div>
</div>
@endsection