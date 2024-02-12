<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rese</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app_index.css') }}">
  <script src="https://kit.fontawesome.com/2c44c57695.js" crossorigin="anonymous"></script>
  @yield('css')
</head>

<body class="container">
  <header class="header">
    <div class="header__content">
      <div class="hamburger-menu">
        <input type="checkbox" id="overlay-input" />
        <label for="overlay-input" id="overlay-button"><span></span></label>
        <div id="overlay">
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/register">Registration</a></li>
            <li><a href="/login">Login</a></li>
          </ul>
        </div>
        @if (Auth::check())
        <div id="overlay">
          <ul>
            <li><a href="/">Home</a></li>
            <form class="form" action="/logout" method="post">
            @csrf
            <li><a href="/logout">Logout</a></li>
            </form>
            <li><a href="/mypage">Mypage</a></li>
          </ul>
        </div>
        @endif
      </div>
      <div class="header__logo">
        <a class="logo__name">Rese</a>
      </div>
      <div class="search">
        <form action="{{ route('search') }}" method="GET">
          <table>
            <tr>
              <th>
                <select name="area" id="area">
                  <option value="area1">All area</option>
                  <option value="area2">東京都</option>
                  <option value="area3">大阪府</option>
                  <option value="area3">福岡県</option>
                </select>
              </th>
              <th>
                <select name="genre" id="genre">
                  <option value="genre1">All genre</option>
                  <option value="genre2">寿司</option>
                  <option value="genre3">イタリアン</option>
                  <option value="genre4">居酒屋</option>
                  <option value="genre5">焼肉</option>
                </select>
              </th>
              <th>
                <button type="submit">Search</button>
              </th>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </header>

  <main class="main">
    @yield('content')
  </main>

</body>
</html>