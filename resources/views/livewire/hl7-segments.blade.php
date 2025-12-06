<div class="main">
    <div class="flex flex-col md:flex-row h-auto md:h-screen gap-4 p-4">

        {{-- Left Column --}}
        <div class="flex-1 flex flex-col gap-4 bg-gray-300 p-4 rounded-lg overflow-auto order-1 md:order-1">
            @foreach($segments as $segment)
                @unless(isset($selectedSegments[$segment['code']]))
                    <div class="bg-white rounded-lg shadow-md relative overflow-visible">

                        <!-- + Button -->
                        <button wire:click="selectSegment('{{ $segment['code'] }}')"
                            class="absolute top-2 right-2 z-10 text-gray-500 font-bold hover:text-gray-700
                                   bg-white rounded-full w-8 h-8 flex items-center justify-center shadow">
                            +
                        </button>

                        <!-- Text wrapper -->
                        <div class="p-4 flex flex-col gap-2">
                            <div class="font-bold text-lg md:text-xl">
                                {{ $segment['code'] }}
                            </div>
                            <p class="text-gray-700 text-sm md:text-base">{{ $segment['title'] }}</p>
                            <p class="text-gray-500 text-xs md:text-sm">{{ $segment['description'] }}</p>
                        </div>
                    </div>
                @endunless
            @endforeach
        </div>

        {{-- Right Column --}}
        <div class="flex-1 flex flex-col gap-4 bg-gray-300 p-4 rounded-lg overflow-auto order-2 md:order-2">
            @forelse($selectedSegments as $selected)
                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col gap-2">

                    {{-- Segment header --}}
                    <div class="flex justify-between items-center">
                        <div class="text-gray-900 font-bold text-lg md:text-xl">{{ $selected['code'] }}</div>
                        <button wire:click="removeSegment('{{ $selected['code'] }}')"
                                class="text-red-500 font-bold hover:text-red-700">×</button>
                    </div>

                    <p class="text-gray-700 text-sm md:text-base">{{ $selected['title'] }}</p>
                    <p class="text-gray-500 text-xs md:text-sm mb-2">{{ $selected['description'] }}</p>

                    {{-- Fields --}}
                    @foreach($selected['fields'] as $field)
                        <div class="flex flex-col mb-2">
                            <label class="text-gray-700 text-xs md:text-sm font-medium">
                                <span title="{{ $field['description'] }}" class="cursor-help">
                                    {{ $field['name'] }}
                                </span>
                            </label>
                            <input type="text"
                                   wire:model.defer="selectedSegmentsData.{{ $selected['code'] }}.{{ $field['safe_key'] }}"
                                   placeholder="{{ $field['example'] ? $field['example'].' (example input)' : '' }}"
                                   class="border rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400 w-full text-xs md:text-sm">
                        </div>
                    @endforeach

                    {{-- Collected Fields --}}
                    <div class="mt-4 bg-gray-100 p-4 rounded text-xs md:text-sm">
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

                </div>
            @empty
                <div class="w-full bg-white rounded-lg shadow-md p-6 text-center">
                    <p class="text-gray-400 italic">Add Segment...</p>
                </div>
            @endforelse

            {{-- Action Buttons (mobile only) --}}
            <div class="flex flex-col gap-2 mt-4 md:hidden">
                <button wire:click="generateHL7"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full text-center">
                    Generate HL7
                </button>

                <button wire:click="generateFakeMessage"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full text-center">
                    Generate Fake Message
                </button>

                <button wire:click="clearData"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full text-center">
                    Clear Input
                </button>

                {{-- HL7 Output Card --}}
                @if($hl7Message || $fakeMessage)
                    <div class="relative bg-white rounded-lg shadow-md mt-4 p-4 overflow-x-auto">
                        <button wire:click="downloadHL7"
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-2 w-full text-center">
                            Save
                        </button>
                        <pre class="font-mono text-green-700 whitespace-pre-wrap break-words">
{{ $fakeMessage ?: $hl7Message }}
                        </pre>
                    </div>
                @endif
            </div>

        </div>

        {{-- Action Buttons (desktop only) --}}
        <div class="hidden md:flex flex-col gap-2 mt-4 w-1/4">
            <button wire:click="generateHL7"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full text-center">
                Generate HL7
            </button>

            <button wire:click="generateFakeMessage"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full text-center">
                Generate Fake Message
            </button>

            <button wire:click="clearData"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full text-center">
                Clear Input
            </button>

            @if($hl7Message || $fakeMessage)
                <div class="relative bg-white rounded-lg shadow-md mt-4 p-4 overflow-x-auto">
                    <button wire:click="downloadHL7"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-2 w-full text-center">
                        Save
                    </button>
                    <pre class="font-mono text-green-700 whitespace-pre-wrap break-words">
{{ $fakeMessage ?: $hl7Message }}
                    </pre>
                </div>
            @endif
        </div>

    </div>
</div>
