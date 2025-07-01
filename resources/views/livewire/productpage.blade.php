<div>
    <!--Product page Hero Secton-->
    <div
        class="relative bg-none lg:bg-[url('/public/frontend/Group-72981-img.svg')] min-h-[30vh] bg-[length:850px] bg-[90%_100%] bg-no-repeat flex flex-col justify-center">
        
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-[linear-gradient(to_left,_#E4ECFF,_#F0F0F0)] opacity-50 pointer-events-none z-0"></div>

        <!-- Content -->
        <div class="relative z-10 content container !w-full lg:!w-[1240px] px-6 lg:px-0">
            <div class="w-full lg:w-7/12 space-y-3">
            <div class="title">
                <h1 class="text-[#202020] text-3xl lg:text-[44px] leading-14 uppercase">
                Discover the Essence
                </h1>
            </div>
            <div>
                <p class="text-[16px] font-second w-full lg:w-[500px] text-[#424242]">
                Discover our range of aroma chemicals and natural scents, offering high-quality solutions to create captivating fragrances.
                </p>
            </div>
            </div>
        </div>
        
    </div>
    <!--End product page hero section-->
    <!--Product List-->

    <div class="container pt-10 pb-20 !w-full lg:!w-[1240px] px-6 lg:px-0">
        <div class="title">
            <h2 class="text-[#202020] text-[34px] leading-14">
                Our Product Range
            </h2>
        </div>
        <div class="flex lg:flex-row flex-col justify-between gap-5 mt-8 mb-8">
            <div>

                <div class="searchbar flex items-center relative w-auto lg:w-[500px]">
                    <input type="text" wire:model.live="search" placeholder="Search Chemicals, Specialties or Name..."
                        class="w-full bg-[#fff] border border-[#E2E2E2] h-[46px] appearance-none focus:border-[#E3E3E3] rounded-[50px] pl-6 pr-12 text-[#a8a8a8]" />
                    <!-- Search Icon -->
                    <button
                        class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-[#363636] hover:bg-[#000] text-white w-11 h-11 flex items-center justify-center rounded-l-none rounded-[30px]">
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35m1.9-5.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z" />
                        </svg>
                    </button>
                </div>

            </div>

            <div class="flex gap-2 new-right-button">

                <div class="button">
                    <a href="#"
                        class="font-light items-center bg-[#363636] text-white rounded-full px-4 py-2 hover:bg-[#4e4e4e] !border-[#4e4e4e] hover:text-white flex gap-2 group"
                        id="openDrawer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                        </svg>
                        Filters
                    </a>
                </div>

                <div class="button">
                    <a href="#" class="font-light items-center bg-[#363636] text-white rounded-full pl-4 pr-3 py-2 hover:bg-black hover:text-white flex">
                        Product List 
                        <div class="flex flex-co justify-center items-center p-1 ml-2 h-6 w-6 bg-white rounded-full" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="black" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                        </div>
                    </a>
                </div>




                <!-- Overlay -->
                <div id="overlay" class="fixed inset-0 blur-sm bg-opacity-50 backdrop-blur-sm hidden"></div>

                <!-- Start Drawer -->
                <div id="drawer" class="drawer flex flex-col h-full">

                    <div class="flex justify-between items-center bg-[#f5f5f5] px-5 py-3">
                        <div>
                            <p class="font-semibold text-xl">Filter</p>
                        </div>

                        <div>
                            <button id="closeDrawer" class="pb-2 hover:cursor-pointer">
                                <img class="w-6" src="{{ url('frontend/close-icon.svg') }}" />
                            </button>
                        </div>
                    </div>

                    <!-- Drawer content -->

                    <div class="flex-grow py-4 space-y-4 px-5 overflow-y-auto">
                        <button class="flex justify-between items-center w-full  font-semibold hover:cursor-pointer">
                            <span>Type</span>
                        </button>
                        <div class="font-light text-sm space-y-1">
                            @forelse($typeofchemical as $item)
                                <label class="block"><input type="checkbox" wire:model="selectedTypes"
                                        value="{{ $item }}" class="mr-2 accent-black" />
                                    {{ $item }}</label>
                            @empty
                            @endforelse
                        </div>

                        <hr>

                        <button class="flex justify-between items-center w-full  font-semibold hover:cursor-pointer">
                            <span>Manufacturer</span>
                        </button>
                        <div class="font-light text-sm space-y-1">
                            @forelse($manufuturer as $item)
                                <label class="block"><input type="checkbox" wire:model="selectedManufacturers"
                                        value="{{ $item }}" class="mr-2 accent-black" />
                                    {{ $item }}</label>
                            @empty
                            @endforelse
                        </div>
                    </div>


                    <!-- Fixed Apply button at the bottom -->
                    <div class="filter-footer-content text-center flex mt-4 p-5">
                        <a wire:click="applyFilters"
                            class="w-full place-content-center cursor-pointer  bg-[#202020] text-white !ml-0 p-2 rounded-md">
                            Apply
                        </a>
                    </div>
                </div>
                <!-- End Drawer -->

            </div>

        </div>

        <!-- Applied Filters Pills -->
        <div class="my-4 flex flex-wrap gap-2">
            @foreach ($appliedTypes as $type)
                <span class="px-3 py-1 border border-gray-200 text-sm rounded-sm">{{ $type }}</span>
            @endforeach

            @foreach ($appliedManufacturers as $manufacturer)
                <span class="px-3 py-1 border border-gray-200 text-sm rounded-sm">{{ $manufacturer }}</span>
            @endforeach

            @if (!empty($appliedTypes) || !empty($appliedManufacturers))
                <button wire:click="clearFilters" class="px-3 py-1 bg-black text-white text-sm rounded-sm">
                    Clear Filters
                </button>
            @endif
        </div>
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-4">
            <div class="w-full flex flex-row justify-between gap-2 mb-4">
                <div>
                    @foreach (['A-B', 'C-D', 'E-G', 'H-J', 'K-L', 'M-N', 'O-P', 'Q-R', 'S-U', 'V-Z'] as $range)
                        <button wire:click="$set('alphaFilter', '{{ $range }}')"
                            class="px-6 py-1 rounded-full border text-sm
                {{ $alphaFilter === $range ? 'bg-black text-white' : 'bg-[#8C8C8C] text-white border-gray-300' }}">
                            {{ $range }}
                        </button>
                    @endforeach
                </div>

                <div>
                    @if ($alphaFilter)
                        <button wire:click="$set('alphaFilter', null)"
                            class="px-3 py-1 bg-black text-white text-sm rounded-full flex items-center gap-2">
                            Clear
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>


            <!-- <div class="flex items-center gap-4 mb-2">
                <div>
                    <label class="text-sm">Sort by:</label>
                    <select wire:model.live="sortField" class="border px-2 py-1 rounded text-sm">
                        <option value="product_name">Product Name</option>
                        <option value="manufacturer">Manufacturer</option>
                    </select>
                </div>

                <div>
                    <select wire:model.live="sortDirection" class="border px-2 py-1 rounded text-sm">
                        <option value="asc">A - Z</option>
                        <option value="desc">Z - A</option>
                    </select>
                </div>
            </div> -->

        </div>


        <div class="overflow-x-auto">
            <table
                class="product-list-tbl table-auto bg-white w-full text-[#202020] border-[#D1D1D1] rounded-[18px] overflow-hidden">
                <thead class="bg-[#363636] text-white">
                    <tr>
                        <th class="w-[450px] lg:w-[600px] flex items-center">
                            Product Name
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 9l-7.5 7.5L4.5 9" />
                            </svg>
                        </th>
                        <th>Type</th>
                        <th class="lg:table-cell">Manufacturer</th>
                        <th class="min-w-[150px] lg:min-w-auto lg:table-cell">Inquire</th>
                    </tr>
                </thead>
                <tbody class="border border-[#E5E5E5]">
                    @foreach ($allproducts as $product)
                        <tr class="border-b last:border-none">
                            <td class="rounded-tl">
                                <a class="pl-link" href="{{ route('productinside', $product->slug) }}">
                                    <span
                                        class="max-w-[250px] lg:max-w-none">{{ ucwords($product->product_name) }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 eye-icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </a>
                            </td>
                            <td>{{ ucwords($product->producttype) }}</td>
                            <td class="lg:table-cell">{{ ucwords($product->manufacturer) }}</td>
                            <td class="lg:table-cell">
                                <a class="relative flex pb-0 font-normal transition-all duration-300 
                          before:block before:content-['']"
                                    href="{{ route('contactus') }}">
                                    Get in touch
                                    <div class="flex flex-co justify-center items-center h-6 w-6 bg-black rounded-full ml-1" >
                                        <svg width="9" height="9" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.53959 1.1346C7.65272 1.14457 7.75728 1.19904 7.83028 1.28604C7.90329 1.37305 7.93877 1.48547 7.92895 1.59862L7.50633 6.42908C7.50334 6.48656 7.48881 6.54285 7.46359 6.59459C7.43838 6.64632 7.403 6.69245 7.35957 6.73022C7.31614 6.76799 7.26554 6.79662 7.21081 6.81441C7.15607 6.8322 7.09831 6.83879 7.04097 6.83377C6.98364 6.82876 6.9279 6.81224 6.87708 6.78522C6.82626 6.75819 6.78141 6.72121 6.7452 6.67647C6.70899 6.63174 6.68216 6.58016 6.66631 6.52483C6.65046 6.4695 6.64592 6.41155 6.65295 6.35442L6.98541 2.55446L0.773647 7.76674C0.686572 7.83981 0.574038 7.87529 0.460802 7.86538C0.347566 7.85548 0.242903 7.80099 0.169839 7.71392C0.0967739 7.62684 0.0612923 7.51431 0.0711991 7.40107C0.081106 7.28784 0.13559 7.18317 0.222665 7.11011L6.43443 1.89782L2.63446 1.56537C2.57698 1.56238 2.5207 1.54784 2.46896 1.52263C2.41722 1.49741 2.37109 1.46203 2.33332 1.4186C2.29556 1.37517 2.26692 1.32458 2.24913 1.26984C2.23134 1.2151 2.22476 1.15734 2.22977 1.10001C2.23479 1.04267 2.2513 0.986932 2.27833 0.936116C2.30535 0.8853 2.34234 0.840448 2.38707 0.804236C2.43181 0.768023 2.48338 0.741192 2.53871 0.725343C2.59404 0.709494 2.652 0.704953 2.70912 0.711988L7.53959 1.1346Z" fill="white"/>
                                        </svg>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--End Product List-->

    @section('additionaljs')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Select all accordion headers
                const accordions = document.querySelectorAll(".accordion-header");

                accordions.forEach((header) => {
                    header.addEventListener("click", function() {
                        const content = this.nextElementSibling;
                        const icon = this.querySelector(".accordion-icon");

                        // Toggle the accordion content
                        if (content.classList.contains("hidden")) {
                            // Close all other accordions
                            document.querySelectorAll(".accordion-content").forEach((item) => item
                                .classList.add("hidden"));
                            document.querySelectorAll(".accordion-icon").forEach((icon) => icon
                                .classList.remove("rotate-180"));

                            content.classList.remove("hidden");
                            icon.classList.add("rotate-180");
                        } else {
                            content.classList.add("hidden");
                            icon.classList.remove("rotate-180");
                        }
                    });
                });
            });
        </script>


        <script>
            document.getElementById('openDrawer').addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('drawer').classList.add('open');
                document.getElementById('overlay').classList.remove('hidden');
            });

            document.getElementById('closeDrawer').addEventListener('click', function() {
                document.getElementById('drawer').classList.remove('open');
                document.getElementById('overlay').classList.add('hidden');
            });

            // Close drawer when clicking outside it
            document.getElementById('overlay').addEventListener('click', function() {
                document.getElementById('drawer').classList.remove('open');
                this.classList.add('hidden');
            });
        </script>



        <script>
            // ...existing code...
            document.getElementById('openDrawer').addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('drawer').classList.add('open');
            });

            document.getElementById('closeDrawer').addEventListener('click', function() {
                document.getElementById('drawer').classList.remove('open');
            });
            // ...existing code...
        </script>
    @endsection

</div>
