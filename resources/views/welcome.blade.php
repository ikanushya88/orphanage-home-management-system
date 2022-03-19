<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}

    <section class="header relative pt-16 items-center flex h-screen max-h-860-px">
        <div class="container mx-auto items-center flex flex-wrap">
            <div class="w-full md:w-8/12 lg:w-6/12 xl:w-6/12 px-4">
                <div class="pt-32 sm:pt-0">
                    <h2 class="font-semibold text-4xl text-blueGray-600">
                        Dedicated service to the needy Children
                    </h2>
                    {{-- <p class="mt-4 text-lg leading-relaxed text-blueGray-500">
                                Notus JS is Free and Open Source. It does not change any of the
                                CSS from
                                <a href="https://tailwindcss.com/?ref=creativetim" class="text-blueGray-600" target="_blank">
                                    Tailwind CSS.
                                </a>
                                It features multiple HTML elements and it comes with dynamic
                                components for ReactJS, Vue and Angular.
                            </p> --}}
                    <div class="mt-12">
                        <a href="javascript:void(0)" onclick=" window.scrollBy(0, 550);"
                            class="get-started text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-1 bg-pink-500 active:bg-pink-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150">
                            Get started
                        </a>
                        @guest
                        <a href="/login"
                            class="github-star ml-1 text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-1 bg-blueGray-700 active:bg-blueGray-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150"
                            target="_blank">
                            Login
                        </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        <img class="absolute top-0 b-auto right-0 pt-16 sm:w-6/12 -mt-48 sm:mt-0 w-10/12 max-h-860-px"
            src="/img/banner.jpg" alt="...">
    </section>

    <section class="mt-48 md:mt-40 pb-40 relative bg-blueGray-100">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center">
                <div class="w-10/12 md:w-6/12 lg:w-4/12 px-12 md:px-4 mr-auto ml-auto -mt-32">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-800"
                        id="start-over">
                        <img alt="..."
                            src="/logo.png"
                            class="w-full align-middle rounded-t-lg">
                        {{-- <blockquote class="relative p-8 mb-4">
                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95"
                                class="absolute left-0 w-full block h-95-px -top-94-px">
                                <polygon points="-30,95 583,95 583,65" class="text-pink-500 fill-current"></polygon>
                            </svg>
                            <img src="/logo.png" style="w-20 h-20" alt="" /> --}}
                            {{-- <h4 class="text-xl font-bold text-white">
                                        CHILD WELFARE
                                    </h4>
                                    <p class="text-md font-light mt-2 text-white">
                                        We provide a hygiene environment, balanced nutritious food, clothing, better education, moral, basic family values, culture and above all the true value of love and affection.
                                    </p>
                        </blockquote> --}}
                    </div>
                </div>

                <div class="w-full md:w-6/12 px-4">
                    <p class="text-xl">
                        Kids don't choose to be an orphan. They don't decide to lose their loved one to illness,
                        violence,
                        relocation &amp; disaster. They don;t decided to endure the side effects of such a significant
                        misforture, In any case you can decide to give them trust.
                    </p>
                    {{-- <p class="mt-8 text-2xl font-bold">OLD AGE HOME</p>
                            <p class="text-xl">
                                One of the unique aspect of our organisation ... all our children have the support of our senior citizen who themselves are neglected by their kind. In return, the senior citizen get love and affection from the tiny ... when they need it.
                            </p> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="block relative z-1 bg-red-600">
        <div class="container mx-auto">
            <div class="justify-center flex flex-wrap">
                <div class="w-full lg:w-12/12 px-4 -mt-24">
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-4/12 px-4">
                            <h5 class="text-xl font-semibold pb-4 text-center">
                                Child welfare
                            </h5>
                            <a href="./pages/auth/login.html">
                                <div
                                    class="hover:-mt-4 relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg ease-linear transition-all duration-150">
                                    <img alt="..." class="align-middle border-none max-w-full h-auto rounded-lg"
                                        src="/img/welfare.jpg">
                                </div>
                            </a>
                        </div>

                        <div class="w-full lg:w-4/12 px-4">
                            <h5 class="text-xl font-semibold pb-4 text-center">
                                Save poor child
                            </h5>
                            <a href="./pages/profile.html">
                                <div
                                    class="hover:-mt-4 relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg ease-linear transition-all duration-150">
                                    <img alt="..." class="align-middle border-none max-w-full h-auto rounded-lg"
                                        src="/img/poor-child.jpg">
                                </div>
                            </a>
                        </div>

                        <div class="w-full lg:w-4/12 px-4">
                            <h5 class="text-xl font-semibold pb-4 text-center">
                                Fundraise for home
                            </h5>
                            <a href="./pages/landing.html">
                                <div
                                    class="hover:-mt-4 relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg ease-linear transition-all duration-150">
                                    <img alt="..." class="align-middle border-none max-w-full h-auto rounded-lg"
                                        src="/img/fundraiser.jpg">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-red-600 overflow-hidden">
        <div class="container mx-auto pb-64">
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-5/12 px-12 md:px-4 ml-auto mr-auto md:mt-64">
                    <div
                        class="text-red-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-white">
                        <i class="fas fa-exclamation-triangle text-xl"></i>
                    </div>
                    <h3 class="text-3xl mb-2 font-semibold leading-normal text-white">
                        SAVE EVERY CHILD
                    </h3>
                    <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-white">
                        Child abuse is not just physical violence directed at a child. It is any form of maltreatment by
                        an
                        adult, which is violent or threatening for the child. This includes neglect.
                    </p>
                    <p class="text-lg font-light leading-relaxed mt-0 mb-4 text-white">
                        Feel free to let us know about the child abuse complaints.
                    </p>
                    <a href="https://github.com/creativetimofficial/notus-js?ref=njs-index" target="_blank"
                        class="github-star mt-4 inline-block text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-1 bg-blueGray-700 active:bg-blueGray-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150">
                        Make Complaint
                    </a>
                </div>

                <div class="w-full md:w-4/12 px-4 mr-auto ml-auto mt-32 relative">
                    <i
                        class="fab fa-child text-blueGray-700 text-55 absolute -top-150-px -right-100 left-auto opacity-80"></i>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-16 bg-blueGray-200 relative pt-32">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center bg-white shadow-xl rounded-lg -mt-64 py-16 px-12 relative z-10">
                <div class="w-full text-center lg:w-8/12">
                    <p class="text-4xl text-center">
                        <span role="img" aria-label="love"> 😍 </span>
                    </p>
                    <h3 class="font-semibold text-3xl">
                        Subscribe {{config('app.name')}}
                    </h3>
                    <p class="text-blueGray-500 text-lg leading-relaxed mt-4 mb-4">
                        We occassionally send you our events related to helping hands together with poor children.
                        Subscribe
                        us to get all activities without missing.
                    </p>
                    <div class="sm:block flex flex-col mt-10">
                        <a href="https://www.creative-tim.com/learning-lab/tailwind/js/overview/notus?ref=njs-index"
                            target="_blank"
                            class="get-started text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-2 bg-pink-500 active:bg-pink-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150">
                            Subscribe
                        </a>
                    </div>
                    <div class="text-center mt-16"></div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>