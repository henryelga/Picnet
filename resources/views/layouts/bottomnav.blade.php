<div class="bottomnav">
    <a href="/posts">
        @if (Request::is('posts'))
            <img class="navicons" src="https://img.icons8.com/fluency-systems-filled/48/1A1A1A/home.png" alt="home icon" />
        @else
            <img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/home--v1.png" alt="home icon" />
        @endif
        {{-- Home --}}
    </a>
    @guest
        <a href="/register">
            <img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/add-user-male--v1.png"
                alt="register" />
            {{-- Register --}}
        </a>
        <a href="/login">
            <img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/enter-2.png" alt="login icon" />
            {{-- Login --}}
        </a>
    @else
        <a href="{{ route('posts.create') }}">
            @if (Request::is('posts/create'))
                <img class="navicons" src="https://img.icons8.com/fluency-systems-filled/48/1A1A1A/plus.png"
                    alt="create icon" />
            @else
                <img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/plus.png" alt="create icon" />
            @endif
            {{-- Create --}}
        </a>

        <a href="/profile">
            @if (Request::is('profile'))
                <img class="navicons" src="https://img.icons8.com/fluency-systems-filled/48/1A1A1A/user-male-circle.png"
                    alt="user icon" />
            @else
                <img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/user-male-circle--v1.png"
                    alt="user icon" />
            @endif
            {{-- Profile --}}
        </a>
    @endguest

    @admin
        <a href="{{ route('admin.dashboard') }}">
            @if (Request::is('admin/dashboard'))
                <img class="navicons" src="https://img.icons8.com/fluency-systems-filled/48/1A1A1A/data-configuration.png"
                    alt="admin icon" />
            @else
                <img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/1A1A1A/data-configuration.png"
                    alt="admin icon" />
            @endif
            {{-- Admin --}}
        </a>
    @endadmin

    @auth
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img
                class="navicons flipped" img src="https://img.icons8.com/fluency-systems-regular/48/exit--v1.png"
                alt="logout icon" />
                {{-- Logout --}}
            </a>
    @endauth

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
