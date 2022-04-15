<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="/logo.png" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{asset('vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="text-blueGray-700">
        {{-- @include('layouts.header') --}}
            
        <div class="">
            {{ $slot }}
        </div>

        {{-- @include('layouts.footer') --}}

        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
        <script>
            /* Make dynamic date appear */
            (function () {
              if (document.getElementById("get-current-year")) {
                document.getElementById(
                  "get-current-year"
                ).innerHTML = new Date().getFullYear();
              }
            })();
            /* Function for opning navbar on mobile */
            function toggleNavbar(collapseID) {
              document.getElementById(collapseID).classList.toggle("hidden");
              document.getElementById(collapseID).classList.toggle("block");
            }
            /* Function for dropdowns */
            function openDropdown(event, dropdownID) {
            hideOnBlur(event);
              let element = event.target;
              while (element.nodeName !== "A") {
                element = element.parentNode;
              }
              Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: "bottom-start",
              });
              document.getElementById(dropdownID).classList.toggle("hidden");
              document.getElementById(dropdownID).classList.toggle("block");
            }
            window.onclick = hideOnBlur(event);

            function hideOnBlur(e) {
                if (!event.target.matches('.dropdown')) {
                    var dropdowns = document.getElementsByClassName("dropdown-menu");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (!openDropdown.classList.contains('hidden')) {
                            openDropdown.classList.add('hidden');
                        }
                    }
                }
            }
        </script>
    </body>
</html>
