<div class="relative flex flex-col items-center text-xs sm:text-base">
    <p class="mb-5 text-center sm:w-80 w-52 text-gray-400">{{GoogleTranslate::trans('Reach out to somebody you know personally',session()->get('locale'))}}</p>
    <p class="mb-5 text-center sm:w-80 w-52 text-black">{{GoogleTranslate::trans('" This message is sent through Minplan (www.minplan.org). Minplan is personal crisis management tool. I might need your help working with my crisis and I hope you will "',session()->get('locale'))}}</p>
    <p class="mb-5 text-center sm:w-80 w-52 text-gray-500 text-sm">{{GoogleTranslate::trans('Continue your message here and share it',session()->get('locale'))}}</p>
    <div class="sm:w-80 w-52 flex flex-col justify-center items-center" x-data="{ message: '' }">
        <div class="relative w-full">
            <textarea id="message" wire:model="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Continue here, or skip it..."></textarea>
        </div>
        <div class="mt-2 flex">
            <div class="flex {{$message != '' ? 'block' : 'hidden'}}">
                {!!$sharedComponents!!}
                {!!$facebookButton!!}
            </div>
        </div>
    </div>
</div>
