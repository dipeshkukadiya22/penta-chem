<div class="lg:hidden flex">
    <!-- Mobile Search Button -->
    <div class="lg:hidden">
        <button wire:click="$dispatch('openSearch')" class="text-gray-500 hover:text-gray-600 mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>
    </div>

    <!-- Mobile Search Overlay -->
    <div id="popupModal" class="lg:hidden fixed inset-0 bg-white z-50 hidden">
        <div class="w-full px-6 py-4">
            <div class="flex items-center justify-between">
                @livewire('search-bar')
                <button wire:click="$dispatch('closeSearch')" class="text-gray-500 hover:text-gray-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- End Mobile Search Overlay -->

    <!-- Mobile Menu Button -->
    <div class="lg:hidden">
        <button id="menu-toggle" wire:click="$dispatch('toggleMenu')" class="text-gray-500 hover:text-gray-600">
            <svg id="hamburger-icon" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg id="close-icon" class="h-6 w-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu (Collapsible) -->
    <div id="mobile-menu" class="lg:hidden w-full absolute top-full left-0 bg-white shadow-lg hidden opacity-0 transition-opacity duration-300 ease-in-out">
        <div class="container px-6 relative !w-full lg:px-0">
            <ul class="py-6 space-y-4 text-xl">
                <li><a href="{{ route('productpage') }}" wire:navigate class="block text-[#202020]">Products</a></li>
               
                <li><a href="{{ route('aboutus') }}" wire:navigate class="block text-[#202020]">About Us</a></li>
                <!-- <li><a href="{{ route('international') }}" wire:navigate class="block text-[#202020]">International</a></li> -->
                <li><a href="{{ route('contactus') }}" wire:navigate class="block text-[#202020]">Contact</a></li>
            </ul>
        </div>
    </div>
    <!-- End Mobile Menu (Collapsible) -->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        Livewire.on('closeSearch', () => {
            document.getElementById("popupModal").classList.add("hidden");
        });
        Livewire.on('openSearch', () => {
            document.getElementById("popupModal").classList.remove("hidden");
        });
        
        Livewire.on('toggleMenu', () => {
            let menu = document.getElementById("mobile-menu");
            let hamburgerIcon = document.getElementById("hamburger-icon");
            let closeIcon = document.getElementById("close-icon");
            
            if (menu.classList.contains("hidden")) {
                menu.classList.remove("hidden", "opacity-0");
                menu.classList.add("opacity-100");
                hamburgerIcon.classList.add("hidden");
                closeIcon.classList.remove("hidden");
            } else {
                menu.classList.add("opacity-0");
                setTimeout(() => {
                    menu.classList.add("hidden");
                    menu.classList.remove("opacity-100");
                }, 300);
                hamburgerIcon.classList.remove("hidden");
                closeIcon.classList.add("hidden");
            }
        });
    });
</script>
