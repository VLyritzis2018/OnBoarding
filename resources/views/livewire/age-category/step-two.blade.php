@php
     $country = session()->get('country');
@endphp
<div x-data="{open:false}" class="relative flex flex-col items-center text-xs sm:text-base">
    <p class="mb-5 text-center sm:w-80 w-52">{{GoogleTranslate::trans('There are many hotlines and safe spaces that offer support',session()->get('locale'))}}</p>
    <p class="mb-5 text-center sm:w-80 w-52">{{GoogleTranslate::trans('Some organizations provide anonymous services',session()->get('locale'))}}</p>
    <div x-on:click="open = ! open" class="block bg-emergency hover:cursor-pointer hover:bg-orange-400 text-slate-800 my-1 p-2 rounded-lg">
        <p>{{GoogleTranslate::trans('Show Contacts',session()->get('locale'))}}</p>
    </div>
    <div x-show="open" x-cloak x-transition class="h-screen w-full z-50 absolute top-0 inset-0">
        {{-- Contact Info  --}}
        <div class="flex flex-col absolute top-0 left-0 z-50 h-screen w-full justify-end items-center">
            {{-- Close Button --}}
            <div x-on:click="open = ! open" class="text-gray-700 text-3x absolute inset-x-0 top-0 flex justify-center items-center mt-1 z-50 hover:cursor-pointer w-full">x</div>
            <div class="flex flex-col justify-center items-center bg-slate-50 w-full h-full animate__animated animate__fadeInUp rounded-t-lg">
                @if ($emergency_data->isEmpty())
                <div class="relative flex items-center justify-center text-white text-center w-72 text-xs">
                    <p class="py-2 px-3 bg-red-500 rounded-md">{{GoogleTranslate::trans('No Emergency contacts available for the country provided.',session()->get('locale'))}}</p>
                </div>
                @else
                <div class="flex w-full h-full items-center flex-col text-center text-xs sm:text-sm  my-4">
                    <p class="my-1 text-sm md:text-lg ">{{GoogleTranslate::trans('Emergency Contacts in ', session()->get('locale'))}} <span class="text-slate-500">{{session()->get('country')}}</span> </p>
                    <div class="grid grid-cols-1 gap-1 md:gap-2 w-11/12">
                        @foreach ($emergency_data as $data)
                            <div  wire:key="contact-{{$data->id}}" class="flex flex-col w-full h-24 bg-gray-100 rounded-lg p-3">
                                <div class="text-gray-700 md:text-sm text-xs">{{$data->name}}</div>
                                <div class="flex flex-col justify-evenly items-center w-full text-[10px] md:text-sm">
                                    <span class="text-gray-500">{{$data->phone}}</span>
                                    <a href="{{$data->website}}" target="_blank" ><span class="text-blue-500">{{$data->website}}</span></a> 
                                </div>
                                <a href="/help/contact/{{$data->id}}" target="_blank" class="text-gray-400 text-xs py-0.5"><span>{{GoogleTranslate::trans('Show all information ', session()->get('locale'))}}</span></a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            
        </div>
    </div>
</div>
