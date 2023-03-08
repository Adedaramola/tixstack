<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-3 bg-[#9381FF] border border-transparent rounded-md font-semibold text-sm text-white hover:bg-[#9381FF] active:bg-[#9381FF] focus:outline-none focus:border-[#9381FF] focus:ring focus:ring-[#9381FF] disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
