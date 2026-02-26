<nav class="sticky top-4 z-50 transition-all duration-500">
    <div class="max-w-6xl mx-auto px-6 flex justify-end items-center gap-4">

        <div id="navbar-inner"
            class="bg-[#0b2a3f]/80 backdrop-blur-md
                   text-white rounded-md px-8 py-4
                   flex items-center gap-10 shadow-lg
                   transition-all duration-700 ease-[cubic-bezier(0.4,0,0.2,1)]
                   origin-right">

            <ul class="flex items-center gap-14 text-sm font-medium">
                <li>
                    <a href="{{ route('user.home') }}"
                    class="transition-all duration-300 hover:-translate-y-1 hover:text-yellow-400 focus:outline-none flex flex-col justify-center items-center group
                    {{ request()->routeIs('user.home') ? 'text-yellow-400' : '' }}">
                        Home
                        <span class="mt-1 h-[2px] w-full bg-yellow-400 transform origin-left transition-transform duration-300 {{ request()->routeIs('user.home') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.service') }}" 
                    class="transition-all duration-300 hover:-translate-y-1 hover:text-yellow-400 focus:outline-none flex flex-col justify-center items-center group
                    {{ request()->routeIs('user.service') ? 'text-yellow-400' : '' }}">
                        Service
                        <span class="mt-1 h-[2px] w-full bg-yellow-400 transform origin-left transition-transform duration-300 {{ request()->routeIs('user.service') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.project') }}" 
                    class="transition-all duration-300 hover:-translate-y-1 hover:text-yellow-400 focus:outline-none flex flex-col justify-center items-center group
                    {{ request()->routeIs('user.project') ? 'text-yellow-400' : '' }}">
                        Project
                        <span class="mt-1 h-[2px] w-full bg-yellow-400 transform origin-left transition-transform duration-300 {{ request()->routeIs('user.project') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.about') }}"
                    class="transition-all duration-300 hover:-translate-y-1 hover:text-yellow-400 focus:outline-none flex flex-col justify-center items-center group
                    {{ request()->routeIs('user.about') ? 'text-yellow-400' : '' }}">
                        Profile
                        <span class="mt-1 h-[2px] w-full bg-yellow-400 transform origin-left transition-transform duration-300 {{ request()->routeIs('user.about') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.contact') }}" 
                    class="transition-all duration-300 hover:-translate-y-1 hover:text-yellow-400 focus:outline-none flex flex-col justify-center items-center group
                    {{ request()->routeIs('user.contact') ? 'text-yellow-400' : '' }}">
                        Contact
                        <span class="mt-1 h-[2px] w-full bg-yellow-400 transform origin-left transition-transform duration-300 {{ request()->routeIs('user.contact') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                    </a>
                </li>
            </ul>

             <a href="{{ route('login') }}" 
               class="text-sm hover:text-yellow-400 transition pl-4 border-l border-white/20">
                Login
            </a> 
        </div>

        <button id="navToggle"
            class="bg-[#0b2a3f] text-white px-3 py-2 rounded-md shadow-lg transition hover:scale-105">
            ☰
        </button>

    </div>
</nav>