@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading p-3">
            まずはフォルダを作成しましょう
          </div>
          <div class="panel-body">
            <div class="text-center p-3">
              <a href="{{ route('folders.create') }}" class="btn btn-primary">
                フォルダ作成ページへ
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>

@endsection