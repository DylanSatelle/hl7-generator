@extends('layouts.app')

@section('content')
    <div class="p-6">
        @livewire(\App\Livewire\MassGenerateHL7::class)('mass-generate-hl7')
    </div>
@endsection


