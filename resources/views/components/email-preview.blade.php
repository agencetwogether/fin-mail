@php
    $content = $html ?? '';
    if (is_array($content)) {
        // Tiptap JSON document (has 'type' key) — convert to HTML
        if (isset($content['type'])) {
            $content = (new \Tiptap\Editor)->setContent($content)->getHTML();
        } else {
            // Translatable array — pick current locale
            $content = $content[app()->getLocale()] ?? reset($content) ?: '';
        }
    }
@endphp

<div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
    <div class="bg-white dark:bg-gray-900 mx-auto shadow-lg rounded-lg overflow-hidden" style="max-width: 600px;">
        <div class="p-6">
            @if($content)
                <div class="prose dark:prose-invert max-w-none">
                    {!! $content !!}
                </div>
            @else
                <p class="text-gray-500 text-center py-8">No content to preview.</p>
            @endif
        </div>
    </div>
</div>
