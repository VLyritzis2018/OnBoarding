@section('title', 'Users Management')
<div x-data="{open:false}" class="w-full h-auto sm:h-full flex flex-col justify-center items-center" x-data="{show: false}">
    {{-- Title and Buttons --}}
    <div class="flex flex-col md:flex-row mt-4 mx-4 md:justify-between md:w-[95%]" >
        <div class="flex flex-col mt-2 w-auto md:w-2/6 h-auto items-start md:ml-8 bg-slate-100 rounded-md md:py-1 p-0.5 md:pl-6 md:mb-6">
            <span class="text-base md:text-xl">System Users</span>
            <span class="text-xs md:text-sm">All system users</span>
        </div>
        <div class="flex justify-evenly md:justify-end mt-2 md:w-3/6 w-auto h-auto items-center md:ml-4 rounded-md md:py-1 md:pl-6 md:mb-6">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 md:font-medium rounded-md md:rounded-lg text-xs md:text-sm px-3 py-2 md:px-5 md:py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" x-on:click="open = ! open">
                <i class="fas fa-plus"></i>
                <span class="pl-1">Add Record</span>
            </button>
        </div>
    </div>
    @if ($updateMode)
    <div x-show="open" x-transition x-cloak class="w-11/12 flex flex-col justify-center bg-gray-50 rounded-md m-6 py-4 px-6 drop-shadow-lg">
        <span class="border-b py-1 font-bold uppercase mb-3">Edit User</span>
        <form class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text"  id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="name" />
                    
                    <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">User Name</label>
                    @error('name') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="email"  id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="email" />
                    <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                    @error('email') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <button 
            x-data @store.window ="open = false"
            wire:click.prevent="update" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-blue-800">Update</button>
            <button x-on:click="open = false" wire:click.prevent="cancel" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 ml-1 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Cancel</button>

        </form>
        
    </div>
    @else
    <div x-show="open" x-transition x-cloak class="w-11/12 flex flex-col justify-center bg-gray-50 rounded-md m-6 py-4 px-6 drop-shadow-lg">
        <span class="border-b py-1 font-bold uppercase mb-3">Create New Users</span>
        <form class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text"  id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="name" />
                    
                    <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">User Name</label>
                    @error('name') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="email"  id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="email" />
                    <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                    @error('email') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <button 
            x-data @store.window ="open = false"
            wire:click.prevent="store" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
        
    </div>
    @endif

    {{-- Table Content --}}
    <div class="flex md:justify-center md:w-full min-h-fit">
    @if ($users->isEmpty())
    <div class="h-[70vh] flex justify-center items-center">
        <span class="text-3xl text-gray-300 font-bold">No Records <i class="fa fa-table"></i></span>
    </div>
    @else 
    <div class="w-fit md:w-[95%] h-auto bg-slate-50 rounded-md flex md:justify-center md:items-center md:ml-8 overflow-x-auto">
    <table class="table-auto w-3/5 md:w-11/12 text-xs md:text-sm text-left text-gray-500 dark:text-gray-400 m-2 drop-shadow-sm">
        <thead class="text-center text-xs text-gray-700 uppercase bg-blue-400 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="p-1">Name</th>
            <th scope="col" class="p-1">Email</th>
            <th scope="col" class="p-1">Actions</th>
          </tr>
        </thead>
        <tbody>  
            @foreach ($users as $data)
                 <tr wire:key="data-{{$data->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                    <td class="p-1">{{$data->name}}</td>
                    <td class="p-1">{{$data->email}}</td>
                    <td class="p-1">
                        <button x-on:click="open = true" type="button"  class="font-bold text-blue-600 dark:text-blue-500 m-1" wire:click="edit({{$data->id}})"><i class="fas fa-edit"></i></button>
                        <button type="button" class="font-bold text-red-600 dark:text-red-500 m-1" wire:click="deleteConfirm({{$data->id}})"><i class="fas fa-trash-alt"></i></button>
                    </td>
                 </tr>
            @endforeach
            
        </tbody>
    </table>
    @endif
</div>
</div>
    {{-- Pageination --}}
      <div class="px-16 my-4">
        {{$users->links()}}
      </div>
</div>
<script src="{{asset('js/emergencyAlerts.js')}}"></script>