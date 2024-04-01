<div>
    <a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2.5 bg-indigo-700 shadow hover:shadow-lg
    transition border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
    focus:bg-indigo-800 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2']) }}
    >
        {{ $slot }}
    </a>
</div>
