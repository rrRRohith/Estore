<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex justify-center rounded bg-danger px-6 py-2 font-medium text-gray hover:bg-opacity-90']) }}>
    {{ $slot }}
</button>
