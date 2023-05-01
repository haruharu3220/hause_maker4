
<x-guest-layout>


<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <form method="POST" action="{{ route('team.firstcreate') }}">
        @csrf
        <!-- familyName -->
        {{--
        <div>
            <x-input-label for="familyName" :value="__('名')" />
            <p>家族でチームの名前を決めてください。</p>
            <x-text-input id="familyName" class="block mt-1 w-full" type="text" name="familyName" :value="old('familyName')" required autofocus autocomplete="familyName" />
            <x-input-error :messages="$errors->get('familyName')" class="mt-2" />
        </div>
        --}}
        
        <!-- familyID -->
        <div class="mt-4">
            <x-input-label for="familyID" :value="__('ファミリーID')" />
            <p>ファミリーIDを決めてください。このIDを共有するとご家族と情報を共有できます。</p>
            <x-text-input id="familyID" class="block mt-1 w-full" type="text" name="familyID" :value="old('familyID')" required autocomplete="familyID" />
            <x-input-error :messages="$errors->get('familyID')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('作成') }}
            </x-primary-button>
        </div>
    </form>
</div>
    
</x-guest-layout>
