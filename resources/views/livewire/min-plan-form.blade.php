@section('title','Onboarding Form')
@php
            if(session()->missing('locale')){
                session()->put('locale','en');
            }

            if(session()->get('locale',''))
            {
                session()->put('locale',session()->get('locale' ?? 'en'));
            }

@endphp
{{-- Main Container --}}
<div class="w-full h-auto xs:text-xs sm:text-base overflow-hidden">
{{-- Content Container --}}
    <div class="flex flex-row justify-center items-center mx-auto w-full h-full md:h-screen relative ">
        {{-- Back Icon--}}
        <div class="static w-1/12 mt-4 sm:mt-0 flex justify-center pl-6 sm:pl-0 sm:justify-start items-center mainColor">
            <div>
                <button type="button" class="{{$currentStep > 1  ? 'block':'hidden'}}" wire:click="goBack"><i class="fas fa-chevron-left fa-2x sm:fa-4x"></i></button>
            </div>
        </div>
        <div class="relative flex  items-center flex-col w-4/5 xs:h-160 sm:h-screen md:h-screen my-7">
    {{-- Form --}}
            <div class="relative md:mt-12 mt-4 xs:w-28 md:w-36 h-50">
                <img src="{{URL::asset('images/MP-LOGO-Final.png')}}" alt="Minplan Logo">
            </div> 
            {{-- Welcome Page --}}
            <div  class="relative flex justify-center items-center flex-col h-[60vh] sm:h-130 md:h-150 w-60 sm:w-72">
            <div class="w-auto {{$currentStep == 1 ? 'block' : 'hidden'}}" id="step-1">
                <div class="flex px-2 gap-2 mb-2 content-center justify-center ">
                    <div class="flex flex-col py-2 content-center justify-center ">
                        <p class="my-2 text-center w-18">
                            {{GoogleTranslate::trans('This form is used for research purposes, would be glad if you could cope with us.',session()->get('locale'))}}</p>
                    </div>
                </div>
            </div>
            <div class="w-auto {{$currentStep == 2 ? 'block' : 'hidden'}}" id="step-3">
                <div class="flex px-2 gap-2 mb-2 content-center justify-center ">
                    <div class="flex flex-col py-2 content-center justify-center ">
                        <div class="flex flex-col justify-center items-center pt-4">  
                            <label for="country" class="pb-2">{{GoogleTranslate::trans('Please tell us where are you from',session()->get('locale'))}}</label>
                            <select wire:model="country" id="country" class="box-bg  py-2 px-6 mt-6 rounded-full cursor-pointer border-0 block focus:ring-slate-500 focus:border-black xs:text-xs sm:text-sm md:text-base" name="country">
                                <option selected>{{GoogleTranslate::trans('Choose country',session()->get('locale'))}}</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Australia">Australia</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Iran">Iran</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Japan">Japan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Norway">Norway</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Spain">Spain</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Netherland">The Netherlands</option>
                                <option value="United Kingdom">United Kingdom</option>
                            </select>
                        </div>
                           
                    </div>
                </div>
                <div>
                    @error('country') <span class="error text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            {{-- End --}}
                {{-- Form Questions --}}    
                <div class="w-auto {{$currentStep == 3 ? 'block' : 'hidden'}} flex justify-center content-center" id="step-4">
                    <div class="flex px-2 content-center justify-center w-80 h-40">
                        <div class="radio-button flex flex-col py-2 content-center justify-center ">
                            <p class="my-2 text-center">What is your main priorities right now ?</p>
                            <input type="radio" id="invited" value="invited" name="priority" wire:model="priority" class="hidden">
                            <label for="invited" id="invited-label" class="border-[1px] border-gray-300 py-2 px-2 my-0.5 rounded-full text-center cursor-pointer hover:bg-gray-200 select-none">
                                    Invited by Someone
                            </label>                            
                            <input type="radio" value="needhelp" id="looking" name="priority" wire:model="priority" class="hidden ">
                            <label for="looking" class="border-[1px] border-gray-300 py-2 px-2 my-0.5 rounded-full text-center cursor-pointer hover:bg-gray-200 select-none">
                                    I Need Help Myself
                            </label> 
                            
                            <div class="text-center">
                                @error('priority') <span class="error text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>   
                        </div>
                        
                    </div>
                </div>
                {{-- Step 2 --}}
                <div class="w-auto {{$currentStep == 4 ? 'block' : 'hidden'}} flex flex-col justify-center content-center sm:" id="step-5">   
                    <div class="flex px-2 gap-2 mb-2 content-center justify-center">
                        <div class="radio-button flex flex-col py-2 content-center justify-center">
                            <p class="my-2 text-center">Tell us your age to let us help you better</p>

                            
                            <input type="radio" name="age" wire:model="age" value="14-17" class="hidden" id="age14to17">
                            <label @click =" showText = ! showText" for="age14to17" id="ageLabel" class="h-8 sm:h-10 border-[1px] border-gray-300 py-2 px-2 my-1 rounded-full text-center cursor-pointer hover:bg-gray-200">
                                    14-17
                            </label>
                            <input type="radio" name="age" wire:model="age" value="18-25" class="hidden" id="age18to25">
                            <label for="age18to25" class="h-8 sm:h-10 border-[1px] border-gray-300 py-2 px-2 my-1 rounded-full text-center cursor-pointer hover:bg-gray-200">
                                18 - 25
                            </label>
                            <input type="radio" value="26-39" name="age" wire:model="age" class="hidden" id="age26to39">
                            <label for="age26to39" class="h-8 sm:h-10 border-[1px] border-gray-300 py-2 px-2 my-1 rounded-full text-center  cursor-pointer hover:bg-gray-200">
                                26 - 39
                            </label>
                            <input type="radio" value="40-64" name="age" wire:model="age" class="hidden" id="age40to64">
                            <label for="age40to64" class="h-8 sm:h-10 border-[1px] border-gray-300 py-2 px-2 my-1 rounded-full text-center  cursor-pointer hover:bg-gray-200">
                                40 - 64
                            </label>
                            <input type="radio" value="65+" name="age" wire:model="age" class="hidden" id="age65">
                            <label for="age65" class="h-8 sm:h-10 border-[1px] border-gray-300 py-2 px-2 my-1 rounded-full text-center  cursor-pointer hover:bg-gray-200">
                               65+
                            </label>
                            
                            <div class="w-44 text-center">
                                @error('age') <span class="error text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                {{-- End of Step 2 --}}
                {{-- Step 3 --}}
                
                <div class="w-auto {{$currentStep == 5 ? 'block' : 'hidden'}}" id="step-6a">
                    @if ($priority === 'invited')
                    <div class="flex px-2 gap-2 mb-2 content-center justify-center ">
                        <div class="flex flex-col px-2 content-center justify-center">
                            <div>
                                <p class="my-2 text-center">Do you want to receive SMS when the person who invited you makes changes in the MinPlan App? </p>
                            </div>
                            <div class="radio-button flex px-2 content-center justify-evenly">
                                <input type="radio" value="yes" name="confirmSMS" id="smsYes" wire:model="confirmSMS" class="hidden">
                                <label for="smsYes" class="border-[1px] border-gray-300 py-2 px-2 my-1 rounded-full text-center  cursor-pointer hover:bg-gray-200 select-none selected">
                                    Yes
                                </label>
                                <input type="radio" value="no" id="smsNo" name="confirmSMS" wire:model="confirmSMS" class="hidden">
                                <label for="smsNo"class="border-[1px] border-gray-300 py-2 px-2 my-1 rounded-full text-center  cursor-pointer hover:bg-gray-200 select-none">
                                    No
                                </label>
                            </div>
                            @error('confirmSMS') <span class="error text-left text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                    </div>
                    
                    <div class="flex px-2 gap-2 mb-2 content-center justify-center ">
                        @if ($confirmSMS === 'yes')
                        <div class="flex flex-col px-2 content-center justify-center">
                            <p class="my-2 text-center">Please Provide us with your phone number.</p>
                            <input type="tel" wire:model.debounce.500ms="phoneNumber" class="w-full my-2 p-2 border rounded  @error('phoneNumber') border-red-500 @enderror"
                            placeholder="Enter Your Phone Number">
                            <div class="px-2">
                                @error('phoneNumber') <span class="error text-red-400 text-xs ">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif
            </div>
            
                {{-- End of Step 3 --}}
                {{-- Step 3 'needhelp' --}}
                
                <div class="w-auto {{$currentStep == 5 ? 'block' : 'hidden'}}" id="step-6b">
                @if ($priority === 'needhelp')
                <div class="flex px-2 gap-2 mb-2 content-center justify-center ">
                    <div class="radio-button flex flex-col px-2 content-center justify-center">
                        <div>
                            <p class="my-2 text-center">Do you want us to Provide you with a Safety Plan ? </p>
                        </div>
                        <div class="flex px-2 content-center justify-evenly">
                            <input type="radio" value="yes" id="planYes" name="confirmSaftyplan" wire:model="confirmSaftyplan" class="hidden">
                            <label for="planYes" class="border-[1px] border-gray-300 py-2 px-2 my-1 rounded-full text-center  cursor-pointer">
                                Yes
                            </label>
                            <input type="radio" value="no" id="planNo" name="confirmSaftyplan" wire:model="confirmSaftyplan" class="hidden">
                            <label for="planNo" class="border-[1px] border-gray-300 py-2 px-2 my-1 rounded-full text-center  cursor-pointer">
                                No
                            </label>
                        </div>

                        @error('confirmSaftyplan') <span class="error text-left text-red-400 text-xs">{{ $message }}</span> @enderror
                            
                    </div>
                    
                </div>
                
                <div class="flex px-2 gap-2 mb-2 ">
                    @if ($confirmSaftyplan === 'yes')
                    <div class="flex flex-col py-2">
                        <p class="my-2 text-center ">Please Provide us with your E-mail Address</p>
                            <input type="email" wire:model.debounce.1000ms="email" class="w-full my-2 p-2 rounded border  @error('email') border-red-500 @enderror"
                                placeholder="Enter Your Email">
                        <div class="px-2">
                            @error('email') <span class="error text-red-400 text-xs ">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                </div>
                
                {{-- End of Step 3 --}}
            {{-- Step Four --}}
        
        <div class="w-auto {{$currentStep == 6 ? 'block' : 'hidden'}}" id="step-7">
            @if ($priority === 'invited')
            <div class="flex px-2 gap-2 mb-2 content-center justify-center ">
                <div class="flex flex-col px-2 content-center justify-center"> 
                    <div>
                        <p class="my-2 text-center">What about receiving E-mails too ?</p>
                    </div>
                    <div class="radio-button flex px-2 content-center justify-evenly">
                        <input type="radio" value="yes" name="confirmEmail" id="emailYes" wire:model="confirmEmail" class="hidden">
                        <label for="emailYes" class="border-[1px] border-gray-300 py-2 px-2 my-1 rounded-full text-center  cursor-pointer">
                            Yes
                        </label>
                        <input type="radio" value="no" name="confirmEmail" id="emailNo" wire:model="confirmEmail" class="hidden">
                        <label for="emailNo" class="border-[1px] border-gray-300 py-2 px-2 my-1 rounded-full text-center  cursor-pointer">
                            No
                        </label>
                    </div>
                    <div class="px-2">
                        @error('confirmEmail') <span class="error text-red-400 text-xs ">{{ $message }}</span> @enderror
                    </div>
                </div>
                
            </div>
            <div class="flex px-2 gap-2 mb-2 content-center justify-center ">
                @if ($confirmEmail === 'yes')
                <div class="flex flex-col px-2 content-center justify-center">
                    <p class="my-2 text-center">{{GoogleTranslate::trans('Please Provide us with your E-mail Address',session()->get('locale'))}}</p>
                        <input type="email" wire:model.debounce.1000ms="email" class="w-full my-2 p-2 rounded border  @error('email') border-red-500 @enderror"
                            placeholder="Enter Your Email">
                    <div class="px-2">
                        @error('email') <span class="error text-red-400 text-xs ">{{ $message }}</span> @enderror
                    </div>
                </div>
                @endif
            </div>
            @endif
        </div>
    </div>
            {{-- End of Step Four --}}
            {{-- End of Steps --}}
            <div>
                <button type="button" class="{{$currentStep > 1 ? 'block':'hidden'}} mainColor" id="closeFormBtn" wire:click="clearForm"><i class="fas fa-times fa-2xl"></i></button>
            </div>
            <div class="w-44 flex justify-center items-center sm:mt-10 h-[20vh]">
                <div  class="flex justify-center items-center">
                        
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
                            @if ($currentStep == 4)
                            <div class="mx-2 w-4 h-4 bg-mainColor rounded-full mt-1"></div>
                            @else
                            <div class="mx-2 w-4 h-4 box-bg rounded-full mt-1"></div>
                            @endif
                            @if ($currentStep == 5)
                            <div class="mx-2 w-4 h-4 bg-mainColor rounded-full mt-1"></div>
                            @else
                            <div class="mx-2 w-4 h-4 box-bg rounded-full mt-1"></div>
                            @endif
                            @if ($currentStep == 6)
                            <div class="mx-2 w-4 h-4 bg-mainColor rounded-full mt-1"></div>
                            @else
                            <div class="mx-2 w-4 h-4 box-bg rounded-full mt-1"></div>
                            @endif
                            @if ($currentStep == 7)
                            <div class="mx-2 w-4 h-4 bg-mainColor rounded-full mt-1"></div>
                            @else
                            <div class="mx-2 w-4 h-4 box-bg rounded-full mt-1"></div>
                            @endif
                </div>
            </div>
            
        </div>
            {{-- Buttons --}}
        <div class="static w-1/12 mt-4 sm:mt-0 flex justify-center pr-6 sm:pr-2 sm:justify-end items-center mainColor">
            <div>
                {{-- Cancel --}}
                
                {{-- Next --}}
                <button type="button" class="{{$currentStep == 1 ? 'block':'hidden'}}" wire:click="welcomePage"><i class="fas fa-chevron-right fa-2xl "></i></button>
                <button type="button" class="{{$currentStep == 2 ? 'block':'hidden'}}" wire:click="getCountry"><i class="fas fa-chevron-right fa-2xl "></i></button>
                <button type="button" class="{{$currentStep == 3 ? 'block':'hidden'}}" wire:click="stepOne"><i class="fas fa-chevron-right fa-2xl "></i></button>
                <button type="button" class="{{$currentStep == 4 ? 'block':'hidden'}}" wire:click="stepTwo"><i class="fas fa-chevron-right fa-2xl "></i></button>
                <button type="button" class="{{$currentStep == 5 && $priority ==='invited' ? 'block':'hidden'}}" wire:click="stepThree"><i class="fas fa-chevron-right fa-2xl "></i></button>
                @if ($currentStep == 6)
                <button type="submit" wire:click="submit"><i class="fas fa-paper-plane fa-2xl text-green-400"></i></button>
                @endif
                @if ($priority == 'needhelp' && $currentStep == 5)
                <button type="submit" wire:click="submit"><i class="fas fa-paper-plane fa-2xl text-green-400"></i></button>
                @endif
            </div>
        </div>
        </div>
    </div>
    @push('scripts')
    <script>
        window.addEventListener('submit', function(event){
          Swal.fire({
          title:event.detail.title,
          icon:event.detail.icon,
          iconColor:event.detail.iconColor,
          timer: 3000,
          width:'24em',
          toast:true,
          position:'top-end',
          timerProgressBar:true,
          showConfirmButton:false,
      });
  })
  </script>
    @endpush
