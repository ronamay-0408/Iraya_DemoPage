@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-[#F37029] focus:ring-[#F37029]/50 rounded-md shadow-sm']) }}>
 