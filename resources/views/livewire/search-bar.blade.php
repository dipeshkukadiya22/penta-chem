<div class="relative">
    <div class="searchbar flex flex-row items-center">
        <img src="{{ url('frontend/searchicon.svg') }}" class="h-[22px] w-[22px] mr-[-35px] z-10" />
        <input type="text" wire:model.live="search" placeholder="Search by Chemicals, Specialties or Name..."
            class="w-[320px] lg:w-[337px] bg-[#F5F5F5] border border-[#E3E3E3] h-[46px] appearance-none focus:border-[#E3E3E3] rounded-[6px] pl-11 placeholder:text-[13px] lg:placeholder:text-sm" />
    </div>

    <!-- Search Results Popup -->
    @if (!empty($search))
        <div class="absolute bg-white w-full lg:w-[337px] shadow-lg rounded-md mt-2 z-50 p-2">
            @if (count($results) > 0)
                <div class="">
                    <div class="searchresult">
                        @foreach ($results as $result)
                            <a href="{{ route('productinside', ['id' => $result->slug]) }}"
                                class="block p-2 hover:bg-gray-100 cursor-pointer">
                                <p>{{ $result->product_name }}</p>
                                <span class="text-gray-500 text-sm">({{ $result->producttype }} -
                                    {{ $result->manufacturer }})</span>
                            </a>
                        @endforeach
                    </div>

                    <div class="bg-black rounded-lg p-2 flex flex-row justify-center items-center">
                        <a href="{{ route('productpage', ['search' => $search]) }}"
                            class="text-white text-center text-sm">
                            View All Results</a>
                    </div>

                </div>
            @else
                <div class="p-2 text-gray-500 text-sm text-center">
                    No result found. <br>
                    <a href="#" class="text-black underline font-semibold">Contact us</a> to discuss your
                    requirements.
                </div>
            @endif
        </div>
    @endif
</div>
