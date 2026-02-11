<!-- Navigation Bar -->
<nav class="navbar sticky top-0 z-50" id="navbar">
    <div class="nav-top-stripe"></div>

    <div class="nav-container">
        <div class="nav-content">
            <!-- Logo Section -->
            <div class="logo-section">
                <a href="{{ route('landing') }}" class="logo-link">
                    <img id="logo_navbar" src="{{ asset('/asset/img/logo.png') }}" alt="Fokus Kito Logo">
                </a>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-btn" id="menu-toggle" aria-label="Toggle menu">
                    <span class="menu-line"></span>
                    <span class="menu-line"></span>
                    <span class="menu-line"></span>
                </button>
            </div>

            <!-- Main Navigation -->
            <div class="nav-wrapper" id="nav-menu">
                <ul class="nav-list">
                    <!-- Home -->
                    <li class="nav-item">
                        <a href="{{ route('landing') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span>BERANDA</span>
                        </a>
                    </li>

                    <!-- Categories Dropdown (Desktop) -->
                    <li class="nav-item has-dropdown">
                        <button class="nav-link dropdown-btn">
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <span>KATEGORI</span>
                            <svg class="dropdown-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div class="dropdown-container">
                            <div class="dropdown-inner">
                                @foreach (\App\Models\Categories::all() as $category)
                                    <a href="{{ route('news.category', $category->slug) }}"
                                        class="dropdown-item {{ request()->is('news/category/' . $category->slug) ? 'active' : '' }}">
                                        <svg class="dropdown-arrow" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                        <span>{{ $category->title }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>

                    <!-- Mobile Categories List -->
                    <li class="nav-item mobile-only">
                        <div class="mobile-categories">
                            @foreach (\App\Models\Categories::all() as $category)
                                <a href="{{ route('news.category', $category->slug) }}"
                                    class="nav-link category-link {{ request()->is('news/category/' . $category->slug) ? 'active' : '' }}">
                                    <span>{{ strtoupper($category->title) }}</span>
                                </a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Right Side Actions -->
            <div class="nav-right">
                <!-- Search Box -->
                <div class="search-wrapper">
                    <form action="{{ route('news.index') }}" method="GET" class="search-form">
                        <div class="search-input-wrapper">
                            <input name="search" type="text" placeholder="Cari berita..." class="search-input"
                                id="searchInput" />
                            <button type="submit" class="search-btn">
                                <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Login Button -->
                <a href="/admin" class="login-btn">
                    <svg class="login-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span>MASUK</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Mobile Search Panel -->
    <div class="mobile-search-panel" id="mobile-search">
        <form action="{{ route('news.index') }}" method="GET" class="mobile-search-form">
            <div class="mobile-search-wrapper">
                <input name="search" type="text" placeholder="Cari berita..." class="mobile-search-input" />
                <button type="submit" class="mobile-search-btn">
                    <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</nav>

<style>
    :root {
        --primary-red: #DC2626;
        --primary-red-dark: #B91C1C;
        --accent-orange: #F97316;
        --dark-bg: #1F2937;
        --darker-bg: #111827;
        --text-dark: #1F2937;
        --text-gray: #6B7280;
        --bg-light: #F9FAFB;
        --border-light: #E5E7EB;
        --white: #FFFFFF;
    }

    /* Main Navbar */
    .navbar {
        background: var(--white);
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        position: relative;
    }

    .navbar.scrolled {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
    }

    /* Top Red Stripe */
    .nav-top-stripe {
        height: 4px;
        background: linear-gradient(90deg, var(--primary-red) 0%, var(--accent-orange) 100%);
        width: 100%;
    }

    /* Container */
    .nav-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .nav-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 0;
        gap: 2rem;
    }

    /* Logo Section */
    .logo-section {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .logo-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        transition: transform 0.3s ease;
    }

    .logo-link:hover {
        transform: scale(1.05);
    }

    #logo_navbar {
        height: 45px;
        width: auto;
        display: block;
    }

    /* Mobile Menu Button */
    .mobile-menu-btn {
        display: none;
        flex-direction: column;
        gap: 5px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.5rem;
        transition: all 0.3s ease;
    }

    .menu-line {
        width: 26px;
        height: 3px;
        background: var(--primary-red);
        transition: all 0.3s ease;
        border-radius: 2px;
    }

    .mobile-menu-btn.active .menu-line:nth-child(1) {
        transform: rotate(45deg) translate(7px, 7px);
    }

    .mobile-menu-btn.active .menu-line:nth-child(2) {
        opacity: 0;
    }

    .mobile-menu-btn.active .menu-line:nth-child(3) {
        transform: rotate(-45deg) translate(6px, -6px);
    }

    /* Navigation */
    .nav-wrapper {
        flex: 1;
        display: flex;
        justify-content: start;
    }

    .nav-list {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-item {
        position: relative;
    }

    /* Hide mobile categories on desktop */
    .mobile-only {
        display: none;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.25rem;
        color: var(--text-dark);
        text-decoration: none;
        font-weight: 700;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        position: relative;
        border-radius: 6px;
        background: transparent;
        border: none;
        cursor: pointer;
        white-space: nowrap;
    }

    .nav-icon {
        width: 18px;
        height: 18px;
    }

    .nav-link:hover {
        color: var(--primary-red);
        background: rgba(220, 38, 38, 0.05);
    }

    .nav-link.active {
        color: var(--white);
        background: var(--primary-red);
    }

    /* Dropdown Styles */
    .has-dropdown {
        position: relative;
    }

    .dropdown-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .dropdown-chevron {
        width: 16px;
        height: 16px;
        transition: transform 0.3s ease;
    }

    .has-dropdown:hover .dropdown-chevron {
        transform: rotate(180deg);
    }

    .dropdown-container {
        position: absolute;
        top: calc(100% + 0.5rem);
        left: 50%;
        transform: translateX(-50%);
        background: white;
        border-radius: 8px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        min-width: 240px;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1000;
        overflow: hidden;
        border: 1px solid var(--border-light);
    }

    .has-dropdown:hover .dropdown-container {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
    }

    .dropdown-inner {
        padding: 0.5rem;
        max-height: 420px;
        overflow-y: auto;
    }

    /* Custom Scrollbar */
    .dropdown-inner::-webkit-scrollbar {
        width: 6px;
    }

    .dropdown-inner::-webkit-scrollbar-track {
        background: var(--bg-light);
    }

    .dropdown-inner::-webkit-scrollbar-thumb {
        background: var(--primary-red);
        border-radius: 3px;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem;
        color: var(--text-dark);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        border-radius: 6px;
        border-left: 3px solid transparent;
    }

    .dropdown-arrow {
        width: 16px;
        height: 16px;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .dropdown-item:hover {
        background: var(--bg-light);
        color: var(--primary-red);
        border-left-color: var(--primary-red);
        padding-left: 1.25rem;
    }

    .dropdown-item:hover .dropdown-arrow {
        opacity: 1;
    }

    .dropdown-item.active {
        background: var(--primary-red);
        color: white;
        border-left-color: var(--primary-red-dark);
    }

    .dropdown-item.active .dropdown-arrow {
        opacity: 1;
    }

    /* Right Side Actions */
    .nav-right {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    /* Search Box */
    .search-wrapper {
        position: relative;
    }

    .search-input-wrapper {
        display: flex;
        align-items: center;
        border: 2px solid var(--border-light);
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
        background: white;
    }

    .search-input-wrapper:focus-within {
        border-color: var(--primary-red);
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
    }

    .search-input {
        width: 180px;
        padding: 0.7rem 1rem;
        border: none;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-dark);
        background: transparent;
        outline: none;
        transition: width 0.3s ease;
    }

    .search-input::placeholder {
        color: var(--text-gray);
    }

    .search-input:focus {
        width: 240px;
    }

    .search-btn {
        width: 44px;
        height: 44px;
        background: var(--primary-red);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .search-btn:hover {
        background: var(--primary-red-dark);
    }

    .search-icon {
        width: 18px;
        height: 18px;
        color: white;
    }

    /* Login Button */
    .login-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: var(--darker-bg);
        color: white;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.875rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        white-space: nowrap;
        border: 2px solid var(--darker-bg);
    }

    .login-icon {
        width: 18px;
        height: 18px;
    }

    .login-btn:hover {
        background: transparent;
        color: var(--darker-bg);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(17, 24, 39, 0.3);
    }

    /* Mobile Search Panel */
    .mobile-search-panel {
        display: none;
        padding: 0 2rem 1rem;
        background: white;
        border-top: 2px solid var(--bg-light);
    }

    .mobile-search-panel.active {
        display: block;
    }

    .mobile-search-wrapper {
        display: flex;
        align-items: center;
        border: 2px solid var(--border-light);
        border-radius: 8px;
        overflow: hidden;
        background: white;
    }

    .mobile-search-input {
        width: 100%;
        padding: 0.85rem 1rem;
        border: none;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-dark);
        background: transparent;
        outline: none;
    }

    .mobile-search-input::placeholder {
        color: var(--text-gray);
    }

    .mobile-search-btn {
        width: 50px;
        height: 50px;
        background: var(--primary-red);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .mobile-search-btn:hover {
        background: var(--primary-red-dark);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .mobile-menu-btn {
            display: flex;
        }

        .nav-container {
            padding: 0 1.5rem;
        }

        /* Hide desktop dropdown */
        .has-dropdown {
            display: none;
        }

        /* Show mobile categories */
        .mobile-only {
            display: block;
            width: 100%;
        }

        .mobile-categories {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            width: 100%;
        }

        .category-link {
            width: 100%;
            border: 1px solid var(--border-light);
        }

        .nav-wrapper {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            padding: 1.5rem;
            display: none;
            border-top: 2px solid var(--primary-red);
            max-height: calc(100vh - 70px);
            overflow-y: auto;
        }

        .nav-wrapper.active {
            display: block;
        }

        .nav-list {
            flex-direction: column;
            gap: 0.5rem;
            width: 100%;
        }

        .nav-item {
            width: 100%;
        }

        .nav-link {
            width: 100%;
            border: 1px solid var(--border-light);
            padding: 0.85rem 1.25rem;
        }

        .nav-right {
            display: none;
        }

        .mobile-search-panel.active {
            display: block;
        }
    }

    @media (max-width: 768px) {
        .nav-container {
            padding: 0 1rem;
        }

        .nav-content {
            padding: 0.75rem 0;
        }

        #logo_navbar {
            height: 38px;
        }

        .nav-link {
            font-size: 0.8rem;
        }
    }

    @media (max-width: 640px) {
        .nav-wrapper {
            padding: 1rem;
        }

        .mobile-search-panel {
            padding: 0 1rem 1rem;
        }

        #logo_navbar {
            height: 34px;
        }
    }

    /* Animations */
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .nav-wrapper.active {
        animation: slideDown 0.3s ease-out;
    }

    @keyframes fadeInDropdown {
        from {
            opacity: 0;
            transform: translateX(-50%) translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    }

    .has-dropdown:hover .dropdown-container {
        animation: fadeInDropdown 0.3s ease-out;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const navMenu = document.getElementById('nav-menu');
        const mobileSearch = document.getElementById('mobile-search');
        const navbar = document.getElementById('navbar');

        if (menuToggle && navMenu) {
            menuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                menuToggle.classList.toggle('active');
                navMenu.classList.toggle('active');
                mobileSearch.classList.toggle('active');

                // Prevent body scroll when menu is open
                if (navMenu.classList.contains('active')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            });
        }

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInside = navbar.contains(event.target);
            if (!isClickInside && navMenu && navMenu.classList.contains('active')) {
                menuToggle.classList.remove('active');
                navMenu.classList.remove('active');
                mobileSearch.classList.remove('active');
                document.body.style.overflow = '';
            }
        });

        // Close menu when clicking on a link
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 1024) {
                    menuToggle.classList.remove('active');
                    navMenu.classList.remove('active');
                    mobileSearch.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });

        // Navbar Scroll Effect
        let lastScroll = 0;
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        });

        // Search input animation
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.addEventListener('focus', function() {
                this.closest('.search-input-wrapper').style.transform = 'scale(1.02)';
            });

            searchInput.addEventListener('blur', function() {
                this.closest('.search-input-wrapper').style.transform = 'scale(1)';
            });
        }

        // Prevent form submission on empty search
        const searchForms = document.querySelectorAll('.search-form, .mobile-search-form');
        searchForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const input = this.querySelector('input[name="search"]');
                if (!input.value.trim()) {
                    e.preventDefault();
                }
            });
        });

        // Close dropdown when clicking outside (for touch devices)
        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('.dropdown-container');
            dropdowns.forEach(dropdown => {
                if (!event.target.closest('.has-dropdown')) {
                    dropdown.style.opacity = '0';
                    dropdown.style.visibility = 'hidden';
                }
            });
        });
    });
</script>
