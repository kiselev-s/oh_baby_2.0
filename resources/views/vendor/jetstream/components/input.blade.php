@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'dark:text-gray-400 dark:bg-gray-700 border-gray-300 dark:border-cyan-700 dark:focus:border-cyan-800 focus:border-indigo-300 focus:ring focus:ring-indigo-200 dark:focus:ring-cyan-800 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
