<html>
    <head>
    @vite('resources/css/app.css')
    <title>Projekt Rally</title>
    </head>
    <body>
    <div class="navbar bg-primary text-primary-content">
  <div class="flex-1">
    <a class="btn btn-ghost text-xl">Rally</a>
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
        <li>
          <a class="justify-between">
            Profil
            <span class="badge">Nové</span>
          </a>
        </li>
        <li><a>Nastavení</a></li>
        <li><a>Odhlásit se</a></li>
      </ul>
    </div>
  </div>
</div>
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript" src="/resources/js/app.js"></script>
    </body>
</html>
@yield('content')