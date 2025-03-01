@extends('layouts.app')

@section('content')
    @include('partials.page-header')
    <x-recording-grid :recordings="$recordings" />
@endsection
