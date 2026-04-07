<div class="search-overlay">
    <button class="search-close" type="button" aria-label="Close search">
        <i class="fa-solid fa-xmark"></i>
    </button>
    <div class="search-content">
        <form action="{{ route('search') }}" method="GET" class="search-form animate-box animated slow animate__animated" data-animate="animate__fadeInDown">
            <input 
                type="text" 
                name="q" 
                placeholder="Search posts, services..." 
                required
                autocomplete="off"
            >
            <button type="submit" aria-label="Search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>
</div>
