@extends('layouts.app')

@section('title', $category->title)

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

        /* Category Header Section */
        .category-hero {
            background: linear-gradient(135deg, var(--darker-bg) 0%, var(--dark-bg) 100%);
            padding: 5rem 0 3rem;
            position: relative;
            overflow: hidden;
        }

        .category-hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(220, 38, 38, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .category-hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-red) 0%, var(--accent-orange) 100%);
        }

        .category-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 1;
        }

        /* Breadcrumb */
        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(255, 255, 255, 0.08);
            padding: 0.65rem 1.5rem;
            color: white;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 2.5rem;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: fit-content;
        }

        .breadcrumb-nav a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb-nav a:hover {
            color: var(--accent-orange);
        }

        .breadcrumb-separator {
            color: var(--primary-red);
            font-weight: 800;
        }

        .breadcrumb-current {
            color: white;
            font-weight: 700;
        }

        /* Category Header Content */
        .category-header-content {
            display: flex;
            align-items: center;
            gap: 2.5rem;
        }

        .category-badge {
            width: 110px;
            height: 110px;
            background: linear-gradient(135deg, var(--primary-red) 0%, var(--accent-orange) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3.5rem;
            flex-shrink: 0;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(220, 38, 38, 0.4);
            position: relative;
            transition: all 0.3s ease;
        }

        .category-badge::before {
            content: '';
            position: absolute;
            inset: -3px;
            background: linear-gradient(135deg, var(--accent-orange), var(--primary-red));
            border-radius: 12px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .category-badge:hover::before {
            opacity: 1;
        }

        .category-badge:hover {
            transform: translateY(-5px);
        }

        .category-info {
            flex: 1;
        }

        .category-name {
            font-size: 3.25rem;
            font-weight: 900;
            color: white;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 1.1;
        }

        .category-desc {
            font-size: 1.15rem;
            color: #D1D5DB;
            line-height: 1.6;
            max-width: 700px;
        }

        /* Category Stats */
        .category-stats {
            display: flex;
            gap: 3rem;
            margin-top: 3rem;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .stat-box {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon-box {
            width: 50px;
            height: 50px;
            background: var(--primary-red);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        }

        .stat-icon-box svg {
            width: 24px;
            height: 24px;
            color: white;
        }

        .stat-info {
            display: flex;
            flex-direction: column;
        }

        .stat-number {
            font-size: 1.75rem;
            font-weight: 900;
            color: white;
            line-height: 1;
            margin-bottom: 0.25rem;
        }

        .stat-text {
            font-size: 0.8rem;
            color: #9CA3AF;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Main Content Area */
        .category-main {
            max-width: 1280px;
            margin: 4rem auto;
            padding: 0 2rem;
        }

        /* Toolbar Section */
        .toolbar {
            background: white;
            padding: 1.75rem 2rem;
            margin-bottom: 3rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1.5rem;
            border-radius: 10px;
            border-left: 4px solid var(--primary-red);
        }

        .toolbar-left {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex: 1;
        }

        .toolbar-title {
            font-weight: 800;
            color: var(--text-dark);
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .toolbar-badge {
            width: 32px;
            height: 32px;
            background: var(--primary-red);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 900;
            border-radius: 6px;
        }

        .sort-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .sort-btn {
            padding: 0.65rem 1.5rem;
            border: 2px solid var(--border-light);
            background: white;
            color: var(--text-gray);
            font-weight: 700;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .sort-btn:hover {
            border-color: var(--primary-red);
            color: var(--primary-red);
        }

        .sort-btn.active {
            background: var(--primary-red);
            border-color: var(--primary-red);
            color: white;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        .view-options {
            display: flex;
            gap: 0.5rem;
        }

        .view-option {
            width: 44px;
            height: 44px;
            border: 2px solid var(--border-light);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--text-gray);
            border-radius: 8px;
        }

        .view-option:hover {
            border-color: var(--primary-red);
            color: var(--primary-red);
        }

        .view-option.active {
            background: var(--primary-red);
            border-color: var(--primary-red);
            color: white;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        /* Articles Grid */
        .articles-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .articles-grid.view-list {
            grid-template-columns: 1fr;
        }

        /* Article Card */
        .article-card {
            background: white;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            height: 100%;
            border-radius: 10px;
            border-top: 3px solid var(--primary-red);
        }

        .article-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(220, 38, 38, 0.2);
        }

        .article-image-wrapper {
            position: relative;
            overflow: hidden;
            height: 230px;
        }

        .article-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .article-card:hover .article-image {
            transform: scale(1.12);
        }

        .article-tag {
            position: absolute;
            top: 0;
            left: 0;
            background: var(--primary-red);
            color: white;
            padding: 0.5rem 1.15rem;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 10;
            border-bottom-right-radius: 8px;
        }

        .article-body {
            padding: 1.75rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .article-heading {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.4;
            margin-bottom: 0.85rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .article-preview {
            font-size: 0.9rem;
            color: var(--text-gray);
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .article-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px solid var(--border-light);
            margin-top: auto;
        }

        .article-author-info {
            display: flex;
            align-items: center;
            gap: 0.65rem;
        }

        .author-pic {
            width: 34px;
            height: 34px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid var(--primary-red);
        }

        .author-text {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .article-time {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            color: var(--text-gray);
            font-size: 0.75rem;
            font-weight: 600;
        }

        .time-icon {
            width: 14px;
            height: 14px;
        }

        /* List View Modifications */
        .articles-grid.view-list .article-card {
            flex-direction: row;
            height: auto;
        }

        .articles-grid.view-list .article-image-wrapper {
            width: 360px;
            height: 260px;
            flex-shrink: 0;
        }

        .articles-grid.view-list .article-body {
            padding: 2rem;
        }

        .articles-grid.view-list .article-heading {
            font-size: 1.6rem;
            -webkit-line-clamp: 2;
        }

        .articles-grid.view-list .article-preview {
            -webkit-line-clamp: 3;
            margin-bottom: 1.5rem;
        }

        /* No Results State */
        .no-results {
            text-align: center;
            padding: 6rem 2rem;
            background: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border-radius: 10px;
            border-top: 4px solid var(--primary-red);
        }

        .no-results-icon {
            width: 130px;
            height: 130px;
            background: var(--bg-light);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-red);
            font-size: 3.5rem;
            margin-bottom: 2rem;
            border-radius: 12px;
            border: 2px solid var(--border-light);
        }

        .no-results-heading {
            font-size: 2rem;
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 1rem;
            text-transform: uppercase;
        }

        .no-results-text {
            font-size: 1.05rem;
            color: var(--text-gray);
            max-width: 550px;
            margin: 0 auto 2.5rem;
            line-height: 1.6;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.95rem 2.25rem;
            background: var(--primary-red);
            color: white;
            text-decoration: none;
            font-weight: 800;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            border: 2px solid var(--primary-red);
            transition: all 0.3s ease;
            border-radius: 8px;
        }

        .back-btn:hover {
            background: transparent;
            color: var(--primary-red);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .articles-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 1024px) {
            .category-hero {
                padding: 4rem 0 2.5rem;
            }

            .category-header-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .category-badge {
                width: 90px;
                height: 90px;
                font-size: 3rem;
            }

            .category-name {
                font-size: 2.75rem;
            }

            .category-stats {
                flex-direction: column;
                gap: 1.5rem;
            }

            .articles-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .articles-grid.view-list .article-card {
                flex-direction: column;
            }

            .articles-grid.view-list .article-image-wrapper {
                width: 100%;
                height: 260px;
            }

            .toolbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .toolbar-left {
                width: 100%;
                flex-direction: column;
                align-items: flex-start;
            }

            .view-options {
                width: 100%;
                justify-content: flex-end;
            }
        }

        @media (max-width: 768px) {
            .category-hero {
                padding: 3rem 0 2rem;
            }

            .category-container {
                padding: 0 1.5rem;
            }

            .category-badge {
                width: 75px;
                height: 75px;
                font-size: 2.5rem;
            }

            .category-name {
                font-size: 2.25rem;
            }

            .category-desc {
                font-size: 1rem;
            }

            .category-main {
                padding: 0 1.5rem;
            }

            .articles-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .toolbar {
                padding: 1.5rem;
            }

            .sort-buttons {
                width: 100%;
            }

            .sort-btn {
                flex: 1;
                text-align: center;
            }
        }

        @media (max-width: 640px) {
            .category-container {
                padding: 0 1rem;
            }

            .category-name {
                font-size: 1.9rem;
            }

            .category-desc {
                font-size: 0.95rem;
            }

            .category-main {
                padding: 0 1rem;
            }

            .toolbar {
                padding: 1.25rem;
            }

            .article-body {
                padding: 1.5rem;
            }

            .no-results {
                padding: 4rem 1.5rem;
            }

            .no-results-icon {
                width: 110px;
                height: 110px;
                font-size: 3rem;
            }

            .stat-number {
                font-size: 1.5rem;
            }

            .category-stats {
                padding: 1.5rem;
                gap: 1rem;
            }

            .stat-icon-box {
                width: 44px;
                height: 44px;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }

        .delay-4 {
            animation-delay: 0.4s;
        }

        @keyframes shimmer {
            0% {
                box-shadow: 0 10px 40px rgba(220, 38, 38, 0.4);
            }

            50% {
                box-shadow: 0 10px 40px rgba(249, 115, 22, 0.5);
            }

            100% {
                box-shadow: 0 10px 40px rgba(220, 38, 38, 0.4);
            }
        }

        .category-badge {
            animation: shimmer 3s ease-in-out infinite;
        }
    </style>

    <!-- Category Hero Section -->
    <div class="category-hero">
        <div class="category-container">
            <!-- Breadcrumb -->
            <div class="breadcrumb-nav fade-in">
                <a href="{{ route('landing') }}">Beranda</a>
                <span class="breadcrumb-separator">/</span>
                <span>Kategori</span>
                <span class="breadcrumb-separator">/</span>
                <span class="breadcrumb-current">{{ $category->title }}</span>
            </div>

            <!-- Header Content -->
            <div class="category-header-content fade-in delay-1">
                <!-- Category Badge -->
                <div class="category-badge">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="55" height="55">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>

                <div class="category-info">
                    <!-- Category Name -->
                    <h1 class="category-name">{{ $category->title }}</h1>

                    <!-- Category Description -->
                    <p class="category-desc">
                        Kumpulan berita terkini dan terlengkap seputar {{ $category->title }}
                    </p>
                </div>
            </div>

            <!-- Category Stats -->
            <div class="category-stats fade-in delay-2">
                <div class="stat-box">
                    <div class="stat-icon-box">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <div class="stat-info">
                        <div class="stat-number">{{ $category->news->count() }}</div>
                        <div class="stat-text">Total Artikel</div>
                    </div>
                </div>
                <div class="stat-box">
                    <div class="stat-icon-box">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="stat-info">
                        <div class="stat-number">
                            {{ \Carbon\Carbon::parse($category->news->first()?->created_at ?? now())->diffForHumans() }}
                        </div>
                        <div class="stat-text">Terakhir Diperbarui</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Main Content -->
    <div class="category-main">
        <!-- Toolbar -->
        <div class="toolbar fade-in delay-3">
            <div class="toolbar-left">
                <div class="toolbar-title">
                    <span class="toolbar-badge">⚙</span>
                    <span>Urutkan Berdasarkan</span>
                </div>
                <div class="sort-buttons">
                    <button class="sort-btn active" onclick="sortArticles('latest')">Terbaru</button>
                    <button class="sort-btn" onclick="sortArticles('oldest')">Terlama</button>
                    <button class="sort-btn" onclick="sortArticles('popular')">Populer</button>
                </div>
            </div>
            <div class="view-options">
                <button class="view-option active" onclick="changeView('grid')" title="Tampilan Grid">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z" />
                    </svg>
                </button>
                <button class="view-option" onclick="changeView('list')" title="Tampilan List">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Articles Grid -->
        @if ($category->news->count() > 0)
            <div class="articles-grid fade-in delay-4" id="articlesGrid">
                @foreach ($category->news as $index => $article)
                    <a href="{{ route('news.show', $article->slug) }}" class="article-card">
                        <div class="article-image-wrapper">
                            <span class="article-tag">{{ strtoupper($category->title) }}</span>
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                                class="article-image">
                        </div>
                        <div class="article-body">
                            <h3 class="article-heading">{{ $article->title }}</h3>
                            <div class="article-preview">{!! Str::limit(strip_tags($article->content), 140) !!}</div>
                            <div class="article-footer">
                                <div class="article-author-info">
                                    <img src="{{ asset('storage/' . $article->author->avatar) }}"
                                        alt="{{ $article->author->name }}" class="author-pic">
                                    <span class="author-text">{{ $article->author->name }}</span>
                                </div>
                                <div class="article-time">
                                    <svg class="time-icon" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <!-- No Results State -->
            <div class="no-results fade-in delay-4">
                <div class="no-results-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="65" height="65">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="no-results-heading">Belum Ada Artikel</h2>
                <p class="no-results-text">
                    Saat ini belum ada artikel dalam kategori {{ $category->title }}.
                    Silakan kembali lagi nanti atau jelajahi kategori lainnya.
                </p>
                <a href="{{ route('landing') }}" class="back-btn">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        @endif
    </div>

    <script>
        // Change View (Grid/List)
        function changeView(view) {
            const grid = document.getElementById('articlesGrid');
            const viewButtons = document.querySelectorAll('.view-option');

            viewButtons.forEach(btn => btn.classList.remove('active'));
            event.target.closest('.view-option').classList.add('active');

            if (view === 'list') {
                grid.classList.add('view-list');
            } else {
                grid.classList.remove('view-list');
            }
        }

        // Sort Articles
        function sortArticles(sortType) {
            const sortButtons = document.querySelectorAll('.sort-btn');
            sortButtons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            // Here you would typically make an AJAX call to re-fetch sorted data
            console.log('Sorting by:', sortType);

            // You can implement actual sorting logic here or redirect with query params
            // Example: window.location.href = `?sort=${sortType}`;
        }

        // Smooth scroll to content on page load with query param
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('scrollTo')) {
                document.querySelector('.category-main').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    </script>

@endsection
