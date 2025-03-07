<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#F37029] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#FCB166] focus:bg-[#F37029] active:bg-[#F37029] focus:outline-none focus:ring-2 focus:ring-[#F37029]/50 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
