<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'border border-black bg-white text-black shadow-hard-edge hover:shadow-none transition-shadow duration-200 ease-in-out px-4 py-2'
]) }}>
    {{ $slot }}
</button>