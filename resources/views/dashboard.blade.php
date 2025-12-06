@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-12">

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
    <div class="max-w-5xl mx-auto mb-12 ">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Key Concepts</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- HL7 Card -->
                <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-indigo-500">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">HL7</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        <strong>Health Level Seven</strong> is a set of international standards for sharing healthcare information between different systems.
                    </p>
                    <div class="bg-indigo-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-700 italic">
                            <strong>In simple terms:</strong> HL7 is like a common language that hospitals, labs, and clinics use to send and understand patient information, so different computer systems can "talk" to each other without confusion.
                        </p>
                    </div>
                </div>

                <!-- FHIR Card -->
                <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-purple-500">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">FHIR</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        <strong>Fast Healthcare Interoperability Resources</strong> is a modern way of sharing health data using the web (like APIs).
                    </p>
                    <div class="bg-purple-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-700 italic">
                            <strong>In simple terms:</strong> FHIR makes it easier and faster for healthcare apps to access and exchange patient information online, almost like using apps on your phone that can share data instantly and safely.
                        </p>
                    </div>
                </div>

                <!-- Interoperability Card -->
                <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-green-500">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Interoperability</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        <strong>Interoperability</strong> means the ability of different systems to work together.
                    </p>
                    <div class="bg-green-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-700 italic">
                             <strong>In simple terms:</strong> Interoperability is when different healthcare systems—like your doctor's software, the hospital, and a lab—can easily share and use information without errors or delays.
                        </p>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
