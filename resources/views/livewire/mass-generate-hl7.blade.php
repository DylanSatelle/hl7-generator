<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Mass HL7 Generator</h2>
    <div class="flex gap-4 mb-6">
        <input type="number" min="1" max="1000" wire:model.defer="numMessages"
               class="border px-2 py-1 rounded" placeholder="Number of messages">
        <button wire:click="generateMessages"
                class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
            Generate Messages
        </button>

         @if(count($generatedMessages) > 0)
            <button wire:click="downloadZip"
                    class="!!bg-green-600 text-black px-4 py-2 rounded hover:bg-green-700">
                Download All as ZIP
            </button>
        @endif
    </div>
    @if(count($generatedMessages) > 0)
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;">
            @foreach($generatedMessages as $msg)
                <div class="bg-gray-300 p-4 rounded font-mono shadow-lg break-words min-h-[150px] text-black text-left">
                    {!! nl2br(e($msg)) !!}
                </div>
            @endforeach
        </div>
    @endif
</div>