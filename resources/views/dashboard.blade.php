@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Dashboard</h1>

        <p class="text-lg text-gray-700 mb-12 text-center max-w-3xl mx-auto">
            Welcome to your dashboard! From here you can quickly navigate to generate 
            <strong>single HL7 messages</strong> or <strong>mass fake HL7 messages</strong>. 
            See them in action and export your files with just a few clicks.
        </p>

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-6">
            <a href="{{ route('HL7') }}" 
               class="w-full text-center px-6 py-4 bg-indigo-500 text-black font-bold text-xl rounded-lg shadow-lg hover:bg-indigo-600 transition">
                Generate Single HL7 Message
            </a>

            <a href="{{ route('mass-generate-hl7') }}" 
               class="w-full text-center px-6 py-4 bg-purple-600 text-black font-bold text-xl rounded-lg shadow-lg hover:bg-purple-700 transition">
                Generate Mass HL7 Messages
            </a>

            <a href="{{ route('scenario') }}" 
               class="w-full text-center px-6 py-4 bg-purple-600 text-black font-bold text-xl rounded-lg shadow-lg hover:bg-purple-700 transition">
                Scenarios
            </a>

            <a href="{{ route('docs') }}" 
               class="w-full text-center px-6 py-4 bg-purple-600 text-black font-bold text-xl rounded-lg shadow-lg hover:bg-purple-700 transition">
                Documentation
            </a>
        </div>
    </div>
</div>
@endsection
