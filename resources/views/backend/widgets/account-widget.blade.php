@php
    $user = filament()->auth()->user();
@endphp

<x-filament-widgets::widget class="fi-account-widget">
    <x-filament::section>
        <div class="flex items-center gap-x-3">
            <x-filament-panels::avatar.user size="lg" :user="$user" />

            <div>
                <h2
                    class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white"
                >
                    {{ __('filament-panels::widgets/account-widget.welcome', ['app' => config('app.name')]) }}
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ filament()->getUserName($user) }}
                </p>
            </div>

            <div class="flex-1 text-sm text-gray-500 text-center">
                Server time: <span id="current-time" class="font-medium">{{ date('Y-m-d H:i:s') }}</span>
            </div>

            <form
                action="{{ filament()->getLogoutUrl() }}"
                method="post"
                class="my-auto"
            >
                @csrf

                <x-filament::button
                    color="gray"
                    icon="heroicon-m-arrow-left-on-rectangle"
                    icon-alias="panels::widgets.account.logout-button"
                    labeled-from="sm"
                    tag="button"
                    type="submit"
                >
                    {{ __('filament-panels::widgets/account-widget.actions.logout.label') }}
                </x-filament::button>
            </form>
        </div>

        <script>
            function incrementTime() {
                const timeElement = document.getElementById('current-time');
                let currentTime = timeElement.textContent;

                // Parse the current time string
                let [date, time] = currentTime.split(' ');
                let [year, month, day] = date.split('-').map(Number);
                let [hours, minutes, seconds] = time.split(':').map(Number);

                // Create a Date object from the current time
                let now = new Date(year, month - 1, day, hours, minutes, seconds);

                // Add one second
                now.setSeconds(now.getSeconds() + 1);

                // Format the new time
                year = now.getFullYear();
                month = String(now.getMonth() + 1).padStart(2, '0');
                day = String(now.getDate()).padStart(2, '0');
                hours = String(now.getHours()).padStart(2, '0');
                minutes = String(now.getMinutes()).padStart(2, '0');
                seconds = String(now.getSeconds()).padStart(2, '0');

                // Update the element with the new time
                timeElement.textContent = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
            }

            setInterval(incrementTime, 1000);
        </script>


    </x-filament::section>
</x-filament-widgets::widget>
