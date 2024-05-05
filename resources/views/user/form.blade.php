<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($user) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($user)
                            @method('put')
                        @endisset
                
                        <div class=" text-gray-950">
                            <x-input-label2 class="text-gray-950" for="name" value="Name" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$user->name ?? old('name')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="text-gray-900">
                            <x-input-label2 class="text-gray-900" for="email" value="Email" />
                            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="$user->email ?? old('email')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="text-gray-900">
                            <x-input-label2 class="text-gray-900" for="password" value="Password" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="$user->password ?? old('password')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>

                        {{-- <div class="text-gray-900">
                            <x-input-label2 class="text-gray-900" for="password" value="password" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="$user->password " required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div> --}}

                        <div class="text-gray-900">
                            <x-input-label2 class="text-gray-900" for="role" value="Role" />
                            <x-text-input id="role" name="role" type="text" class="mt-1 block w-full" :value="$user->role ?? old('role')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('role')" />
                        </div>


                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // create onchange event listener for featured_image input
        document.getElementById('featured_image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in featured_image_preview
                document.getElementById('featured_image_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>