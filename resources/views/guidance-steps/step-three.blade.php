<div class="relative flex flex-col items-center text-start text-xs sm:text-base">
                            
    <p class="mb-2 sm:mb-4 sm:w-80 w-60 text-center text-black">
        {{GoogleTranslate::trans("Often a crisis is a result of difficult situation you can't cope with.",session()->get('locale'))}}
    </p>
    
<div class="flex flex-col sm:w-80 w-60 text-black">
    <p class="leading-loose text-center underline underline-offset-4 decoration-2 decoration-gray-400 my-8">
        {{GoogleTranslate::trans('It can be:',session()->get('locale'))}}
    </p>
    
    <p class="leading-loose flex"><span class="px-1 material-icons-round mainColor text-sm font-bold sm:text-md sm:pt-1">check</span>
        {{GoogleTranslate::trans('A stressfull life event',session()->get('locale'))}}</p>
    <p class="leading-loose flex"><span class="px-1 material-icons-round mainColor text-sm font-bold sm:text-md sm:pt-1">check</span>
        {{GoogleTranslate::trans('The loss of a loved one',session()->get('locale'))}}</p>
    <p class="leading-loose flex"><span class="px-1 material-icons-round mainColor text-sm font-bold sm:text-md sm:pt-1">check</span>
        {{GoogleTranslate::trans('Experiencing abuse',session()->get('locale'))}}</p>
    <p class="leading-loose flex"><span class="px-1 material-icons-round mainColor text-sm font-bold sm:text-md sm:pt-1">check</span>
        {{GoogleTranslate::trans('Suffering from health issues',session()->get('locale'))}}
    </p>
    <p class="leading-loose flex"><span class="px-1 material-icons-round mainColor text-sm font-bold sm:text-md sm:pt-1">check</span>
        {{GoogleTranslate::trans('Being a victim of violece',session()->get('locale'))}}
    </p>
    <p class="leading-loose flex"><span class="px-1 material-icons-round mainColor text-sm font-bold sm:text-md sm:pt-1">check</span>
        {{GoogleTranslate::trans('Experiencing family problems',session()->get('locale'))}}
    </p>
    <p class="leading-loose flex"><span class="px-1 material-icons-round mainColor text-sm font-bold sm:text-md sm:pt-1">check</span>
        {{GoogleTranslate::trans('Experiencing financial difficulties',session()->get('locale'))}}
    </p>
</div>
</div>
