<html>
    <head>
    @vite('resources/css/app.css')
    <title>Rally Racing</title>
    <meta charset="UTF-8">
    
    </head>
    <body>
    <div class="navbar bg-primary text-primary-content">

  <div class="flex-1">

    <a class="btn btn-ghost text-xl" href="{{ url('/car') }}">Rally Racing</a>
  </div>
  <div class="flex-none gap-2">
    <div class="form-control">
      <input type="text" placeholder="Hledat" class="input input-bordered w-24 md:w-auto" />
    </div>
    <div class="dropdown dropdown-end">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img alt="Tailwind CSS Navbar component" src="https://cdn.iconscout.com/icon/free/png-512/free-user-1556-528036.png?f=webp&w=256" />
        </div>
      </div>
      <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-primary text-primary-content rounded-box w-52">
        @auth
        <li>
          <a href="{{ url('/import') }}" class="justify-between">
            CSV soubory
            <span class="badge">Nové</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/download-pdf') }}" class="justify-between">
            PDF soubory
            <span class="badge">Nové</span>
          </a>
        </li>
        @if (Auth::user()->role == 'admin')
        <li>
          <a href="{{ url('/car') }}" class="justify-between">
            Editace aut
            <span class="badge">Nové</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/country') }}" class="justify-between">
            Editace zemí
            <span class="badge">Nové</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/country/create') }}" class="justify-between">
            Přidávání zemí
            <span class="badge">Nové</span>
          </a>
        </li>
        @endif
       
        @if (Auth::user()->role == 'default')
        <li>
          <a href="{{ url('/car') }}" class="justify-between">
            Auta
            <span class="badge">Nové</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/cpuntry') }}" class="justify-between">
            Země
            <span class="badge">Nové</span>
          </a>
        </li>
        @endif

        
        @if (Auth::user()->role == 'admin')
        <li><a href="{{ url('/cars/create') }}" >Přidávání aut</a></li>
        @endif
        <li><a href="{{ url('/user/profile') }}">Profil</a></li>
        @endauth
        @guest
        <li>
          <a href="{{ url('/download-pdf') }}" class="justify-between">
            PDF soubory
            <span class="badge">Nové</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/import') }}" class="justify-between">
            CSV soubory
            <span class="badge">Nové</span>
          </a>
        </li>
        <li>
        <li>
        <a href="{{ url('/car') }}" class="justify-between">
            Tabulka auta
            <span class="badge">Nové</span>
          </a>
        </li>
        <li>
        <a href="{{ url('/country') }}" class="justify-between">
            Tabulka zemí
            <span class="badge">Nové</span>
          </a>
        </li>
        <li><a href="{{ url('/login') }}">Přihlášení</a></li>
        @endguest
      </ul>
    </div>
  </div>
</div>
@vite('resources/js/app.js')
@vite('resources/css/app.css')
    </body>
</html>
@yield('content')