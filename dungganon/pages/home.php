<?php include('../includes/header.php') ?>

<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex flex-col md:flex-row items-center md:justify-between p-4 md:p-6 rounded-2xl max-w-5xl mx-auto mb-16">
            <div class="flex items-center space-x-4 mb-6 md:mb-0">
                <img src="../assets/images/logo.jpeg" alt="Dungganon Lending Logo" class="w-16 h-16 rounded-full object-cover border-4 border-emerald-600 shadow-xl" />
                <div>
                    <span class="text-emerald-700 font-extrabold text-3xl tracking-tight">Dungganon Lending</span>
                    <p class="text-gray-500 text-base">Your Partner in Online Financial Solutions</p>
                </div>
            </div>

            <button class="btn btn-lg bg-emerald-600 text-white border-emerald-600 hover:bg-emerald-700 hover:border-emerald-700 normal-case flex items-center space-x-2 shadow-lg transition duration-300 transform hover:scale-[1.02] active:scale-100"
                onclick="document.getElementById('my_modal_1').showModal()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                </svg>
                <span>Apply Now / Login</span>
            </button>
        </div>

        <div class="text-center">
            <h1 class="text-6xl md:text-7xl font-extrabold text-gray-900 leading-snug">
                Empower Your <span class="text-emerald-600">Financial Future</span>
            </h1>
            <p class="text-gray-600 mt-6 max-w-2xl mx-auto text-xl">
                Fast, secure online lending and payment solutions tailored for your success. Build your tomorrow with confidence.
            </p>
            <div class="mt-10">
                <button class="btn btn-lg bg-emerald-600 text-white border-emerald-600 px-10 py-3 rounded-full shadow-2xl hover:bg-emerald-700 hover:border-emerald-700 transition duration-300 transform hover:translate-y-[-2px] hover:shadow-3xl"
                    onclick="document.getElementById('my_modal_1').showModal()">Get Started Today</button>
            </div>
        </div>

    </div>
</section>



<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-extrabold mb-4 text-center text-gray-900">Our Tailored Services</h2>
        <p class="text-center text-gray-600 mb-16 max-w-3xl mx-auto text-lg">Explore our comprehensive range of lending and payment services designed to meet diverse financial needs with flexibility and speed.</p>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="card p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition duration-300 bg-white group">
                <div class="mb-4">
                    <div class="bg-emerald-50 p-4 rounded-xl inline-block group-hover:bg-emerald-100 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Personal Loans</h3>
                <p class="text-gray-600">
                    Quick and flexible personal loans for emergencies, crucial purchases, or debt consolidation.
                </p>
                <button class="btn btn-link text-emerald-600 mt-4 px-0 hover:text-emerald-700">Learn More &rarr;</button>
            </div>

            <div class="card p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition duration-300 bg-white group">
                <div class="mb-4">
                    <div class="bg-sky-50 p-4 rounded-xl inline-block group-hover:bg-sky-100 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Business Loans</h3>
                <p class="text-gray-600">
                    Essential capital for startups, business expansions, and supporting critical operational needs.
                </p>
                <button class="btn btn-link text-sky-600 mt-4 px-0 hover:text-sky-700">Learn More &rarr;</button>
            </div>

            <div class="card p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition duration-300 bg-white group">
                <div class="mb-4">
                    <div class="bg-indigo-50 p-4 rounded-xl inline-block group-hover:bg-indigo-100 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Payment Processing</h3>
                <p class="text-gray-600">
                    Secure and seamless online payment system with support for multiple trusted gateway integrations.
                </p>
                <button class="btn btn-link text-indigo-600 mt-4 px-0 hover:text-indigo-700">Learn More &rarr;</button>
            </div>

            <div class="card p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition duration-300 bg-white group">
                <div class="mb-4">
                    <div class="bg-rose-50 p-4 rounded-xl inline-block group-hover:bg-rose-100 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Loan Refinancing</h3>
                <p class="text-gray-600">
                    Opportunity to lower your interest rates and restructure existing loan terms for better manageability.
                </p>
                <button class="btn btn-link text-rose-600 mt-4 px-0 hover:text-rose-700">Learn More &rarr;</button>
            </div>

        </div>
    </div>
