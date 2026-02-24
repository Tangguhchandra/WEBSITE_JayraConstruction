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
                    class="transition
                    {{ request()->routeIs('home') 
                        ? 'text-yellow-400 border-b-2 border-yellow-400 pb-1' 
                        : 'hover:text-yellow-400' }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.about') }}"
                    class="transition
                    {{ request()->routeIs('about') 
                        ? 'text-yellow-400 border-b-2 border-yellow-400 pb-1' 
                        : 'hover:text-yellow-400' }}">
                        Profile
                    </a>
                </li>
                <li><a href="#" class="hover:text-yellow-400 transition">Service</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition">Project</a></li>
                <li><a href="#" class="hover:text-yellow-400 transition">Contact</a></li>
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