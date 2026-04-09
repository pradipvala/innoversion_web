@extends('frontend.layouts.app')

@section('content')
    <!-- Section Main Content -->
    <main>
        <!-- Section Banner -->
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            Our
                            Projects</h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">Projects</p>
                        </nav>
                        <p class="mb-0" style="max-width: 760px;">
                            A journey through our collaborations and the solutions we have delivered for clients across
                            different industries.
                        </p>
                    </div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>

        <!-- Section Projects -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gspace-2">
                        <div class="d-flex flex-column gspace-1">
                            <div class="sub-heading animate-box animated animate__animated"
                                data-animate="animate__fadeInDown">
                                <i class="fa-regular fa-circle-dot"></i>
                                <span>Portfolio</span>
                            </div>
                            <h3 class="title-heading mb-0">Selected work and case studies</h3>
                        </div>
                        <p class="mb-0" style="max-width: 520px;">
                            Browse a few of our featured projects. Open each item to read the short summary and see the
                            visual
                            reference.
                        </p>
                    </div>

                    @if ($projects->count())
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                            @foreach ($projects as $project)
                                @php
                                    $collapseId = 'project-collapse-' . $project->id;
                                    $projectImage = !empty($project->project_image)
                                        ? $project->project_image
                                        : asset('admin_theme/assets/defaults/no-image.jpg');
                                @endphp
                                <div class="col">
                                    <div class="card card-blog h-100 animate-box animated animate__animated"
                                        data-animate="animate__fadeInUp">
                                        <div class="blog-image">
                                            <img src="{{ $projectImage }}" alt="{{ $project->title }}">
                                        </div>
                                        <div class="card-body d-flex flex-column gap-3">
                                            <div class="d-flex align-items-start justify-content-between gap-3">
                                                <div>
                                                    <h4 class="mb-2 title-heading">{{ $project->title }}</h4>
                                                    <p class="mb-0">
                                                        {{--  {{ \Illuminate\Support\Str::limit(strip_tags($project->description), 120) }}  --}}
                                                        {{ $project->description }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="card card-blog text-center py-5">
                            <h4 class="mb-2">No projects found</h4>
                            <p class="mb-0">We will publish our latest project work here soon.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
