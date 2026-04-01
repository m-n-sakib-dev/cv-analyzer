<div class="space-y-2 p-2">
    @forelse ($files as $file)
        <div class="flex items-center justify-between rounded-lg border border-gray-200 px-4 py-3 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <x-heroicon-o-document class="h-5 w-5 text-gray-400" />
                <span class="text-sm text-gray-700 dark:text-gray-300">
                    {{ basename($file) }}
                </span>
            </div>
            <a
                href="{{ \Illuminate\Support\Facades\Storage::url($file) }}"
                target="_blank"
                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-400"
            >
                Download
            </a>
        </div>
    @empty
        <p class="text-sm text-gray-500">No files uploaded.</p>
    @endforelse
</div>
