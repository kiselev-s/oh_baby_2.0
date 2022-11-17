<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white dark:bg-gray-500 border border-gray-300 dark:border-green-600 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-900 uppercase tracking-widest shadow-sm hover:text-gray-500 dark:hover:text-gray-400 dark:hover:bg-gray-700 focus:outline-none focus:border-blue-300 dark:focus:border-green-600 focus:ring focus:ring-blue-200 dark:focus:ring-green-600 active:text-gray-800 active:bg-gray-50 dark:active:bg-gray-800 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
