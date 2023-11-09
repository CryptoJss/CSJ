@extends('layouts.app')
@section('content')
    <div class="panel-form"></div>
	<div class="container">
        <div class="row">
            <div class="col s8 push-s2">
                <div class="card horizontal z-depth-4 card-form">
                    <div class="card-content">
                        @yield('form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
@section('styles')
<style>
	.centrar-letras{
		margin: auto;
	}
</style>
@endsection
@section('scripts')
	<script src="{{ asset('js/vue.js')}}"></script>
	<script src="{{ asset('js/axios.js') }}"></script>
	@yield('scripts-list')
@endsection
