<x-user.header></x-user.header>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="bg-gray-100 min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md hidden md:block">
            <x-user.sidebar></x-user.sidebar>
        </div>
        <!-- Mobile menu button -->
        <button class="fixed top-4 left-4 md:hidden z50 bg-gray-800 text-white p-2 rounded-lg" id="mobile-menu-button">
            <i class="fas fa-bars"></i>
        </button>
        <div id="mobile-menu" class="fixed inset-0 bg-white shadow-md hidden md:hidden">
            <x-user.sidebar></x-user.sidebar>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <div class="container mx-auto px-4 py-8">
                <!-- Progress Bar -->
                <div class="mb-8">
                    <div class="flex justify-between">
                        <div class="w-1/5 text-center">
                            <div class="mt-2 text-sm">Services</div>
                        </div>
                        <div class="w-1/5 text-center">
                            <div class="mt-2 text-sm">Date & Time</div>
                        </div>
                        <div class="w-1/5 text-center">
                            <div class="mt-2 text-sm">Barber</div>
                        </div>
                        <div class="w-1/5 text-center">
                            <div class="mt-2 text-sm">Details</div>
                        </div>
                        <div class="w-1/5 text-center">
                            <div class="mt-2 text-sm">Confirm</div>
                        </div>
                    </div>
                    <div class="relative mt-4">
                        <div class="absolute w-full h-1 bg-gray-200"></div>
                        <div class="absolute h-1 bg-blue-500" style="width: 25%;"></div>
                    </div>
                </div>

                <!-- Step 1: Service Selection -->
                <div class="step-1">
                    <h2 class="text-2xl font-bold mb-6">Select Your Service</h2>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($services as $service)
                            <div class="bg-white rounded-lg shadow-md p-6 cursor-pointer hover:shadow-lg transition" data-service-id="{{ $service->id }}">
                                <h3 class="text-xl font-semibold">{{ $service->name }}</h3>
                                <p class="text-gray-600 mt-2">{{ $service->description }}</p>
                                <div class="flex justify-between items-center mt-4">
                                    <span class="text-blue-600 font-bold">{{ $service->price }}$</span>
                                    <span class="text-gray-500">{{ $service->duration }} mins</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Step 2: Date and Time Selection (Initially Hidden) -->
                <div class="step-2 hidden">
                    <h2 class="text-2xl font-bold mb-6">Choose Date & Time</h2>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <label class="block text-gray-700 mb-2">Select Date</label>
                        <input type="text" id="date-picker" class="w-full p-2 border rounded mb-4" placeholder="Select Date" required>
                        <label class="block text-gray-700 mb-2 mt-4">Select Time</label>
                        <div class="grid grid-cols-4 gap-4" id="time-slots">
                            <button class="p-2 text-center border rounded hover:bg-blue-50" data-time="09:00">9:00 AM</button>
                            <button class="p-2 text-center border rounded hover:bg-blue-50" data-time="10:00">10:00 AM</button>
                            <button class="p-2 text-center border rounded hover:bg-blue-50" data-time="11:00">11:00 AM</button>
                            <button class="p-2 text-center border rounded hover:bg-blue-50" data-time="12:00">12:00 PM</button>
                            <button class="p-2 text-center border rounded hover:bg-blue-50" data-time="13:00">1:00 PM</button>
                            <button class="p-2 text-center border rounded hover:bg-blue-50" data-time="14:00">2:00 PM</button>
                            <button class="p-2 text-center border rounded hover:bg-blue-50" data-time="15:00">3:00 PM</button>
                            <button class="p-2 text-center border rounded hover:bg-blue-50" data-time="16:00">4:00 PM</button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Barber Selection (Initially Hidden) -->
                <div class="step-3 hidden">
                    <h2 class="text-2xl font-bold mb-6">Choose Your Barber</h2>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($barbers as $barber)
                            <div class="bg-white rounded-lg shadow-md p-6">
                                @if ($barber->images)
                                    <img src="{{ asset($barber->images->path) }}" alt="Barber" class="w-32 h-32 rounded-full mx-auto">
                                @else
                                    <img src="https://via.placeholder.com/150" alt="Barber" class="w-32 h-32 rounded-full mx-auto">
                                @endif
                                <h3 class="text-xl font-semibold text-center mt-4">{{ $barber->last_name }} {{ $barber->first_name }}</h3>
                                <p class="text-gray-600 text-center mt-2">{{ $barber->barber_type }} Barber</p>
                                <button class="w-full mt-4 bg-blue-500 text-white py-2 rounded hover:bg-blue-600" data-barber-id="{{ $barber->id }}">Select</button>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Step 4: Customer Information (Initially Hidden) -->
                <div class="step-4 hidden">
                    <h2 class="text-2xl font-bold mb-6">Your Information</h2>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <form id="customer-form">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-700 mb-2">First Name</label>
                                    <input type="text" name="first_name" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 mb-2">Last Name</label>
                                    <input type="text" name="last_name" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 mb-2">Email</label>
                                    <input type="email" name="email" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 mb-2">Phone</label>
                                    <input type="tel" name="phone" class="w-full p-2 border rounded" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Step 5: Booking Summary (Initially Hidden) -->
                <div class="step-5 hidden">
                    <h2 class="text-2xl font-bold mb-6">Booking Summary</h2>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="border-b pb-4">
                            <h3 class="font-semibold">Selected Service</h3>
                            <p class="text-gray-600" id="summary-service"></p>
                        </div>
                        <div class="border-b py-4">
                            <h3 class="font-semibold">Date & Time</h3>
                            <p class="text-gray-600" id="summary-datetime"></p>
                        </div>
                        <div class="border-b py-4">
                            <h3 class="font-semibold">Barber</h3>
                            <p class="text-gray-600" id="summary-barber"></p>
                        </div>
                        <div class="pt-4">
                            <h3 class="font-semibold">Total</h3>
                            <p class="text-2xl font-bold text-blue-600" id="summary-total"></p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="mt-8 flex justify-between">
                    <button class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400" id="prev-btn">Previous</button>
                    <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600" id="next-btn">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<x-user.footer></x-user.footer>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script>
    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Modal functionality
        window.openModal = (modalId) => {
            document.getElementById(modalId).classList.remove('hidden');
        };

        window.closeModal = (modalId) => {
            document.getElementById(modalId).classList.add('hidden');
        };

        window.addEventListener('click', (e) => {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const user_id = '{{ Auth::user()->id }}'
        let bookingData = {
            user_id: user_id,
            service_id: null,
            service_name: null,
            service_price: null,
            date: null,
            time: null,
            barber_id: null,
            barber_name: null,
            customer: {
                first_name: null,
                last_name: null,
                email: null,
                phone: null
            }
        };

        const steps = ['step-1', 'step-2', 'step-3', 'step-4', 'step-5'];
        let currentStep = 1;

        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');

        function updateSteps() {
            steps.forEach((step, index) => {
                const element = document.querySelector(`.${step}`);
                if (index === currentStep - 1) {
                    element.classList.remove('hidden');
                } else {
                    element.classList.add('hidden');
                }
            });

            const progress = currentStep * 20;
            document.querySelector('.bg-blue-500').style.width = `${progress}%`;

            prevBtn.style.visibility = currentStep === 1 ? 'hidden' : 'visible';
            nextBtn.textContent = currentStep === steps.length ? 'Confirm Booking' : 'Next';

            if (currentStep === 5) {
                document.getElementById('summary-service').textContent = `${bookingData.service_name} - $${bookingData.service_price}`;
                document.getElementById('summary-datetime').textContent = `${bookingData.date} ${bookingData.time}`;
                document.getElementById('summary-barber').textContent = bookingData.barber_name;
                document.getElementById('summary-total').textContent = `$${bookingData.service_price}`;
            }
        }

        const serviceCards = document.querySelectorAll('.step-1 .cursor-pointer');
        serviceCards.forEach(card => {
            card.addEventListener('click', function() {
                serviceCards.forEach(c => c.classList.remove('border-blue-500', 'border-2'));
                this.classList.add('border-blue-500', 'border-2');
                bookingData.service_id = this.dataset.serviceId;
                bookingData.service_name = this.querySelector('h3').textContent;
                bookingData.service_price = parseFloat(this.querySelector('.text-blue-600').textContent.replace('$', ''));
            });
        });

        flatpickr("#date-picker", {
            minDate: "today",
            disable: [function(date) { return (date.getDay() === 0); }],
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr) {
                bookingData.date = dateStr;
                updateTimeSlots();
            }
        });

        function updateTimeSlots() {
            const timeSlots = document.querySelectorAll('#time-slots button');
            timeSlots.forEach(slot => {
                slot.addEventListener('click', function() {
                    timeSlots.forEach(s => s.classList.remove('bg-blue-500', 'text-white'));
                    this.classList.add('bg-blue-500', 'text-white');
                    bookingData.time = this.dataset.time;
                });
            });
        }

        updateTimeSlots();

        const barberButtons = document.querySelectorAll('.step-3 button');
        barberButtons.forEach(button => {
            button.addEventListener('click', function() {
                barberButtons.forEach(b => b.classList.remove('bg-blue-600'));
                this.classList.add('bg-blue-600');
                bookingData.barber_id = this.dataset.barberId;
                bookingData.barber_name = this.parentElement.querySelector('h3').textContent;
            });
        });

        document.querySelector('#customer-form').addEventListener('input', function(e) {
            const field = e.target.name;
            bookingData.customer[field] = e.target.value;
        });

        prevBtn.addEventListener('click', () => {
            if (currentStep > 1) {
                currentStep--;
                updateSteps();
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentStep === 1 && !bookingData.service_id) {
                alert('Please select a service');
                return;
            }
            if (currentStep === 2 && (!bookingData.date || !bookingData.time)) {
                alert('Please select both date and time');
                return;
            }
            if (currentStep === 3 && !bookingData.barber_id) {
                alert('Please select a barber');
                return;
            }
            if (currentStep === 4) {
                const { first_name, last_name, email, phone } = bookingData.customer;
                if (!first_name || !last_name || !email || !phone) {
                    alert('Please fill in all customer information');
                    return;
                }
            }

            if (currentStep < steps.length) {
                currentStep++;
                updateSteps();
            } else {
                if (!bookingData.service_id || !bookingData.date || !bookingData.time || !bookingData.barber_id ||
                    !bookingData.customer.first_name || !bookingData.customer.last_name ||
                    !bookingData.customer.email || !bookingData.customer.phone) {
                    alert('Please complete all steps before confirming');
                    return;
                }

                console.log('Sending bookingData:', bookingData);

                fetch('/user/bookings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(bookingData)
                })
                    .then(response => {
                        if (!response.ok) {
                            return response.text().then(text => {
                                throw new Error(`HTTP error! Status: ${response.status}, Response: ${text}`);
                            });
                        }
                        return response.text();
                    })
                    .then(text => {
                        try {
                            const data = JSON.parse(text);
                            if (data.success) {
                                alert('Booking confirmed!');
                                window.location.href = '/user/dashboard';
                            } else {
                                alert('Error: ' + (data.message || 'Unknown server error'));
                            }
                        } catch (e) {
                            throw new Error(`Failed to parse JSON: ${e.message}, Response: ${text}`);
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                        alert(`Failed to confirm booking: ${error.message}`);
                    });
            }
        });

        updateSteps();
    });
</script>
