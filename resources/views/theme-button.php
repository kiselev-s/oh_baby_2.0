<button id="switchTheme" class="h-10 w-10 flex justify-center items-center focus:outline-none text-gray-800 dark:text-gray-200"
        wire:click="switchTheme()"
>
<!--    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">-->
<!--        <path fill-rule="evenodd"-->
<!--              d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z">-->
<!--        </path>-->
<!--    </svg>-->

<!--        <svg viewBox="0 0 24 24"-->
<!--             fill="currentColor"-->
<!--             stroke-width="2"-->
<!--             stroke-linecap="round"-->
<!--             stroke-linejoin="round"-->
<!--             class="w-6 h-6">-->
<!--            <path-->
<!--                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"-->
<!--                class="stroke-slate-400 dark:stroke-slate-500">-->
<!--            </path>-->
<!--            <path d="M12 4v1M17.66 6.344l-.828.828M20.005 12.004h-1M17.66 17.664l-.828-.828M12 20.01V19M6.34 17.664l.835-.836M3.995 12.004h1.01M6 6l.835.836"-->
<!--                  class="stroke-slate-400 dark:stroke-slate-500">-->
<!--            </path>-->
<!--        </svg>-->

    <svg
        class="w-6 h-6"
        viewBox="0 0 24 24"
        fill="currentColor"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            fill-rule="evenodd"
            d="M7.5,2C5.71,3.15 4.5,5.18 4.5,7.5C4.5,9.82 5.71,11.85 7.53,13C4.46,13 2,10.54 2,7.5A5.5,5.5 0 0,1 7.5,2M19.07,3.5L20.5,4.93L4.93,20.5L3.5,19.07L19.07,3.5M12.89,5.93L11.41,5L9.97,6L10.39,4.3L9,3.24L10.75,3.12L11.33,1.47L12,3.1L13.73,3.13L12.38,4.26L12.89,5.93M9.59,9.54L8.43,8.81L7.31,9.59L7.65,8.27L6.56,7.44L7.92,7.35L8.37,6.06L8.88,7.33L10.24,7.36L9.19,8.23L9.59,9.54M19,13.5A5.5,5.5 0 0,1 13.5,19C12.28,19 11.15,18.6 10.24,17.93L17.93,10.24C18.6,11.15 19,12.28 19,13.5M14.6,20.08L17.37,18.93L17.13,22.28L14.6,20.08M18.93,17.38L20.08,14.61L22.28,17.15L18.93,17.38M20.08,12.42L18.94,9.64L22.28,9.88L20.08,12.42M9.63,18.93L12.4,20.08L9.87,22.27L9.63,18.93Z"
        />
    </svg>
</button>

<!--<button-->
<!--    type="button"-->
<!--    id="headlessui-listbox-button-4"-->
<!--    aria-haspopup="true"-->
<!--    aria-expanded="false"-->
<!--    data-headlessui-state=""-->
<!--    aria-labelledby="headlessui-listbox-label-3 headlessui-listbox-button-4">-->
<!---->
<!--    <span class="dark:hidden">-->
<!--        <svg viewBox="0 0 24 24"-->
<!--             fill="none"-->
<!--             stroke-width="2"-->
<!--             stroke-linecap="round"-->
<!--             stroke-linejoin="round"-->
<!--             class="w-6 h-6">-->
<!--            <path-->
<!--                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"-->
<!--                class="stroke-slate-400 dark:stroke-slate-500">-->
<!--            </path>-->
<!--            <path d="M12 4v1M17.66 6.344l-.828.828M20.005 12.004h-1M17.66 17.664l-.828-.828M12 20.01V19M6.34 17.664l.835-.836M3.995 12.004h1.01M6 6l.835.836"-->
<!--                  class="stroke-slate-400 dark:stroke-slate-500">-->
<!--            </path>-->
<!--        </svg>-->
<!--    </span>-->
<!---->
<!--    <span class="hidden dark:inline">-->
<!--        <svg viewBox="0 0 24 24" fill="none" class="w-6 h-6">-->
<!--            <path fill-rule="evenodd"-->
<!--                  clip-rule="evenodd" d="M17.715 15.15A6.5 6.5 0 0 1 9 6.035C6.106 6.922 4 9.645 4 12.867c0 3.94 3.153 7.136 7.042 7.136 3.101 0 5.734-2.032 6.673-4.853Z"-->
<!--                  class="fill-transparent">-->
<!--            </path>-->
<!--            <path d="m17.715 15.15.95.316a1 1 0 0 0-1.445-1.185l.495.869ZM9 6.035l.846.534a1 1 0 0 0-1.14-1.49L9 6.035Zm8.221 8.246a5.47 5.47 0 0 1-2.72.718v2a7.47 7.47 0 0 0 3.71-.98l-.99-1.738Zm-2.72.718A5.5 5.5 0 0 1 9 9.5H7a7.5 7.5 0 0 0 7.5 7.5v-2ZM9 9.5c0-1.079.31-2.082.845-2.93L8.153 5.5A7.47 7.47 0 0 0 7 9.5h2Zm-4 3.368C5 10.089 6.815 7.75 9.292 6.99L8.706 5.08C5.397 6.094 3 9.201 3 12.867h2Zm6.042 6.136C7.718 19.003 5 16.268 5 12.867H3c0 4.48 3.588 8.136 8.042 8.136v-2Zm5.725-4.17c-.81 2.433-3.074 4.17-5.725 4.17v2c3.552 0 6.553-2.327 7.622-5.537l-1.897-.632Z"-->
<!--                  class="fill-slate-400 dark:fill-slate-500">-->
<!--            </path>-->
<!--            <path fill-rule="evenodd"-->
<!--                  clip-rule="evenodd" d="M17 3a1 1 0 0 1 1 1 2 2 0 0 0 2 2 1 1 0 1 1 0 2 2 2 0 0 0-2 2 1 1 0 1 1-2 0 2 2 0 0 0-2-2 1 1 0 1 1 0-2 2 2 0 0 0 2-2 1 1 0 0 1 1-1Z"-->
<!--                  class="fill-slate-400 dark:fill-slate-500">-->
<!--            </path>-->
<!--        </svg>-->
<!--    </span>-->
<!--</button>-->
