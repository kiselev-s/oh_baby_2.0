<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-600 border border-transparent dark:border-blue-400 rounded-md font-semibold text-xs text-white dark:text-indigo-300 uppercase tracking-widest hover:bg-gray-700 dark:hover:text-green-600 dark:hover:bg-gray-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 dark:focus:border-blue-400 focus:ring focus:ring-gray-300 dark:focus:ring-blue-400 dark:active:bg-gray-900 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
