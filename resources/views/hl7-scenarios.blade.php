
@extends('layouts.app')

@section('content')
    <div class="p-6">
        @livewire(\App\Livewire\ScenarioTable::class)
    </div>
@endsection

