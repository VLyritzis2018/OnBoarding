<div class="relative flex flex-col items-center justify-evenly text-xs sm:text-base">
    <div class="flex flex-col gap-y-4 w-52 sm:w-80 text-center">
        <div class="text-black">
            <p>{{GoogleTranslate::trans('A safety plan helps you identify what leads to a crisis, establish personal coping strategies and inform you on how to stay safe in the difficult times',session()->get('locale'))}}</p>
        </div>
        <div>
            <p>{{GoogleTranslate::trans("Give us your e-mail to receive a link to a customized version of Minplan, suited to your needs",session()->get('locale'))}}</p>
        </div>
        <div class="flex">
            <input type="email" wire:model="email" placeholder="Enter your e-mail Here..." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-400 focus:border-gray-200 block w-full p-2.5 sm:text-sm">
            <button type="button" wire:click="store" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg sm:text-sm px-1 sm:px-5 py-2.5 ml-2">Send</button>
        </div>
        @error('email') <span class="error text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="flex flex-col h-44 w-52 sm:w-80 justify-center items-center mt-6 sm:mt-8 ">
        <div class="my-2 text-center">
            <p>{{GoogleTranslate::trans("Or download Minplan below and customize it yourself",session()->get('locale'))}}</p>
        </div>
        <div>
            <a href="/downloadApp" target="_blank"><img class="w-24 sm:w-full transition ease-in-out delay-150 hover:translate-y-1" src="{{URL::asset('/images/MinplanApp.svg')}}" alt="Minplan App"></a>
        </div>
        <p class="w-52 h-8 text-sm text-center my-3">Click here to download</p>
    </div>
</div>

