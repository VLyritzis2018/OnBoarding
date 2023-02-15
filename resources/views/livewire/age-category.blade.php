@section('title','Guidance Tips')
    {{-- Main Container --}}
    @php
            if(session()->missing('locale')){
                session()->put('locale','en');
            }
            if(session()->get('locale',''))
            {
                session()->put('locale',session()->get('locale' ?? 'en'));
            }
    @endphp
<div class="flex justify-center items-center mx-auto w-full h-full sm:h-screen relative">
    <div class="relative flex items-center flex-col w-4/5 h-[90vh] mainColor my-7">
            <div class="relative flex justify-center items-center sm:h-28 h-16 mt-6 mb-2 sm:my-4">
                <span class="material-symbols-rounded mainColor text-7xl sm:text-8xl">volunteer_activism</span>
            </div>
            {{-- Steps Container --}}
        <div class="relative flex justify-center items-center">
            {{-- Step 1 --}}
            <div class="w-auto flex flex-col justify-center content-center text-xs sm:text-sm">  
                <div class="flex px-2 gap-2 mb-2 content-center justify-center flex-col items-center">
                    <div class="radio-button flex flex-col py-2 justify-center items-center">
                        <p class="my-2 text-center w-52">{{GoogleTranslate::trans('Select your age, so that we can guide you accordingly to it',session()->get('locale'))}}</p>
                        <a  wire:click="$set('age', '14-17')" >
                            <input type="radio" name="teens" id="teens" wire:click="setAge">
                            <label for="teens" class="h-12 w-[219px] sm:h-12 border-[1px] border-gray-300  my-1 rounded-full cursor-pointer hover:bg-gray-200 text-center py-3.5" >14 - 17</label>
                        </a>
                        <a  wire:click="$set('age', '18-25')">
                            <input type="radio" name="teens" id="youngAdults" wire:click="setAge">
                            <label for="youngAdults" class="h-12 w-[219px] sm:h-12 border-[1px] border-gray-300  my-1 rounded-full cursor-pointer hover:bg-gray-200 text-center py-3.5" >18 - 25</label>
                        </a>
                        <a  wire:click="$set('age', '26-39')">
                            <input type="radio" name="adults" id="adults" wire:click="setAge">
                            <label for="adults" class="h-12 w-[219px] sm:h-12 border-[1px] border-gray-300  my-1 rounded-full cursor-pointer hover:bg-gray-200 text-center py-3.5" >26 - 39</label>
                        </a>
                        <a  wire:click="$set('age', '40-64')">
                            <input type="radio" name="oldAdults" id="oldAdults" wire:click="setAge">
                            <label for="oldAdults" class="h-12 w-[219px] sm:h-12 border-[1px] border-gray-300  my-1 rounded-full cursor-pointer hover:bg-gray-200 text-center py-3.5" >40 - 64</label>
                        </a>
                        <a  wire:click="$set('age', '65+')">
                            <input type="radio" name="ouders" id="ouders" wire:click="setAge">
                            <label for="ouders" class="h-12 w-[219px] sm:h-12 border-[1px] border-gray-300  my-1 rounded-full cursor-pointer hover:bg-gray-200 text-center py-3.5" >65 +</label>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
