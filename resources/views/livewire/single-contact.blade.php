@section('title')
    {{$contact->name}}
@endsection
<div class="w-full h-screen">
    <div class="flex flex-row justify-center items-center mx-auto w-full h-full md:h-screen relative text-xs md:text-base">
        <div class="flex items-center flex-col">
            <div class="bg-gray-100 flex flex-col rounded-md p-4 w-4/6 h-5/6">
                <div class="flex flex-col items-center text-slate-700">
                    <span><i class="fas fa-clinic-medical pr-1 mb-5"></i>{{$contact->name}}</span>
                    <div class="flex flex-col my-3 gap-y-3">
                        <span><i class="fas fa-phone mr-1"></i><a href="tel:+{{$contact->phone}}">{{$contact->phone ?? 'No Contact to show'}}</a></span>
                        <span><i class="fas fa-globe mr-1"></i><a href="{{$contact->website}}" class="text-blue-500" target="_blank" rel="noopener noreferrer">{{$contact->website}}</a></span>
                        <span><i class="fas fa-map-marked-alt mr-1"></i><a href="https://www.google.com/maps/search/{{$contact->address}}">{{$contact->address}} {{$contact->post_code}}</a> </span>
                        <span><i class="fas fa-map-marker-alt mr-1"></i> {{$contact->city}}</span>
                        <span><i class="fas fa-at mr-1"></i><a href="mailto:{{$contact->email}}" class="text-blue-500">{{$contact->email ?? 'No e-mail to show'}}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
