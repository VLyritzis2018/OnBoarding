<div class="relative flex flex-col items-center justify-evenly text-xs sm:text-base">
    <div class="flex flex-col gap-y-4 w-52 sm:w-80 text-center">
        <div class="text-black">
            <p>{{GoogleTranslate::trans('A safety plan helps you identify what leads to a crisis, and how you can cope with it and stay safe',session()->get('locale'))}}</p>
        </div>
        <div>
            <p>{{GoogleTranslate::trans("Write us your email, and we will customize Minplan exactly for you",session()->get('locale'))}}</p>
        </div>
        <div class="flex">
            <input type="email" wire:model="email" placeholder="Enter your E-mail Here..." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-400 focus:border-gray-200 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 sm:text-sm">
            <button type="button" wire:click="store" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg sm:text-sm px-1 sm:px-5 py-2.5 ml-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Send</button>
        </div>
        @error('email') <span class="error text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="flex flex-col h-44 w-52 sm:w-80 justify-center items-center mt-6 sm:mt-8 ">
        <div class="my-2 text-center">
            <p>{{GoogleTranslate::trans("I will just go and Download it..",session()->get('locale'))}}</p>
        </div>
        <div>
            <a href="/downloadApp" target="_blank"><img class="w-24 sm:w-full transition ease-in-out delay-150 hover:translate-y-1" src="{{URL::asset('/images/MinplanApp.svg')}}" alt="Minplan App"></a>
        </div>
        <p class="w-24 h-8 text-sm text-center my-3">Download Minplan App</p>
    </div>
</div>

