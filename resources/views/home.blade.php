@extends('layouts.app')

@section('content')
<div class="container">
    <div style="text-align: center;">
    <h1>
        3の倍数と3のつく数字でアホになれ！
        <form action="{{ route('nabe.delete', ['id' => $auth->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button type="submit" class="btn btn-danger">RESET</button>
        </form>
    </h1>
        @if($count == 0)
            <h1>{{ $count }}</h1>
            <a href="{{ route('nabe') }}">
                <img src="https://profile.yoshimoto.co.jp/assets/data/profile/83/2a69c880cfa14da26d4a3368365a3e5276e20691.jpg"
                style="border-radius: 50%; border: solid black;" alt="">
            </a>
        @elseif($count % 3 == 0 || $first_three || $last_three)
            <h1 style="color: red; font-size:">{{ $count }}</h1>
            <a href="{{ route('nabe') }}">
                <img src="https://d2dcan0armyq93.cloudfront.net/photo/odai/600/3bf94ac92e5cb20a7d9c0ef8df165072_600.jpg"
                style="height: 450px; border-radius: 50%; border: solid black;" alt="">
            </a>
        @else
            <h1>{{ $count }}</h1>
            <a href="{{ route('nabe') }}">
                <img src="https://profile.yoshimoto.co.jp/assets/data/profile/83/2a69c880cfa14da26d4a3368365a3e5276e20691.jpg"
                style="border-radius: 50%; border: solid black;" alt="">
            </a>
        @endif
        </div>
</div>
@endsection
