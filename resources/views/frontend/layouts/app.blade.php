<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $defaultTitle = str(Route::currentRouteName() ?? 'home')
            ->afterLast('.')
            ->headline();
        $pageTitle = trim($__env->yieldContent('title', $defaultTitle));
        $siteTitle = trim($__env->yieldContent('site_title', 'Innoversion Technolab'));
        $fullTitle = $pageTitle !== '' ? $pageTitle . ' - ' . $siteTitle : $siteTitle;

        $metaDescription = trim(
            $__env->yieldContent(
                'meta_description',
                'Innoversion Technolab provides software development, web solutions, mobile apps, and digital transformation services.',
            ),
        );
        $metaKeywords = trim(
            $__env->yieldContent(
                'meta_keywords',
                'Innoversion Technolab, software development, web development, mobile app development, digital transformation, IT services',
            ),
        );
        $metaImage = trim($__env->yieldContent('meta_image', asset('image/favicon.ico')));
        $metaUrl = trim($__env->yieldContent('meta_url', url()->current()));
        $metaType = trim($__env->yieldContent('meta_type', 'website'));
        $canonicalUrl = trim($__env->yieldContent('canonical', $metaUrl));
    @endphp

    <title>{{ $fullTitle }}</title>
    <meta name="title" content="Innnoversion Technolab">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <meta property="og:title" content="{{ $fullTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="{{ $metaImage }}">
    <meta property="og:url" content="{{ $metaUrl }}">
    <meta property="og:type" content="{{ $metaType }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $fullTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $metaImage }}">
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link rel="icon" href={{ asset('image/favicon.ico') }}>
</head>

<body>
    <!-- Section Header -->
    <header>
        <!-- Section Navbar -->
        <div id="header">
            @include('frontend.layouts.header')
        </div>
    </header>

    <!-- Section Content Edit -->
    <aside>
        <div id="edit-sidebar"></div>
    </aside>

    <!-- Section Search -->
    <div id="search-form-container"></div>

    <!-- Section Sidebar -->
    <aside>
        <div id="sidebar">
            @include('frontend.layouts.sidebar')
        </div>
    </aside>

    <main>
        @yield('content')
    </main>

    <!-- Section Footer -->
    <footer>
        <div id="footer">
            @include('frontend.layouts.footer')
        </div>
    </footer>

    <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/swiper-script.js') }}"></script>
    <script src="{{ asset('js/submit-form.js') }}"></script>
    <script src="{{ asset('js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/video_embedded.js') }}"></script>

    <!-- WhatsApp Floating Button -->

    @php
        $whatsapp = $whatsapp->name ?? null;
    @endphp
    @if (!empty($whatsapp))
        <a href="https://wa.me/{{ $whatsapp }}?text=Hello%20Innoversion%20Technolab" class="whatsapp-float"
            target="_blank" rel="noopener noreferrer" title="Chat with us on WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    @endif

    {{--  <button type="button" style="font-size:32px;"
        class="btn btn-danger fa fa-download btn-floating btn-lg contact_us_pdf_download download-float"
        id="contact_us_pdf_download" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <!--<i class="fas fa-arrow-down"></i>-->
    </button>

    <a href="{{ asset('pdf/6H01AV1zaaxHpbRNvpDl7X9OB59Gt00YkfkMx7tZ.pdf') }}" id="download" download></a>  --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Download company profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-horizontal" id="member-form" role="form" method="POST"
                    action="{{ route('save.contact.us', [], false) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">First name *</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Enter name"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Last name">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Contact email *</label>
                                <input type="email" name="contact_email" class="form-control"
                                    placeholder="Contact email" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Country Code *</label>
                                <select name="countryCode" class="form-select" required>
                                    @foreach ($countryCodes as $code => $name)
                                        <option value="{{ $code }}"
                                            {{ old('countryCode') == $code ? 'selected' : '' }}>
                                            {{ $name }} ({{ $code }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Phone number *</label>
                                <input type="text" name="phone_number" class="form-control"
                                    placeholder="Phone number" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0 justify-content-center">
                        <button type="submit" id="companyProfileSubmitBtn" class="btn btn-danger px-4">Download Company
                            Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('member-form');
            if (!form) {
                return;
            }

            var submitBtn = document.getElementById('companyProfileSubmitBtn');
            var modalEl = document.getElementById('exampleModal');
            var downloadAnchor = document.getElementById('download');
            var csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            var csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';
            var pdfUrl = downloadAnchor ? downloadAnchor.href :
                "{{ asset('pdf/6H01AV1zaaxHpbRNvpDl7X9OB59Gt00YkfkMx7tZ.pdf') }}";

            async function refreshCsrfToken() {
                var tokenResponse = await fetch("{{ route('csrf.token', [], false) }}", {
                    method: 'GET',
                    credentials: 'same-origin',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                if (!tokenResponse.ok) {
                    throw new Error('Unable to refresh CSRF token');
                }

                var tokenData = await tokenResponse.json();
                if (!tokenData.token) {
                    throw new Error('Invalid CSRF token response');
                }

                csrfToken = tokenData.token;
                if (csrfTokenMeta) {
                    csrfTokenMeta.setAttribute('content', csrfToken);
                }
            }

            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                submitBtn.disabled = true;
                submitBtn.textContent = 'Please wait...';

                try {
                    await refreshCsrfToken();

                    var formData = new FormData(form);
                    formData.set('_token', csrfToken);
                    var response = await fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        credentials: 'same-origin',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    });

                    var data = await response.json();

                    if (!response.ok || !data.success) {
                        throw new Error(data.message || 'Submission failed');
                    }

                    var modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
                    modalInstance.hide();
                    form.reset();

                    if (downloadAnchor) {
                        downloadAnchor.setAttribute('href', pdfUrl);
                        downloadAnchor.setAttribute('download', 'Innoversion-Company-Profile.pdf');
                        downloadAnchor.click();
                    } else {
                        var link = document.createElement('a');
                        link.href = pdfUrl;
                        link.download = 'Innoversion-Company-Profile.pdf';
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    }
                } catch (error) {
                    alert(error.message || 'Something went wrong. Please try again.');
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Download Company Profile';
                }
            });
        });
    </script>
</body>

</html>
