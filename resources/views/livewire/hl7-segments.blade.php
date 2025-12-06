<div>
    {{-- Do your work, then step back. --}}

    <div class="main">
        <div class="flex h-screen gap-4 p-4">

{{-- Left Column --}}
<div class="flex-1 flex flex-col gap-4 bg-gray-300 p-4 rounded-lg overflow-auto">
    @foreach($segments as $segment)
        @unless(isset($selectedSegments[$segment['code']]))
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col gap-2 relative">

    <!-- + Button -->
    <button wire:click="selectSegment('{{ $segment['code'] }}')"
        class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 text-white rounded-full font-bold hover:bg-green-600 flex items-center justify-center shadow-lg z-10">
        +
    </button>

    <!-- Code -->
    <div class="font-bold text-xl">
        {{ $segment['code'] }}
    </div>

    <!-- Title -->
    <p class="text-gray-700">
        {{ $segment['title'] }}
    </p>

    <!-- Description -->
    <p class="text-gray-500 text-sm">
        {{ $segment['description'] }}
    </p>

</div>
        @endunless
    @endforeach

    {{-- Generate button --}}

    <button wire:click="generateHL7"
                style="background-color: #22c55e;"
            class="text-white px-6 py-2 rounded hover:bg-green-600">
        Generate HL7
    </button>


    <button wire:click="generateFakeMessage"
                style="background-color: #22c55e;"
            class="text-white px-6 py-2 rounded hover:bg-green-600">
        Generate Fake Message
    </button>


 <!-- Clear Input Button -->
    <button type="button"
                  style="background-color: #22c55e;"
                  wire:click="clearData"
            class="text-white px-6 py-2 rounded hover:bg-green-600">
        Clear Input
    </button>

{{-- HL7 Output Card --}}
@if($hl7Message || $fakeMessage)
    <div class="relative bg-white rounded-lg shadow-md mt-4 p-4">

        
            <button wire:click="downloadHL7"
                style="background-color: #22c55e;"
            class="text-white px-6 py-2 rounded hover:bg-green-600">
                Save
            </button>
      

        <pre class="font-mono text-green-700 whitespace-pre">
{{ $fakeMessage ?: $hl7Message }}
        </pre>
    </div>
@endif



</div>



            {{-- Right Column --}}
            <div class="flex-1 flex flex-col gap-4 bg-gray-300 p-4 rounded-lg overflow-auto">
                @forelse($selectedSegments as $selected)
                    <div class="bg-white rounded-lg shadow-md p-4 flex flex-col gap-2">
                <div class="mt-4 bg-gray-100 p-4 rounded">
    <h3 class="font-bold mb-2">Collected Fields</h3>

    @if(count($collectedFields) > 0)
        <ul class="list-disc pl-5">
            @foreach($collectedFields as $item)
                <li>
                    Segment: {{ $item['segment'] }}, Field: {{ $item['field'] }}, Value: {{ $item['value'] }}
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500 italic">No fields added yet.</p>
    @endif
</div>

                {{-- Segment header --}}
                <div class="flex justify-between items-center">
                    <div class="text-gray-900 font-bold text-xl">{{ $selected['code'] }}</div>
                    <button wire:click="removeSegment('{{ $selected['code'] }}')" 
                            class="text-red-500 font-bold hover:text-red-700">×</button>
                </div>

            <p class="text-gray-700 text-base">{{ $selected['title'] }}</p>
            <p class="text-gray-500 text-sm mb-2">{{ $selected['description'] }}</p>

            {{-- Fields --}}
            @foreach($selected['fields'] as $field)
                    <div class="flex flex-col mb-2">
    <label class="text-gray-700 text-sm font-medium">
        <span title="{{ $field['description'] }}" class="cursor-help">
            {{ $field['name'] }}
        </span>
    </label>

    <div class="flex gap-2 mt-1">
        <!-- Input -->
        <input type="text"
               wire:model.defer="selectedSegmentsData.{{ $selected['code'] }}.{{ $field['safe_key'] }}"
               placeholder="{{ $field['example'] ? $field['example'].' (example input)' : '' }}"
               class="border rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400 flex-1">

        <!-- Go Button -->
        
    </div>
</div>

            @endforeach


        </div>
    @empty
        <div class="w-full bg-white rounded-lg shadow-md p-6 text-center">
            <p class="text-gray-400 italic">Add Segment...</p>
        </div>
    @endforelse
    
        </div>

</div>





</div>




</div>
