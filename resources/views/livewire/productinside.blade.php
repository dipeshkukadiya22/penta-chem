<div class="bg-[#F9F9F9]">
    <div class="container py-10 flex flex-col lg:flex-row justify-between px-6 lg:px-0 gap-2">
        <div class="productname">
            <h3 class="font-medium lg:text-[26px] text-[20px]">
                Product Name: {{ $product->product_name }}
            </h3>
            <h3 class="font-medium lg:text-[26px] text-[20px]">
                Make: {{ $product->manufacturer }}
            </h3>
        </div>

        <div class="button">
            <a class="font-light items-center bg-[#363636] text-white rounded-full pl-4 pr-3 py-2 w-[250px] lg:w-auto flex flex-row gap-1.5 px-5 cursor-pointer" wire:click="$dispatch('openPopupDownload')">
                Technical Specifications
                <div class="flex flex-co justify-center items-center p-1 ml-2 h-6 w-6 bg-white rounded-full" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="black" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                </div>
            </a>
        </div>

        <!-- Popup Modal -->
        <div id="popupModaldownload" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white p-4 rounded-lg lg:w-1/3 w-full lg:p-8 !mx-10 lg:mx-auto">
                <h2 class="text-xl font-bold mb-4">Download Process</h2>
                <form wire:submit.prevent="formSubmit">
                    <div class="mb-4">
                        <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" id="firstName" wire:model="firstname"
                            class="mt-1 pl-3 py-2 block w-full border border-gray-300 shadow-sm" required />
                    </div>
                    <div class="mb-4">
                        <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" id="lastName" wire:model="lastname"
                            class="mt-1 pl-3 py-2 block w-full border border-gray-300 shadow-sm" required />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" wire:model="email"
                            class="mt-1 block pl-3 py-2 w-full border border-gray-300 shadow-sm" required />
                    </div>
                    <div class="mb-4">
                        <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        <input type="text" id="mobile" wire:model="phone"
                            class="mt-1 pl-3 py-2 block w-full border border-gray-300 shadow-sm" required />
                    </div>
                    <div class="mb-4">
                        <label for="company" class="block text-sm font-medium text-gray-700" required>Company
                            Name</label>
                        <input type="text" id="company" wire:model="companyname"
                            class="mt-1 pl-3 py-2 block w-full border border-gray-300 shadow-sm" />
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="border border-gray-500 px-6 py-2 rounded-md mr-2"
                            wire:click="$dispatch('closePopupwnload')">Close</button>
                        <button type="submit" class="herobutton lg:px-6 px-3 w-[250px] lg:w-auto py-2">Download</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

    <div class="container mb-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-4 mx-6 lg:mx-auto">
            @php
                $technical = [];
                foreach ($technical_raw as $mainKey => $subArray) {
                    $mainTitle = getPropertyTitles($mainKey) ?? '';
                    $technical[$mainTitle] = [];

                    foreach ($subArray as $key => $value) {
                        $title = getPropertyTitle($key);
                        $technical[$mainTitle][$title] = $value;
                    }
                }
                // Step 1: Move "Specifications" category to the end
                if (isset($technical['Specifications'])) {
                    $specifications = ['Specifications' => $technical['Specifications']];
                    unset($technical['Specifications']);
                    $technical = array_merge($technical, $specifications);
                }

                // Step 2: Move "Identification" category to the beginning
                if (isset($technical['Identification'])) {
                    $identification = ['Identification' => $technical['Identification']];
                    unset($technical['Identification']);
                    $technical = array_merge($identification, $technical); // Merge at the beginning
                }

                // Step 3: Reorder fields inside "Identification" category
                if (isset($technical['Identification'])) {
                    $identification = $technical['Identification'];

                    // Prioritize "Chemical Name" and "Chemical Formula"
                    $priorityFields = [];
                    if (!empty($identification['Chemical Name'])) {
                        $priorityFields['Chemical Name'] = $identification['Chemical Name'];
                        unset($identification['Chemical Name']);
                    }
                    if (!empty($identification['Chemical Formula'])) {
                        $priorityFields['Chemical Formula'] = $identification['Chemical Formula'];
                        unset($identification['Chemical Formula']);
                    }

                    // Merge priority fields first, then the remaining fields
                    $technical['Identification'] = array_merge($priorityFields, $identification);
                }

                // Remove empty categories
                foreach ($technical as $key => $fields) {
                    $filteredFields = array_filter($fields, fn($value) => !empty($value));
                    if (empty($filteredFields)) {
                        unset($technical[$key]);
                    } else {
                        $technical[$key] = $filteredFields;
                    }
                }
            @endphp

            @forelse ($technical as $categoryName => $fields)
                <div class="bg-white border border-[#E5E5E5] p-5 rounded-2xl">
                    <h2 class="text-[#202020] font-bold text-[20px] uppercase">{{ $categoryName }}</h2>
                    <div class="content mt-5 divide-y divide-[#B3B3B3]">
                        @foreach ($fields as $field => $value)
                            <div class="item flex flex-col lg:flex-row gap-5 py-4">
                                <h5 class="text-[#424242] min-w-[240px] font-semibold text-[16px] lg:text-[18px]">{{ $field }}
                                </h5>
                                <p class="text-[#424242] text-[16px] lg:text-[18px]">{{ $value }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
            @endforelse

            @if (!empty($product->storageandlife))
                <div class="bg-white border border-[#E5E5E5] p-5 rounded-2xl space-y-3">
                    <h2 class="text-[#424242] font-bold text-[18px]">Storage & Shelf Life</h2>
                    <p class="text-[#424242] text-[16px]">
                        {{ $product->storageandlife }}
                    </p>
                </div>
            @endif
        </div>
    </div>

    <!--CTA-->

    <div class="mt-16 bg-[#EFF0F1]">
        <div class="container py-10 px-6 lg:py-16 lg:px-0 flex flex-col lg:flex-row justify-between lg:items-center">
            <div class="lg:w-8/12">
                <p class="text-[#202020] font-medium text-[18px] italic">
                    If you’re interested in this product and would like more details or assistance, feel free to get in touch with us. We are here to help you with your requirements.
                </p>
            </div>

            <div class="">
                <div class="button pt-8 lg:pt-0">
                    <a href="{{route('contactus')}}" class="flex font-light items-center bg-[#363636] text-white rounded-full pl-4 pr-3 py-2 ">
                        Get in touch
                        <div class="flex flex-co justify-center items-center h-6 w-6 bg-white rounded-full ml-1" >
                            <svg width="9" height="9" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.53959 1.1346C7.65272 1.14457 7.75728 1.19904 7.83028 1.28604C7.90329 1.37305 7.93877 1.48547 7.92895 1.59862L7.50633 6.42908C7.50334 6.48656 7.48881 6.54285 7.46359 6.59459C7.43838 6.64632 7.403 6.69245 7.35957 6.73022C7.31614 6.76799 7.26554 6.79662 7.21081 6.81441C7.15607 6.8322 7.09831 6.83879 7.04097 6.83377C6.98364 6.82876 6.9279 6.81224 6.87708 6.78522C6.82626 6.75819 6.78141 6.72121 6.7452 6.67647C6.70899 6.63174 6.68216 6.58016 6.66631 6.52483C6.65046 6.4695 6.64592 6.41155 6.65295 6.35442L6.98541 2.55446L0.773647 7.76674C0.686572 7.83981 0.574038 7.87529 0.460802 7.86538C0.347566 7.85548 0.242903 7.80099 0.169839 7.71392C0.0967739 7.62684 0.0612923 7.51431 0.0711991 7.40107C0.081106 7.28784 0.13559 7.18317 0.222665 7.11011L6.43443 1.89782L2.63446 1.56537C2.57698 1.56238 2.5207 1.54784 2.46896 1.52263C2.41722 1.49741 2.37109 1.46203 2.33332 1.4186C2.29556 1.37517 2.26692 1.32458 2.24913 1.26984C2.23134 1.2151 2.22476 1.15734 2.22977 1.10001C2.23479 1.04267 2.2513 0.986932 2.27833 0.936116C2.30535 0.8853 2.34234 0.840448 2.38707 0.804236C2.43181 0.768023 2.48338 0.741192 2.53871 0.725343C2.59404 0.709494 2.652 0.704953 2.70912 0.711988L7.53959 1.1346Z" fill="black"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>



    </div>

    <!--End CTA-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Livewire.on('closePopupwnload', () => {
                closepopup(); // Ensure your closepopup() function is correctly defined
            });
            Livewire.on('openPopupDownload', () => {
                document.getElementById("popupModaldownload").classList.remove("hidden");
            });
        });



        function openPopup() {
            document.getElementById('popupModal').classList.remove('hidden');
        }

        function closepopup() {
            document.getElementById('popupModaldownload').classList.add('hidden');
        }
    </script>

</div>
