@section('title','Help Care')
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
        <div x-data="{open:false}" class="w-full h-auto text-sm md:text-base overflow-hidden emergencyColor">
        <div class="flex flex-row justify-center items-center mx-auto w-full h-full md:h-screen relative text-xs md:text-base">
            {{-- Content Container --}}
        <div class="static w-1/12 mt-4 sm:mt-0 flex justify-center pl-6 sm:pl-0  sm:justify-start items-center">
            <div>
                <button type="button"  class="{{$currentStep > 1 ? 'block':'hidden'}}" wire:click="stepBack"><i class="fas fa-chevron-left fa-2x sm:fa-4x"></i></button>
            </div>
        </div>
        <div class="relative flex items-center flex-col w-4/5 h-[90vh] my-7">
            <div class="relative flex justify-center items-center h-28 sm:h-16 mt-6 mb-2 sm:my-4">
                <span class="material-icons-outlined text-7xl sm:text-8xl">health_and_safety</span>
            </div>
            {{-- Steps Container --}}
            <div class="relative flex justify-center items-center flex-col h-[80vh] w-auto">
            {{-- Step 1 --}}
            <div class="static text-xs flex flex-col items-center {{$currentStep == 1 ? 'block' : 'hidden'}}">
                
                <div class="flex flex-col items-center justify-center sm:text-base w-60 sm:w-64 h-44 text-center">
                    <p class="py-2 leading-5 text-center">{{GoogleTranslate::trans('Think about your sorrundings',session()->get('locale'))}}</p>
                    <p class="py-4 leading-5">{{GoogleTranslate::trans('The goal is to reduce access to resources which can be harmful',session()->get('locale'))}}</p>
                    <p class="py-2 leading-5 text-center w-60" style="color: rgba(66, 192, 183, 1);">{{GoogleTranslate::trans("Press the items you've already secured:",session()->get('locale'))}}</p>
                </div>
                <div class="grid grid-cols-2 grid-rows-3 gap-x-1 items-center justify-center text-xs my-6" style="color: #476F6C">
                        <a id="rope" class="px-4 py-2 rounded-full bg-notSelected my-1 ">{{GoogleTranslate::trans('String ropes',session()->get('locale'))}}</a>
                        <a id="alcohol" class="px-4 py-2 rounded-full bg-notSelected my-1 ">{{GoogleTranslate::trans('Alcohol',session()->get('locale'))}}</a>
                        <a id="med" class="px-4 py-2 rounded-full bg-notSelected my-1">{{GoogleTranslate::trans('Medication',session()->get('locale'))}}</a>
                        <a id="razor" class="px-4 py-2 rounded-full bg-notSelected my-1">{{GoogleTranslate::trans('Razor',session()->get('locale'))}}</a>
                        <a id="sharp" class="px-4 py-2 rounded-full bg-notSelected my-1 ">{{GoogleTranslate::trans('Sharp objects',session()->get('locale'))}}</a>
                        <a id="firearms" class="px-4 py-2 rounded-full bg-notSelected my-1 ">{{GoogleTranslate::trans('Firearms',session()->get('locale'))}}</a>
                </div>
                <div class="flex flex-col items-center justify-center text-xs sm:text-sm md:text-base">
                    <p class="py-1 text-center w-64">{{GoogleTranslate::trans('Move away from places that trigger you',session()->get('locale'))}}</p>
                </div>
            </div>
            {{-- End of Step 1 --}}
            {{-- Step 3 --}}
            <div class="relative flex flex-col items-center {{$currentStep == 2 ? 'block' : 'hidden'}} text-start">
                <p class="mb-10 w-60 sm:w-80">{{GoogleTranslate::trans("Don´t be afraid to ask yourself the following questions:",session()->get('locale'))}}</p>
                <div class="flex flex-col gap-y-4 w-60 sm:w-80">
                    <p class="leading-5">{{GoogleTranslate::trans('Can the situation still be harmful?',session()->get('locale'))}}</p>
                    <p class="leading-5">{{GoogleTranslate::trans('Can I cope with this alone?',session()->get('locale'))}}</p>
                    <p class="leading-5">{{GoogleTranslate::trans('Is there a risk of self-harm?',session()->get('locale'))}}</p>
                    <p class="leading-5">{{GoogleTranslate::trans('Who can help in this situation?',session()->get('locale'))}}</p>
                </div>
            </div>
            {{-- End of Step 2 --}}
            {{-- Step 3 --}}
            <div class="relative flex flex-col items-center {{$currentStep == 3 ? 'block' : 'hidden'}}">
                <p class="mb-10 w-60">{{GoogleTranslate::trans('Please make sure that you:',session()->get('locale'))}}</p>
                <div class="w-60">
                    <ul class="list-disc list-inside">
                        <li class="py-1">{{GoogleTranslate::trans('Stay as calm as possible',session()->get('locale'))}}</li>
                        <li class="py-1">{{GoogleTranslate::trans('Acknowlegde that your feelings are valid',session()->get('locale'))}}</li>
                        <li class="py-1">{{GoogleTranslate::trans('Refrain from acting upon those feelings',session()->get('locale'))}} </li>
                        <li class="py-1">{{GoogleTranslate::trans('Avoid confrontation',session()->get('locale'))}}</li>
                        <li class="py-1">{{GoogleTranslate::trans('There will be a way, even if it seems impossible',session()->get('locale'))}}</li>
                    </ul>
                </div>
            </div>
            {{-- End of Step 3 --}}
            {{-- Step 4 --}}
            <div  class="relative flex flex-col items-center justify-evenly {{$currentStep == 4 ? 'block' : 'hidden'}}">
                <div class="relative flex flex-col gap-y-3 w-60 sm:w-80 text-center my-3">
                    <div>
                        <p>{{GoogleTranslate::trans('Please reach out for help if you can´t cope with your feelings alone',session()->get('locale'))}} </p>
                    </div>
                    <div>
                        <p>{{GoogleTranslate::trans('Contact somebody in your network that you trust or use the professional assistance below',session()->get('locale'))}}</p>
                    </div>
                    <div>
                        <p>{{GoogleTranslate::trans('You can find directions to the nearest emergency department in Minplan App',session()->get('locale'))}}</p>
                    </div>
                </div>
                <div x-on:click="open = ! open" class="hidden sm:block bg-emergency hover:cursor-pointer hover:bg-orange-400 text-slate-800 my-1 p-2 rounded-lg">
                    <p x-text="open ? 'Hide Contacts' : 'Show Contacts'"></p>
                </div>
                <div class="relative sm:hidden {{$phoneNumber == NULL ? '' : ' grid-cols-3 gap-x-4'}} grid h-32 w-48 justify-items-center content-center">
                    @if ($phoneNumber !== NULL)                    
                        <span x-on:click="open = ! open">
                            <img src="{{URL::asset('/images/Helpline.svg')}}" alt="Helpline">
                        </span>
                        
                    @endif
                    <a href="tel:112">
                        <img src="{{URL::asset('/images/Emergency Calls.svg')}}" alt="Emergency Calls">
                    </a>
                    <a href="/downloadApp" target="_blank"><img class="w-24 sm:w-full transition ease-in-out delay-150 hover:translate-y-1" src="{{URL::asset('/images/MinplanApp.svg')}}" alt="Minplan App"></a>
                </div>
                
            </div>
            {{-- End of Step 4 --}}
            </div>
            {{-- End of Steps Container --}}
            <div class="w-44 flex justify-center items-center sm:mt-10 h-[10vh]">
                <div class="flex justify-center items-center">
                    
                        @if ($currentStep == 1)
                        <div class="mx-2 w-4 h-4 bg-amber-300 rounded-full mt-1"></div>
                        @else
                        <div class="mx-2 w-4 h-4 bg-orange-100 rounded-full mt-1"></div>
                        @endif
    
                        @if ($currentStep == 2)
                        <div class="mx-2 w-4 h-4 bg-amber-300 rounded-full mt-1"></div>
                        @else
                        <div class="mx-2 w-4 h-4 bg-orange-100 rounded-full mt-1"></div>
                        @endif
    
                        @if ($currentStep == 3)
                        <div class="mx-2 w-4 h-4 bg-amber-300 rounded-full mt-1"></div>
                        @else
                        <div class="mx-2 w-4 h-4 bg-orange-100 rounded-full mt-1"></div>
                        @endif
                        @if ($currentStep == 4)
                        <div class="mx-2 w-4 h-4 bg-amber-300 rounded-full mt-1"></div>
                        @else
                        <div class="mx-2 w-4 h-4 bg-orange-100 rounded-full mt-1"></div>
                        @endif
                </div>
            </div>
        </div>
        {{-- Stepper --}}
        <div class="static w-1/12 mt-4 sm:mt-0 flex justify-center pr-6 sm:pr-0 sm:justify-end items-center">
            <div>
                <button type="button" class="{{$currentStep <= 3 ? 'block':'hidden'}}" wire:click="nextStep"><i class="fas fa-chevron-right fa-2x sm:fa-4x "></i></button>
            </div>
        </div>
     </div>
     <div x-show="open" x-cloak x-transition class="h-screen w-full z-30 absolute top-0 inset-0">
        {{-- Black Screen --}}
        <div x-on:click="open = ! open" class="bg-gray-700 h-screen w-full opacity-50 z-40 absolute top-0 left-0"></div>
        
        {{-- Contact Info  --}}
        <div class="flex flex-col absolute top-0 left-0 z-50 h-screen w-full justify-end items-center">
            {{-- Close Button --}}
            <div x-on:click="open = ! open" class="text-white text-3x absolute inset-x-0 top-0 flex justify-center items-center mt-4 z-50 hover:cursor-pointer w-full">x</div>
            <div class="flex flex-col justify-start items-center bg-slate-50 w-4/5 h-5/6 animate__animated animate__fadeInUp rounded-t-lg">
                @if ($emergency_data->isEmpty())
                <div class="relative flex items-center justify-center text-white text-center w-72 text-xs">
                    <p class="py-2 px-3 bg-red-500 rounded-md">{{GoogleTranslate::trans('No Emergency contacts available for the country provided.',session()->get('locale'))}}</p>
                </div>
                @else
                <div class="flex w-full h-150 items-center flex-col text-center text-xs sm:text-sm  my-4 overflow-y-scroll">
                    <p class="my-1 text-sm md:text-lg ">{{GoogleTranslate::trans('Emergency Contacts in ', session()->get('locale'))}} <span class="text-slate-500">{{session()->get('country')}}</span> </p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-1 md:gap-4 w-11/12">
                        @foreach ($emergency_data as $data)
                            <div  wire:key="contact-{{$data->id}}" class="flex flex-col w-full h-20 bg-gray-100 rounded-lg p-3">
                                <div class="text-gray-700 md:text-base text-sm">{{$data->name}}</div>
                                <div class="flex justify-evenly items-center w-full text-[10px] md:text-sm">
                                    <span class="text-gray-500">{{$data->phone}}</span>
                                    <span class="text-gray-400">{{$data->city}}</span>
                                    <a href="{{$data->website}}" target="_blank" ><span class="text-blue-500">{{$data->website}}</span></a> 
                                </div>
                                <a href="help/contact/{{$data->id}}" target="_blank" class="text-gray-400 text-xs py-1"><span>{{GoogleTranslate::trans('Show all information ', session()->get('locale'))}}</span></a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="mx-3 mb-2 bg-emergency p-1 rounded-md text-xs md:text-sm md:w-11/12 text-center">
                    <a href="{{route('Guidance')}}" class="text-slate-800">Please tell us your age for better guidance</a>
                </div>
            </div>
            
        </div>
    </div>
    </div>
<script src="{{asset('js/helpPage.js')}}"></script>