</section>

<section class="py-20 bg-gradient-to-br from-emerald-50 to-teal-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold mb-12 text-gray-900">Why Choose Dungganon?</h2>
        <div class="grid md:grid-cols-3 gap-10">
            <div class="p-8 bg-white rounded-3xl shadow-xl border-t-4 border-emerald-500 hover:shadow-2xl transition duration-300 transform hover:translate-y-[-4px]">
                <div class="text-6xl mb-6">🔒</div>
                <h3 class="text-2xl font-bold mb-3 text-gray-800">Secure & Reliable</h3>
                <p class="text-gray-600">We implement bank-level encryption and security protocols for every single transaction.</p>
            </div>
            <div class="p-8 bg-white rounded-3xl shadow-xl border-t-4 border-sky-500 hover:shadow-2xl transition duration-300 transform hover:translate-y-[-4px]">
                <div class="text-6xl mb-6">🚀</div>
                <h3 class="text-2xl font-bold mb-3 text-gray-800">Rapid Approval</h3>
                <p class="text-gray-600">Our streamlined online process ensures you get approved and funded quickly—in minutes, not days.</p>
            </div>
            <div class="p-8 bg-white rounded-3xl shadow-xl border-t-4 border-amber-500 hover:shadow-2xl transition duration-300 transform hover:translate-y-[-4px]">
                <div class="text-6xl mb-6">💸</div>
                <h3 class="text-2xl font-bold mb-3 text-gray-800">Competitive Rates</h3>
                <p class="text-gray-600">Access affordable, transparent interest rates and flexible payment terms tailored just for you.</p>
            </div>
        </div>
    </div>
</section>


<dialog id="my_modal_1" class="modal">
    <div class="modal-box bg-white rounded-2xl shadow-3xl p-8">

        <div id="signin_section">
            <h3 class="font-bold text-3xl mb-6 text-gray-800">Welcome Back</h3>

            <form id="signinForm" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" placeholder="Enter your email" id="login_email" class="input input-bordered w-full p-3 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" placeholder="Enter your password" id="login_password" class="input input-bordered w-full p-3 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required />
                </div>

                <p class="text-sm text-gray-600 pt-2">
                    New to Dungganon?
                    <span class="text-emerald-600 cursor-pointer font-semibold hover:underline" onclick="swapForm('signup')">Create an account</span>
                </p>

                <div class="modal-action mt-6">
                    <button type="submit" class="btn btn-lg bg-emerald-600 text-white border-emerald-600 hover:bg-emerald-700 px-8">Sign In</button>
                    <button type="button" class="btn btn-lg btn-ghost" onclick="my_modal_1.close()">Cancel</button>
                </div>
            </form>
        </div>

        <div id="signup_section" class="hidden">
            <h3 class="font-bold text-3xl mb-6 text-gray-800">Create Your Account</h3>

            <form id="signupForm" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" placeholder="Enter your email" id="email" class="input input-bordered w-full p-3 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" placeholder="Create a password" id="password" class="input input-bordered w-full p-3 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required />
                </div>

                <p class="text-sm text-gray-600 pt-2">
                    Already have an account?
                    <span class="text-emerald-600 cursor-pointer font-semibold hover:underline" onclick="swapForm('signin')">Sign in here</span>
                </p>

                <div class="modal-action mt-6">
                    <button type="submit" class="btn btn-lg bg-emerald-600 text-white border-emerald-600 hover:bg-emerald-700 px-8">Sign Up</button>
                    <button type="button" class="btn btn-lg btn-ghost" onclick="my_modal_1.close()">Cancel</button>
                </div>
            </form>
        </div>

    </div>
</dialog>

<?php include('../includes/footer.php') ?>