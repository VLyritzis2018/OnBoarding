@section('title','Guidance Teens Tips')
    {{-- Main Container --}}
    @php
            if(session()->missing('locale')){
                session()->put('locale','en');
            }
            if(session()->get('locale',''))
            {
                session()->put('locale',session()->get('locale' ?? 'en'));
            }
            $currentStep = session()->get('teensPageCurrentStep') ?? 1;
    @endphp
        <div class="w-full h-auto text-xs sm:text-base overflow-hidden">
        <div class="flex justify-center items-center mx-auto w-full h-full sm:h-screen relative">
        {{-- Next Button --}}
            @include('guidance-steps.goBack')
        {{-- Content Container --}}
        <div class="relative flex items-center flex-col w-4/5 h-[90vh] mainColor my-7">
            <div class="relative flex justify-center items-center sm:h-28 h-16 mt-6 mb-2 sm:my-4">
                <span class="material-symbols-rounded mainColor xs:text-6xl sm:text-7xl">volunteer_activism</span>
            </div>
            {{-- Steps Container --}}
            <div class="relative flex justify-center items-center flex-col h-130 sm:h-150 w-60 sm:w-72">
            {{-- Step 3 --}}
            @if ($currentStep == 1)
            @include('guidance-steps.step-one')
            @endif
            {{-- End of Step 2 --}}
            {{-- Step 3 --}}
            @if ($currentStep == 2)
                @include('livewire.age-category.step-two')
            @endif
            {{-- End of Step 3 --}}
            {{-- Step 4 for age 14 -17 --}}
            @if ($currentStep == 3)
                @include('guidance-steps.last-step')
            @endif
            </div>
            {{-- End of Steps Container --}}
            <div class="w-56 flex justify-center items-center {{$currentStep <= 3 ? 'block' : 'hidden'}}">
                <div class="flex justify-center items-center">
                    
                    @if ($currentStep == 1)
                    <div class="mx-2 w-4 h-4 bg-mainColor rounded-full mt-1"></div>
                    @else
                    <div class="mx-2 w-4 h-4 box-bg rounded-full mt-1"></div>
                    @endif
                    @if ($currentStep == 2)
                    <div class="mx-2 w-4 h-4 bg-mainColor rounded-full mt-1"></div>
                    @else
                    <div class="mx-2 w-4 h-4 box-bg rounded-full mt-1"></div>
                    @endif
                    @if ($currentStep == 3)
                    <div class="mx-2 w-4 h-4 bg-mainColor rounded-full mt-1"></div>
                    @else
                    <div class="mx-2 w-4 h-4 box-bg rounded-full mt-1"></div>
                    @endif
                </div>
            </div>
        </div>
        {{-- Stepper --}}
        <div class="static w-1/12 mt-4 sm:mt-0 flex justify-center pr-6 sm:pr-0 sm:justify-end items-center mainColor">
            <div>
                    <button type="button"  class="{{$currentStep < 3 ? 'block':'hidden'}}" wire:click="nextStep"><i class="fas fa-chevron-right fa-2x sm:fa-4x"></i></button>
            </div>
        </div>
    </div>
</div>
