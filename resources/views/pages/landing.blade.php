@extends('layouts.app')

@section('title', 'Fokus Kito')

@section('content')

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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--bg-light);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: var(--text-dark);
        }

        /* ==================== HERO SLIDER SECTION ==================== */
        .hero-section {
            background: var(--darker-bg);
            padding: 0;
        }

        .hero-container {
            max-width: 1280px;
            margin: 0 auto;
        }

        .hero-swiper {
            height: 550px;
            position: relative;
        }

        .swiper-slide {
            position: relative;
            height: 100%;
        }

        .hero-slide-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.4) 50%, rgba(0, 0, 0, 0.2) 100%);
        }

        .hero-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 3rem;
            z-index: 10;
        }

        .hero-category {
            display: inline-block;
            background: var(--primary-red);
            color: white;
            padding: 0.5rem 1.25rem;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1rem;
        }

        .hero-title {
            font-size: 2.75rem;
            font-weight: 900;
            color: white;
            line-height: 1.2;
            margin-bottom: 1rem;
            max-width: 900px;
        }

        .hero-meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.875rem;
        }

        .hero-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .hero-author-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid white;
        }

        /* Custom Swiper Navigation */
        .swiper-button-next,
        .swiper-button-prev {
            color: white;
            background: rgba(0, 0, 0, 0.5);
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 20px;
        }

        .swiper-pagination-bullet {
            background: white;
            opacity: 0.5;
            width: 12px;
            height: 12px;
        }

        .swiper-pagination-bullet-active {
            background: var(--primary-red);
            opacity: 1;
            width: 35px;
            border-radius: 6px;
        }

        /* ==================== TRENDING BAR ==================== */
        .trending-bar {
            background: var(--dark-bg);
            padding: 1rem 0;
        }

        .trending-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .trending-label {
            background: var(--primary-red);
            color: white;
            padding: 0.5rem 1.5rem;
            font-weight: 800;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        .trending-news {
            flex: 1;
            overflow: hidden;
        }

        .trending-swiper {
            height: 40px;
        }

        .trending-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: white;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .trending-item:hover {
            color: var(--accent-orange);
        }

        .trending-number {
            background: rgba(255, 255, 255, 0.1);
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: 700;
            font-size: 0.875rem;
        }

        /* ==================== MAIN CONTENT AREA ==================== */
        .main-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 3rem;
        }

        /* ==================== FEATURED NEWS GRID ==================== */
        .featured-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .featured-card {
            background: white;
            text-decoration: none;
            color: inherit;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-radius: 8px;
        }

        .featured-card:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        .featured-image-wrapper {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .featured-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .featured-card:hover .featured-image {
            transform: scale(1.1);
        }

        .featured-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--primary-red);
            color: white;
            padding: 0.4rem 1rem;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 4px;
        }

        .featured-content {
            padding: 1.5rem;
        }

        .featured-title {
            font-size: 1.125rem;
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 0.75rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .featured-excerpt {
            font-size: 0.875rem;
            color: var(--text-gray);
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .featured-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.75rem;
            color: var(--text-gray);
            padding-top: 1rem;
            border-top: 1px solid var(--border-light);
        }

        /* ==================== SECTION TITLE ==================== */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid var(--primary-red);
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 900;
            color: var(--text-dark);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -1rem;
            width: 80px;
            height: 3px;
            background: var(--accent-orange);
        }

        .view-all-link {
            color: var(--primary-red);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.3s ease;
        }

        .view-all-link:hover {
            gap: 1rem;
        }

        /* ==================== NEWS LIST ==================== */
        .news-list {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .news-item {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 1.5rem;
            background: white;
            padding: 1.5rem;
            text-decoration: none;
            color: inherit;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .news-item:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            transform: translateX(5px);
        }

        .news-image-wrapper {
            position: relative;
            height: 200px;
            border-radius: 8px;
            overflow: hidden;
        }

        .news-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .news-item:hover .news-image {
            transform: scale(1.08);
        }

        .news-content {
            display: flex;
            flex-direction: column;
        }

        .news-category {
            display: inline-block;
            background: var(--bg-light);
            color: var(--primary-red);
            padding: 0.4rem 1rem;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 4px;
            margin-bottom: 1rem;
            width: fit-content;
        }

        .news-title {
            font-size: 1.5rem;
            font-weight: 800;
            line-height: 1.3;
            margin-bottom: 1rem;
        }

        .news-excerpt {
            font-size: 0.95rem;
            color: var(--text-gray);
            line-height: 1.6;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .news-footer {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-top: auto;
            font-size: 0.85rem;
            color: var(--text-gray);
        }

        .news-time {
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        /* ==================== SIDEBAR ==================== */
        .sidebar {
            position: sticky;
            top: 2rem;
        }

        .sidebar-widget {
            background: white;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .widget-title {
            font-size: 1.25rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--primary-red);
            text-transform: uppercase;
        }

        .sidebar-news-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            text-decoration: none;
            color: inherit;
            border-bottom: 1px solid var(--border-light);
            transition: all 0.3s ease;
        }

        .sidebar-news-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .sidebar-news-item:first-child {
            padding-top: 0;
        }

        .sidebar-news-item:hover {
            padding-left: 0.5rem;
        }

        .sidebar-image {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 6px;
            flex-shrink: 0;
        }

        .sidebar-news-content {
            flex: 1;
        }

        .sidebar-news-title {
            font-size: 0.95rem;
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .sidebar-news-time {
            font-size: 0.75rem;
            color: var(--text-gray);
        }

        /* ==================== POPULAR NEWS SECTION ==================== */
        .popular-section {
            margin-top: 4rem;
            padding-top: 3rem;
            border-top: 1px solid var(--border-light);
        }

        .popular-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 2rem;
        }

        .popular-main {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        .popular-main:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        .popular-main-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .popular-main:hover .popular-main-image {
            transform: scale(1.05);
        }

        .popular-main-content {
            padding: 2rem;
        }

        .popular-main-category {
            background: var(--primary-red);
            color: white;
            padding: 0.5rem 1.25rem;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            display: inline-block;
            margin-bottom: 1rem;
            border-radius: 4px;
        }

        .popular-main-title {
            font-size: 1.75rem;
            font-weight: 800;
            line-height: 1.3;
            margin-bottom: 1rem;
        }

        .popular-main-excerpt {
            font-size: 1rem;
            color: var(--text-gray);
            line-height: 1.6;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .popular-side-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .popular-side-item {
            background: white;
            padding: 1.25rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            text-decoration: none;
            color: inherit;
            display: flex;
            gap: 1rem;
            transition: all 0.3s ease;
        }

        .popular-side-item:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
            transform: translateX(5px);
        }

        .popular-side-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 6px;
            flex-shrink: 0;
        }

        .popular-side-content {
            flex: 1;
        }

        .popular-side-badge {
            background: var(--bg-light);
            color: var(--primary-red);
            padding: 0.3rem 0.8rem;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .popular-side-title {
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .popular-side-time {
            font-size: 0.75rem;
            color: var(--text-gray);
        }

        /* ==================== RESPONSIVE DESIGN ==================== */
        @media (max-width: 1024px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }

            .featured-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .popular-grid {
                grid-template-columns: 1fr;
            }

            .news-item {
                grid-template-columns: 250px 1fr;
            }
        }

        @media (max-width: 768px) {
            .hero-swiper {
                height: 450px;
            }

            .hero-content {
                padding: 2rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .trending-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .featured-grid {
                grid-template-columns: 1fr;
            }

            .news-item {
                grid-template-columns: 1fr;
            }

            .news-image-wrapper {
                height: 250px;
            }

            .popular-main-image {
                height: 300px;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 640px) {
            .main-container {
                padding: 2rem 1rem;
            }

            .hero-swiper {
                height: 400px;
            }

            .hero-content {
                padding: 1.5rem;
            }

            .hero-title {
                font-size: 1.5rem;
            }

            .hero-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .swiper-button-next,
            .swiper-button-prev {
                display: none;
            }

            .news-item {
                padding: 1rem;
            }

            .news-title {
                font-size: 1.25rem;
            }

            .sidebar-widget {
                padding: 1rem;
            }

            .popular-main-content {
                padding: 1.5rem;
            }

            .popular-main-title {
                font-size: 1.5rem;
            }
        }
    </style>

    <!-- Hero Slider Section -->
    <section class="hero-section">
        <div class="hero-container">
            <div class="swiper hero-swiper">
                <div class="swiper-wrapper">
                    @foreach ($articleBanners as $banner)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $banner->thumbnail) }}" alt="{{ $banner->title }}"
                                class="hero-slide-image">
                            <div class="hero-overlay"></div>
                            <a href="{{ route('news.show', $banner->slug) }}" class="hero-content">
                                <span class="hero-category">{{ $banner->category->title }}</span>
                                <h1 class="hero-title">{{ $banner->title }}</h1>
                                <div class="hero-meta">
                                    <div class="hero-author">
                                        <img src="{{ asset('storage/' . $banner->author->avatar) }}"
                                            alt="{{ $banner->author->name }}" class="hero-author-avatar">
                                        <span>{{ $banner->author->name }}</span>
                                    </div>
                                    <span>{{ \Carbon\Carbon::parse($banner->created_at)->format('d M Y') }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

    <!-- Trending Bar -->
    <div class="trending-bar">
        <div class="trending-container">
            <div class="trending-label">
                🔥 TRENDING
            </div>
            <div class="trending-news">
                <div class="swiper trending-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($news->take(5) as $index => $trending)
                            <div class="swiper-slide">
                                <a href="{{ route('news.show', $trending->slug) }}" class="trending-item">
                                    <span class="trending-number">{{ $index + 1 }}</span>
                                    <span>{{ $trending->title }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-container">
        <!-- Featured News Grid -->
        <div class="featured-grid">
            @foreach ($featureds->take(3) as $featured)
                <a href="{{ route('news.show', $featured->slug) }}" class="featured-card">
                    <div class="featured-image-wrapper">
                        <span class="featured-badge">{{ $featured->category->title }}</span>
                        <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="{{ $featured->title }}"
                            class="featured-image">
                    </div>
                    <div class="featured-content">
                        <h3 class="featured-title">{{ $featured->title }}</h3>
                        <div class="featured-excerpt">
                            {{ Str::limit(strip_tags($featured->content), 120) }}
                        </div>
                        <div class="featured-meta">
                            <span>{{ \Carbon\Carbon::parse($featured->created_at)->diffForHumans() }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Main Content -->
            <div class="main-content">
                <!-- Latest News Section -->
                <div class="section-header">
                    <h2 class="section-title">Berita Terbaru</h2>
                    <a href="{{ route('news.index') }}" class="view-all-link">
                        Lihat Semua
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg>
                    </a>
                </div>

                <div class="news-list">
                    @foreach ($newsDownList as $item)
                        <a href="{{ route('news.show', $item->slug) }}" class="news-item">
                            <div class="news-image-wrapper">
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                                    class="news-image">
                            </div>
                            <div class="news-content">
                                <span class="news-category">{{ $item->category->title }}</span>
                                <h3 class="news-title">{{ $item->title }}</h3>
                                <div class="news-excerpt">{!! Str::limit(strip_tags($item->content), 200) !!}</div>
                                <div class="news-footer">
                                    <span class="news-time">
                                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path
                                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Popular News Section -->
                <div class="popular-section">
                    <div class="section-header">
                        <h2 class="section-title">Berita Populer</h2>
                        <a href="{{ route('news.index') }}" class="view-all-link">
                            Lihat Semua
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </a>
                    </div>

                    <div class="popular-grid">
                        @if (isset($mostViewed[0]))
                            <a href="{{ route('news.show', $mostViewed[0]->slug) }}" class="popular-main">
                                <div style="overflow: hidden;">
                                    <img src="{{ asset('storage/' . $mostViewed[0]->thumbnail) }}"
                                        alt="{{ $mostViewed[0]->title }}" class="popular-main-image">
                                </div>
                                <div class="popular-main-content">
                                    <span class="popular-main-category">{{ $mostViewed[0]->category->title }}</span>
                                    <h3 class="popular-main-title">{{ $mostViewed[0]->title }}</h3>
                                    <div class="popular-main-excerpt">
                                        {!! Str::limit(strip_tags($mostViewed[0]->content), 200) !!}
                                    </div>
                                    <div class="news-footer">
                                        <span class="news-time">
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2z" />
                                            </svg>
                                            {{ \Carbon\Carbon::parse($mostViewed[0]->created_at)->format('d F Y') }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endif

                        <div class="popular-side-list">
                            @foreach ($mostViewed->skip(1)->take(4) as $popular)
                                <a href="{{ route('news.show', $popular->slug) }}" class="popular-side-item">
                                    <img src="{{ asset('storage/' . $popular->thumbnail) }}" alt="{{ $popular->title }}"
                                        class="popular-side-image">
                                    <div class="popular-side-content">
                                        <span class="popular-side-badge">{{ $popular->category->title }}</span>
                                        <h4 class="popular-side-title">{{ $popular->title }}</h4>
                                        <div class="popular-side-time">
                                            {{ \Carbon\Carbon::parse($popular->created_at)->diffForHumans() }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="sidebar">
                <!-- Secondary News Widget -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Pilihan Editor</h3>
                    <div>
                        @foreach ($SecondaryDownlist as $secondary)
                            <a href="{{ route('news.show', $secondary->slug) }}" class="sidebar-news-item">
                                <img src="{{ asset('storage/' . $secondary->thumbnail) }}" alt="{{ $secondary->title }}"
                                    class="sidebar-image">
                                <div class="sidebar-news-content">
                                    <h4 class="sidebar-news-title">{{ $secondary->title }}</h4>
                                    <div class="sidebar-news-time">
                                        {{ \Carbon\Carbon::parse($secondary->created_at)->format('d M Y') }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Popular Reading Widget -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Paling Banyak Dibaca</h3>
                    <div>
                        @foreach ($news->take(4) as $topNews)
                            <a href="{{ route('news.show', $topNews->slug) }}" class="sidebar-news-item">
                                <img src="{{ asset('storage/' . $topNews->thumbnail) }}" alt="{{ $topNews->title }}"
                                    class="sidebar-image">
                                <div class="sidebar-news-content">
                                    <h4 class="sidebar-news-title">{{ $topNews->title }}</h4>
                                    <div class="sidebar-news-time">
                                        {{ \Carbon\Carbon::parse($topNews->created_at)->diffForHumans() }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Hero Swiper
        const heroSwiper = new Swiper('.hero-swiper', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
        });

        // Trending Swiper
        const trendingSwiper = new Swiper('.trending-swiper', {
            direction: 'vertical',
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });
    </script>

@endsection
