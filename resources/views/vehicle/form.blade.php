<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($vehicle) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" action="{{ isset($vehicle) ? route('vehicle.update', $vehicle->id) : route('vehicle.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($vehicle)
                            @method('put')
                        @endisset
                
                        <div class=" text-gray-950">
                            <x-input-label2 class="text-gray-950" for="name" value="Name" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$vehicle->name ?? old('name')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="text-gray-900">
                            <x-input-label2 class="text-gray-900" for="transmission" value="Transmission Type" />
                            <x-text-input id="transmission_type" name="transmission_type" type="text" class="mt-1 block w-full" :value="$vehicle->transmission_type ?? old('transmission_type')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="text-gray-900">
                            <x-input-label2 class="text-gray-900" for="user_id" value="Driver ID" />
                            <x-text-input id="user_id" name="user_id" type="number" class="mt-1 block w-full" :value="$vehicle->user_id ?? old('user_id')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="text-gray-900">
                            <x-input-label2 class="text-gray-900" for="mileage" value="Mileage" />
                            <x-text-input id="mileage" name="mileage" type="number" class="mt-1 block w-full" :value="$vehicle->mileage ?? old('mileage')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('mileage')" />
                        </div>

                        <div class="text-gray-900">
                            <x-input-label2 class="text-gray-900" for="nameOfDriver" value="Name of Driver" />
                            <x-text-input id="name_of_driver" name="name_of_driver" type="text" class="mt-1 block w-full" :value="$vehicle->name_of_driver ?? old('name_of_driver')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('mileage')" />
                        </div>


                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        // create onchange event listener for featured_image input
        document.getElementById('featured_image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in featured_image_preview
                document.getElementById('featured_image_preview').src = URL.createObjectURL(file)
            }
        }
    </script> --}}
</x-app-layout>