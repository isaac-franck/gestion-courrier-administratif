@extends('layouts.app')

@section('content')

    <x-navbar />

    <main class="pt-20">

        <x-hero />

        

    {{-- Entreprise --}}
    <x-about />

    {{-- Fonctionnalités --}}
    <x-features />

    {{-- Comment ça fonctionne --}}
    <x-process />

    {{-- Avantages --}}
    <x-advantages />

    {{-- Appel à l'action --}}
    <x-cta />

    </main>

    <x-footer />

@endsection