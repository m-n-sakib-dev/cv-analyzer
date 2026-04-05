<x-filament-panels::page>
    <div class="space-y-4">

        {{-- Candidate info bar --}}
        <div class="flex items-center gap-6 rounded-xl border border-gray-200 bg-white px-6 py-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="flex gap-2">
                <p class="text-xs text-gray-500 dark:text-gray-400">File</p>
                <p class="font-medium text-gray-800 dark:text-gray-100">{{ basename($this->record->cv_path) }}</p>
            </div>
            @if ($this->record->designations)
            <div class="flex gap-2">
                <p class="text-xs text-gray-500 dark:text-gray-400">Designation</p>
                <p class="font-medium text-gray-800 dark:text-gray-100">{{ $this->record->designations }}</p>
            </div>
            @endif
            @if ($this->record->ratings)
            <div class="flex gap-2">
                <p class="text-xs text-gray-500 dark:text-gray-400">Rating</p>
                <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-800 dark:bg-green-900 dark:text-green-200">
                    {{ $this->record->ratings }}
                </span>
            </div>
            @endif
        </div>

        {{-- PDF Viewer --}}
        <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm dark:border-gray-700">
            <iframe
                src="{{ \Illuminate\Support\Facades\Storage::url($this->record->cv_path) }}"
                style="height:1200px; width:100%"
                type="application/pdf"></iframe>
        </div>

    </div>
</x-filament-panels::page>