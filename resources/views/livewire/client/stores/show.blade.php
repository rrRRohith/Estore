<div class="">
    @php
        $pageTitle = $store->name;
        $navigationLinks = [
            ['text' => 'Dashboard', 'link' => roleRoute('{role}.index')],
            ['text' => 'Stores', 'link' => roleRoute('{role}.stores.index')],
            ['text' => 'Store Details', 'link' => ''],
        ];
        $pageDescription = '';
        $rightSideBtnText = 'Back to List';
        $rightSideBtnRoute = roleRoute('{role}.stores.index');
    @endphp
    <x-admin-breadcrumb :pageTitle=$pageTitle :navigationLinks=$navigationLinks :pageDescription=$pageDescription
        :rightSideBtnText=$rightSideBtnText :rightSideBtnRoute=$rightSideBtnRoute />
    <div
        class="overflow-hidden rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="relative z-20 h-35 sm:h-44">
            <img src="https://ui-avatars.com/api//?background=9e9e9e&color=fff&name=" alt="profile cover"
                class="h-full w-full rounded-tl-sm rounded-tr-sm object-cover object-center" />

        </div>

        <div class="px-4 pb-6 text-center lg:pb-8 xl:pb-11.5">
            <div
                class="relative z-30 mx-auto -mt-22 h-30 w-full max-w-30 rounded-full bg-white/20 p-1 backdrop-blur sm:h-44 sm:max-w-44 sm:p-3">
                <div class="relative drop-shadow-2">
                    <img src="{{ $store->logo_url }}" class="rounded-full w-full" alt="Brand">
                </div>
            </div>
            <div class="mt-4">
                <h3 class="mb-1.5 text-2xl font-medium text-black dark:text-white capitalize">
                    {{ $store->name }}
                </h3>
                <div><i class="font-medium capitalize">{{ $store->address }} {{ $store->city }}</i></div>

                <div
                    class="mx-auto mb-5.5 mt-4.5 grid max-w-xl grid-cols-2 rounded-md border border-stroke py-2.5 shadow-1 dark:border-strokedark dark:bg-[#37404F]">

                    <div
                        class="flex flex-row gap-2 items-center justify-center  border-r border-stroke px-4 dark:border-strokedark xsm:flex-row">
                        <span class="font-semibold mt-2">
                            <box-icon name='phone-call'></box-icon>
                        </span>
                        <a href="tel:{{ $store->phone }}" class="text-black dark:text-white outline-none ">

                            {{ $store->phone }}
                        </a>
                    </div>
                    <div
                        class="flex flex-row gap-2 items-center justify-center  border-r border-stroke px-4 dark:border-strokedark xsm:flex-row">
                        <span class="font-semibold mt-2">
                            <box-icon name='envelope'></box-icon>
                        </span>
                        <a href="mailto:{{ $store->email }}" class="text-black dark:text-white outline-none ">

                            {{ $store->email }}
                        </a>
                    </div>
                </div>


                <div class="mx-auto max-w-180 mt-5">
                    <div class="flex flex-col gap-2 items-center  ">
                        <p class="mt-4.5 text-sm font-normal">
                            Store Created : {{ $store->created_at }}
                        </p>
                    </div>
                </div>
                <div class="mx-auto max-w-180 mt-5">
                    <div class="flex flex-row gap-2 justify-center  items-center">
                        Store Status :
                        <p
                            class="inline-flex rounded-full {{ $store->status == 1 ? 'bg-success' : 'bg-danger' }}  bg-opacity-10 px-3 py-1 text-sm font-medium {{ $store->status == 1 ? 'text-success' : 'text-danger' }}">
                            {{ $store->status_label }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
