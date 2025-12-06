
@extends('layouts.app')

@section('content')
    <div class="p-6">
<livewire:hl7-segments :segments="$segments" />
    </div>
@endsection


