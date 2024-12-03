<li class="nav-item">
    <div class="dropdown">
        <button style="border: none;" class="login_icon dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ url('assets/images/login_icon.png') }}" alt="">
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @auth
                <li>
                    <form id="logout-form" action="{{ route('signout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
                </li>
            @else
                <li><a href="{{ route('signin') }}">Sign In</a></li>
                <hr>
                <li><a href="{{ route('signup') }}">Sign Up</a></li>
            @endauth
        </ul>
    </div>
</li>
