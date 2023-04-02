<x-guest-layout>


<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <form method="POST" action="{{ route('team.create') }}">
        @csrf

        <!-- familyName -->
        <div>
            <x-input-label for="familyName" :value="__('家族名')" />
            <p>夫婦の苗字を決めてください。</p>
            <x-text-input id="familyName" class="block mt-1 w-full" type="text" name="familyName" :value="old('familyName')" required autofocus autocomplete="familyName" />
            <x-input-error :messages="$errors->get('familyName')" class="mt-2" />
        </div>

        <!-- familyID -->
        <div class="mt-4">
            <x-input-label for="familyID" :value="__('家族ID')" />
            <p>家族IDを決めてください。このIDを共有するとご家族をこのグループに登録することができます。</p>
            <x-text-input id="familyID" class="block mt-1 w-full" type="text" name="familyID" :value="old('familyID')" required autocomplete="familyID" />
            <x-input-error :messages="$errors->get('familyID')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
</div>
    
</x-guest-layout>
