<?php
require 'functions.php';

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap Demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md bg-primary navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">Gori</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Biodata</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="gallery.html">Gallery</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  >My Blog</a
                >
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a href="./article/index.html" class="dropdown-item">Daftar Artikel</a></li>
                  <li><a href="./article/form.html" class="dropdown-item">Buat Artikel</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
        
        
    </main>

    <footer class="my-footer">
      <marquee behavior="scroll" direction="left">
        made by &copy; jokerredsoil
      </marquee>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
