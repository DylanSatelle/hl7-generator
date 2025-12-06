<div>
    {{-- Success is as dangerous as failure. --}}

    <h2 class="text-xl font-bold mb-4">HL7 Scenarios and Examples</h2>

        {{-- Introductory card --}}
 {{-- Introductory card --}}
    <p class="mb-6 text-gray-700">Here's some example messages and the scenarios that generated the messages!</p>
    <div class="flex gap-4 mb-6">
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;">
            @foreach($hl7_scenarios_mixed as $scenario)
                <div class="bg-gray-300 p-4 rounded font-mono shadow-lg break-words min-h-[150px] text-black text-left">
                    {!! nl2br(e($scenario['message'])) !!}
                <br> 
                <br>
                <strong text-decoration: underline>Scenario</strong>
                <br>
                <br>
                    {!! nl2br(e($scenario['scenario'])) !!}
                <br>
                <br>
                 <strong text-decoration: underline>Explination</strong>
                <br>
                <br>
                    {!! nl2br(e($scenario['message_explanation'])) !!}
                </div>
            @endforeach
        </div>
    </div>
</div>
