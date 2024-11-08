<div class="">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Profile settings
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="index.html">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">Profile</li>
            </ol>
        </nav>
    </div>
    <div class="grid grid-cols-6 gap-8">
        <div class="col-span-6 xl:col-span-4">
            <div class="rounded-sm shadow-default border border-stroke bg-white dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">
                        Personal Information
                    </h3>
                </div>
                <div class="p-7 pt-0">
                    <form wire:submit="update">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full md:w-1/2 p-2">
                                <div class="mt-3">
                                    <x-input-label for="firstname" :value="__('First name')" />
                                    <x-text-input placeholder="Your first name" wire:model="firstname" id="firstname"
                                        class="block mt-1 w-full" type="text" name="firstname" required />
                                    <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 p-2"> <!-- Changed from mt-3 to p-2 -->
                                <div class="mt-3">
                                    <x-input-label for="lastname" :value="__('Last name')" />
                                    <x-text-input placeholder="Your last name" wire:model="lastname" id="lastname"
                                        class="block mt-1 w-full" type="text" name="lastname" required />
                                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 p-2"> <!-- Changed from mt-3 to p-2 -->
                                <div class="mt-3">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input placeholder="Your email" wire:model="email" id="email"
                                        class="block mt-1 w-full" type="email" name="email" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 p-2"> <!-- Changed from mt-3 to p-2 -->
                                <div class="mt-3">
                                    <x-input-label for="phone_number" :value="__('Phone number')" />
                                    <x-text-input placeholder="Your phone number" x-mask="99999 99999"
                                        wire:model="phone_number" id="phone_number" class="block mt-1 w-full"
                                        type="tel" name="phone_number" required />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap mt-5">
                            <a href="" wire:navigate class="flex ms-auto">
                                <x-secondary-button type="button" class="text-center  me-2 h-100">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                            </a>
                            <x-primary-button class="text-center">
                                {{ __('Update profile') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-span-6 xl:col-span-2">
            <div class="rounded-sm border border-stroke bg-white dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-7 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">
                        Your Photo
                    </h3>
                </div>
                <div class="p-7 pt-0 mt-4">
                    <form wire:submit="updateAvatar">
                        {{-- <div class="mb-4 flex items-center gap-3">
                            <div class="rounded-full">
                                <img :src="imagePreview" class="w-15 h-15 rounded-full object-cover"
                                    src="{{ $this->picture_url }}" alt="user photo">
                            </div>
                            <div>
                                <span class="mb-1.5 font-medium text-black dark:text-white">Edit your photo</span>
                                <label class="text-blue-600 cursor-pointer block" for="picture">Upload photo</label>
                            </div>
                        </div> --}}

                        {{-- <div id="FileUpload" @dragover.prevent @dragleave="dragging = false"
                            @drop.prevent="handleDrop($event)"
                            class="relative mb-5.5 block w-full cursor-pointer appearance-none rounded border border-dashed border-primary bg-gray px-4 py-4 dark:bg-meta-4 sm:py-7.5">
                            <input @change="fileChosen($event)" type="file" name="picture" wire:model="picture"
                                id="picture" accept="image/jpeg, image/png, image/webp, image/jpg"
                                class="absolute inset-0 z-50 m-0 h-full w-full cursor-pointer p-0 opacity-0 outline-none">
                            <div class="flex flex-col items-center justify-center space-y-3">
                                <span
                                    class="flex h-10 w-10 items-center justify-center rounded-full border border-stroke bg-white dark:border-strokedark dark:bg-boxdark">
                                    <box-icon name='upload' color="black"></box-icon>
                                </span>
                                <p class="text-sm font-medium">
                                    <span class="text-primary">Click to upload</span>
                                    or drag and drop
                                </p>
                                <p class="mt-1.5 text-sm font-medium">
                                    PNG, JPG, WEBP (max 2mb)
                                </p>
                            </div>
                        </div> --}}
                        <x-image-upload :default="$this->user->default_picture_url" :uploaded="$this->user->picture_url" :name="'picture'"></x-image-upload>

                        <div class="flex flex-wrap mt-5">
                            <a href="" wire:navigate class="flex ms-auto">
                                <x-secondary-button type="button" class="text-center  me-2 h-100">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                            </a>
                            <x-primary-button class="text-center">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<x-form-error :error="$errors" />