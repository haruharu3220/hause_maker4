<x-app-layout> 
    <x-slot name="header">
        <!--<h2>-->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('イエツク！！') }}
        </h2>
    </x-slot>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <form method="POST" action="{{ route('team.create') }}">
        @csrf

        <!-- familyName -->
        <div>
            <x-input-label for="familyName" :value="__('家族名')" />
            <p>家族名を入力してください。</p>
            <x-text-input id="familyName" class="block mt-1 w-full" type="text" name="familyName" :value="old('familyName')" required autofocus autocomplete="familyName" />
            <x-input-error :messages="$errors->get('familyName')" class="mt-2" />
        </div>

        <!-- familyID -->
        <div class="mt-4">
            <x-input-label for="familyID" :value="__('familyID')" />
            <p>家族IDを決めてください。このIDを共有すると他のユーザを家族に登録することができます。</p>
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
    
</x-app-layout>