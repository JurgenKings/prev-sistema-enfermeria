<!DOCTYPE html>
<html lang="es" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/custom-properties.css">
    <link rel="stylesheet" href="css/cabecera-menu.css" />
    <link rel="stylesheet" href="css/jorge-frameworks.css" />
    <link rel="icon" href="img/favicon.png" />
    <link rel="apple-touch-icon" href="img/favicon.png" />
    <script defer type="text/javascript" src="js/sweetalert2.js"></script>

    <script>
      (function (){
        const temaUsuario = localStorage.getItem("theme");
        const darkQuery = window.matchMedia("(prefers-color-scheme: dark)");
  
        if(temaUsuario === "dark" || (!temaUsuario && darkQuery.matches)){
          alternarModo("dark");
        }
        darkQuery.addEventListener("change", function (e){
          if(!localStorage.getItem("theme")) alternarModo(e.matches ? "dark" : "light");
        });
        function alternarModo(nuevoModo){
          document.documentElement.setAttribute("data-theme", nuevoModo);
        }
        window.__cambiarModos = function (nuevoModo){
          document.documentElement.setAttribute("data-theme", nuevoModo);
          localStorage.setItem("theme", nuevoModo)
        }
      })();
    </script>
