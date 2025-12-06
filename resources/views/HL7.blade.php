
@extends('layouts.app')

@section('content')
    <div class="p-6">
        @livewire(\App\Livewire\Hl7Segments::class)
    </div>
@endsection


