<!DOCTYPE html>
<html lang="{{str_replace('','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>{{$title ?? ''}}</title>
    <meta name ="description" content ="{{$description ?? ''}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CVTheque</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#">Home
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('competence.index')}}">Compétences</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('metiers.index')}}">Métiers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('professionnels.index')}}">Professionels</a>
              </li>

            </ul>
            <form class="form-inline ml-auto" action="{{ route('professionnels.search') }}" method="GET">
    <input class="form-control mr-sm-2" type="search" name="query" id="search" placeholder="Rechercher un professionnel" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
</form>

    </div>
</nav>
          </div>
        </div>
      </nav>
      <div>
            @yield('contenu')
      </div>

</body>
</html>