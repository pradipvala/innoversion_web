@extends('frontend.layouts.app')

@section('content')
    <main>
        <div class="section py-5">
            <div class="hero-container">
                <div class="d-flex flex-column gap-4">
                    <!-- Hero Section -->
                    <div class="d-flex flex-column gap-2 mb-3">
                        <h2 style="font-size: 32px; font-weight: 600; margin-bottom: 0;">Let's find you an open position.
                        </h2>
                        <p style="color: #666; margin-bottom: 0;">Find a right job for you no matter what it is that you do.
                        </p>
                    </div>

                    <!-- Search Section -->
                    <div class="d-flex gap-2 mb-4" style="max-width: 600px;">
                        <div class="input-group">
                            <span class="input-group-text" style="border: 1px solid #ddd;">
                                <i class="fa-solid fa-magnifying-glass" style="color: #4a90e2;"></i>
                            </span>
                            <input type="text" class="form-control recruitment-search" placeholder="Search position"
                                style="border: 1px solid #ddd; padding: 10px 15px;">
                        </div>
                        <button class="btn"
                            style="background-color: #E2010F; color: white; padding: 10px 30px; border: none; font-weight: 500;">
                            Search
                        </button>
                    </div>

                    <!-- Job Listings -->
                    <div class="recruitment-list" style="display: flex; flex-direction: column; gap: 12px;">
                        @forelse ($openPositions as $position)
                            <div class="recruitment-item" data-position-id="{{ $position->id }}"
                                style="border: 1px solid #eee; border-radius: 8px; background: white; cursor: pointer; transition: all 0.3s ease;">

                                <!-- List Item Header -->
                                <div class="recruitment-header"
                                    style="padding: 20px; display: flex; justify-content: space-between; align-items: center;">
                                    <div class="recruitment-info" style="flex: 1;">
                                        <h4 style="font-size: 18px; font-weight: 700; margin: 0 0 8px 0; color: #000;">
                                            {{ $position->title }}
                                        </h4>
                                        <p style="color: #888; margin: 0; font-size: 14px;">
                                            @if (!empty($position->place))
                                                {{ $position->place }}
                                            @else
                                                Innoversion
                                            @endif
                                        </p>
                                    </div>
                                    <button type="button" class="btn recruitment-apply-btn"
                                        onclick="event.stopPropagation(); openApplicationModal('{{ $position->id }}', '{{ addslashes($position->title) }}');"
                                        style="background-color: #E2010F; color: white; padding: 10px 20px; border: none; border-radius: 6px; font-weight: 500; cursor: pointer;">
                                        Apply Now
                                    </button>
                                </div>

                                <!-- Expandable Details -->
                                <div class="recruitment-details"
                                    style="display: none; padding: 0 20px 20px 20px; border-top: 1px solid #eee; color: #555; line-height: 1.6;">
                                    {!! $position->description ?: '<p>Join our team and help us deliver innovative digital solutions.</p>' !!}
                                </div>
                            </div>
                        @empty
                            <div style="text-align: center; padding: 60px 20px; background: white; border-radius: 8px;">
                                <h4 style="margin-bottom: 10px;">No open positions right now</h4>
                                <p style="color: #666; margin-bottom: 20px;">Please check back soon or contact us if you
                                    would like to be considered for future opportunities.</p>
                                <a href="{{ route('contact') }}" class="btn btn-accent">
                                    <div class="btn-title">
                                        <span>Contact Us</span>
                                    </div>
                                    <div class="icon-circle">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Application Modal -->
    <div id="applicationModal"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center;">
        <div
            style="background: white; border-radius: 12px; padding: 40px; max-width: 700px; width: 90%; max-height: 90vh; overflow-y: auto;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="margin: 0; font-size: 24px; font-weight: 600;">Apply Now</h3>
                <button type="button" onclick="closeApplicationModal()"
                    style="background: none; border: none; font-size: 24px; cursor: pointer; color: #999;">
                    ✕
                </button>
            </div>
            <p id="positionName" style="color: #666; margin-bottom: 20px;"></p>

            <div id="applicationSuccess" class="alert success"
                style="display: none; padding: 15px; background: #d4edda; color: #155724; border-radius: 6px; margin-bottom: 20px;">
                <i class="fa-solid fa-check"></i>
                <p style="margin: 0;">Thank you! Your application has been submitted successfully.</p>
            </div>

            <div id="applicationError" class="alert error"
                style="display: none; padding: 15px; background: #f8d7da; color: #721c24; border-radius: 6px; margin-bottom: 20px;">
                <i class="fa-solid fa-xmark"></i>
                <p id="errorMessage" style="margin: 0;"></p>
            </div>

            <form id="recruitmentApplicationForm" enctype="multipart/form-data" style="display: none;">
                @csrf
                <input type="hidden" id="positionId" name="position_id">

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #333;">First name <span
                                style="color: red;">*</span></label>
                        <input type="text" name="first_name" placeholder="Enter name" required
                            style="width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #333;">Last name <span
                                style="color: red;">*</span></label>
                        <input type="text" name="last_name" placeholder="Last name" required
                            style="width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                    </div>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #333;">Contact email <span
                            style="color: red;">*</span></label>
                    <input type="email" name="email" placeholder="Contact email" required
                        style="width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                </div>

                <div style="display: grid; grid-template-columns: 200px 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #333;">Country Code <span
                                style="color: red;">*</span></label>
                        <select name="country_code" required id="countryCodes"
                            style="width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                            <option value="">Select code</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #333;">Phone number <span
                                style="color: red;">*</span></label>
                        <input type="tel" name="phone" placeholder="Phone number" required
                            style="width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #333;">Upload CV</label>
                    <input type="file" name="cv" accept=".pdf,.doc,.docx"
                        style="width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box;">
                    <small style="color: #999;">PDF, DOC, or DOCX (Max 5MB)</small>
                </div>

                <button type="submit"
                    style="width: 100%; padding: 12px; background-color: #E2010F; color: white; border: none; border-radius: 6px; font-weight: 600; font-size: 16px; cursor: pointer;">
                    Submit
                </button>
            </form>
        </div>
    </div>

    <style>
        .recruitment-item {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .recruitment-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .recruitment-item.active {
            border-color: #dc3545;
        }

        .recruitment-header {
            user-select: none;
        }

        .recruitment-search {
            font-size: 14px;
        }
    </style>

    <script>
        let countryCodes = @json($countryCodes ?? []);

        // Populate country codes dropdown
        function populateCountryCodes() {
            const select = document.getElementById('countryCodes');
            if (countryCodes && typeof countryCodes === 'object') {
                Object.keys(countryCodes).forEach(code => {
                    const option = document.createElement('option');
                    option.value = code;
                    option.textContent = countryCodes[code] + ' (' + code + ')';
                    select.appendChild(option);
                });
            }
        }

        function openApplicationModal(positionId, positionTitle) {
            populateCountryCodes();
            document.getElementById('positionId').value = positionId;
            document.getElementById('positionName').textContent = 'Position: ' + positionTitle;
            document.getElementById('applicationModal').style.display = 'flex';
            document.getElementById('recruitmentApplicationForm').style.display = 'block';
            document.getElementById('applicationSuccess').style.display = 'none';
            document.getElementById('applicationError').style.display = 'none';
            document.body.style.overflow = 'hidden';
        }

        function closeApplicationModal() {
            document.getElementById('applicationModal').style.display = 'none';
            document.body.style.overflow = 'auto';
            document.getElementById('recruitmentApplicationForm').reset();
        }

        document.getElementById('applicationModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeApplicationModal();
            }
        });

        document.getElementById('recruitmentApplicationForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            try {
                const response = await fetch('{{ route('recruitment.apply') }}', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    document.getElementById('recruitmentApplicationForm').style.display = 'none';
                    document.getElementById('applicationSuccess').style.display = 'block';

                    setTimeout(() => {
                        closeApplicationModal();
                    }, 2000);
                } else {
                    document.getElementById('errorMessage').textContent = result.message ||
                        'An error occurred. Please try again.';
                    document.getElementById('applicationError').style.display = 'block';
                }
            } catch (error) {
                document.getElementById('errorMessage').textContent = 'Network error. Please try again.';
                document.getElementById('applicationError').style.display = 'block';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const items = document.querySelectorAll('.recruitment-item');
            const searchInput = document.querySelector('.recruitment-search');

            items.forEach(item => {
                const header = item.querySelector('.recruitment-header');
                const details = item.querySelector('.recruitment-details');

                header.addEventListener('click', function() {
                    const isOpen = item.classList.contains('active');

                    items.forEach(other => {
                        other.classList.remove('active');
                        other.querySelector('.recruitment-details').style.display = 'none';
                    });

                    if (!isOpen) {
                        item.classList.add('active');
                        details.style.display = 'block';
                    }
                });
            });

            // Search functionality
            if (searchInput) {
                searchInput.addEventListener('keyup', function(e) {
                    const searchTerm = this.value.toLowerCase();
                    const list = document.querySelector('.recruitment-list');
                    const positionItems = list.querySelectorAll('.recruitment-item');

                    positionItems.forEach(item => {
                        const title = item.querySelector('.recruitment-info h4').textContent
                            .toLowerCase();
                        const location = item.querySelector('.recruitment-info p').textContent
                            .toLowerCase();

                        if (title.includes(searchTerm) || location.includes(searchTerm)) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
@endsection
