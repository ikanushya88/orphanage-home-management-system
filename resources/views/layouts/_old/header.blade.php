<nav
    class="top-0 fixed z-50 w-full flex flex-wrap items-center justify-between px-2 navbar-expand-lg bg-white shadow">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
            <a class="text-blueGray-700 text-sm font-bold leading-relaxed inline-block mr-4 whitespace-nowrap uppercase" href="/">
            <img src="/logo.png" class="h-16 w-16" alt="">
            </a>
            <button
                class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button" onclick="toggleNavbar('example-collapse-navbar')">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden"
            id="example-collapse-navbar">
            <ul class="flex flex-col lg:flex-row list-none mr-auto">
                <li class="flex items-center">
                    <a class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="/">
                        Home</a>
                </li>
                <li class="flex items-center group">
                    <a class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold dropdown"
                        href="javascript:void(0)" onclick="openDropdown(event,'our-services-dropdown')"> Our
                        Services</a>
                    <div class="hidden group-hover:block bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48 navbar-popper dropdown-menu absolute top-0 mt-11"
                        id="our-services-dropdown">
                        <a href="/"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Our Work
                        </a>
                        <a href="/"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Home Admission
                        </a>
                    </div>
                </li>
                <li class="flex items-center group">
                    <a class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold dropdown"
                        href="javascript:void(0)" onclick="openDropdown(event,'about-us-dropdown')"> About
                        Us</a>
                    <div class="hidden group-hover:block bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48 navbar-popper dropdown-menu absolute top-0 mt-11"
                        id="about-us-dropdown">
                        <a href="/"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Our Team
                        </a>
                        <a href="/"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                            Future Projects
                        </a>
                    </div>
                </li>
                <li class="flex items-center">
                    <a class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="/">
                        Donate</a>
                </li>
                <li class="flex items-center">
                    <a class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="/">
                        Sponsor Child</a>
                </li>
                <li class="flex items-center">
                    <a class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="/">
                        Contact Us</a>
                </li>
                <li class="flex items-center">
                    <a class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="/">
                        Gallery</a>
                </li>
            </ul>
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center mb-5 mt-5">
                <div class="md:hidden border-t-2"></div>
                {{-- <li class="inline-block relative">
                            <a class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                href="#pablo" onclick="openDropdown(event,'demo-pages-dropdown')">
                                Demo Pages
                            </a>
                            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48 navbar-popper"
                                id="demo-pages-dropdown">
                                <span
                                    class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">
                                    Admin Layout
                                </span>
                                <a href="/"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                    Dashboard
                                </a>
                                <a href="/"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                    Settings
                                </a>
                                <a href="/"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                    Tables
                                </a>
                                <a href="/"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                    Maps
                                </a>
                                <div class="h-0 mx-4 my-2 border border-solid border-blueGray-100"></div>
                                <span
                                    class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">
                                    Auth Layout
                                </span>
                                <a href="/"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                    Login
                                </a>
                                <a href="/"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                    Register
                                </a>
                                <div class="h-0 mx-4 my-2 border border-solid border-blueGray-100"></div>
                                <span
                                    class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">
                                    No Layout
                                </span>
                                <a href="/"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                    Landing
                                </a>
                                <a href="/"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                    Profile
                                </a>
                            </div>
                        </li>
                        <li class="flex items-center">
                            <a class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                href="/tim.com%2Fnotus-js%2F"
                                target="_blank"><i class="text-blueGray-400 fab fa-facebook text-lg leading-lg"></i><span
                                    class="lg:hidden inline-block ml-2">Share</span></a>
                        </li>
                        <li class="flex items-center">
                            <a class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                href="/tim.com%2Fnotus-js%2F&amp;text=Start%20your%20development%20with%20a%20Free%20Tailwind%20CSS%20and%20JavaScript%20UI%20Kit%20and%20Admin.%20Let%20Notus%20JS%20amaze%20you%20with%20its%20cool%20features%20and%20build%20tools%20and%20get%20your%20project%20to%20a%20whole%20new%20level."
                                target="_blank"><i class="text-blueGray-400 fab fa-twitter text-lg leading-lg"></i><span
                                    class="lg:hidden inline-block ml-2">Tweet</span></a>
                        </li>
                        <li class="flex items-center">
                            <a class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                href="/index" target="_blank"><i
                                    class="text-blueGray-400 fab fa-github text-lg leading-lg"></i><span
                                    class="lg:hidden inline-block ml-2">Star</span></a>
                        </li> --}}
                @auth
                <li class="flex items-center justify-center">
                    <div>Hello {{auth()->user()->name}}</div>
                    <div>
                        <a class="text-white bg-red-500 active:bg-red-600 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                            href="#" onclick="document.getElementById('logout-form').submit()">
                            <i class="fas fa-lock"></i> Logout
                        </a>
                        <form action="/logout" method="post" id="logout-form"> @csrf </form>
                    </div>
                </li>  
                @endauth
                @guest
                <li class="flex items-center">
                    <a class="text-white bg-pink-500 active:bg-pink-600 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                        href="/login">
                        <i class="fas fa-lock"></i> Login
                    </a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>