<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>




    <div
    x-data="{
        open: false,
        toggle() {
            if (this.open) {
                return this.close()
            }

            this.$refs.button.focus()

            this.open = true
        },
        close() {
            if (!this.open) return

            this.open = false
        }
    }" x-on:keydown.escape.prevent.stop="close()"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
        class="fixed bottom-5 right-4 mb-4 mr-4">


        <!-- Panel -->
        <div x-ref="panel" x-show="open" x-transition.origin.top.left
            x-on:click.outside="close()" :id="$id('dropdown-button')" style="display: none;"
            class="fixed bottom-28 right-7 flex gap-1">
            <div class="flex flex-col gap-2">
                <x-primary-button class="self-end">
                    {{ __('pt.List') }}
                </x-primary-button>
                <x-primary-button class="self-end">
                    {{ __('pt.Spending') }}
                </x-primary-button>
            </div>
            <span class="w-1 bg-gray-200 rounded-full ml-1"></span>
        </div>


        <!-- Button -->
        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
            type="button"
            class="rounded-full inline-flex p-4 items-center bg-gray-800 dark:bg-gray-200 border border-transparent font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </button>
    </div>



</x-app-layout>
