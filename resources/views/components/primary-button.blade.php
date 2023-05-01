<button {{ $attributes->merge(['type' => 'submit', 'class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-teal-500 dark:focus:border-indigo-600 focus:ring-teal-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}>
    {{ $slot }}
</button>
