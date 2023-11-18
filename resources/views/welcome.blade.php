@extends('layout.global')

@section("content")

<h2>welcome to the app where do you wanna check first ? <a href="{{route("products.index")}}">products</a> or <a href="{{route("categories.index")}}">categories</a>?</h2>
<br>
sorry for the bad style 

@endsection