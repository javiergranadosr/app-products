<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD TASK</title>
        <!-- Styles -->
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        
    </head>
    <body>
        <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-success d-flex justify-content-center">
              <a class="navbar-brand" href="#"> CRUD PRODUCTS</a>
            </nav>
        </header>

        <main-component></main-component>
        
      </div>  
        <script src="https://kit.fontawesome.com/c394e4529c.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        

    </body>
</html>
