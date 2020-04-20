<?php 
$header = "
<head>
<h1 class='pt-4 bg-dark text-light text-center mb-0'>Rona Insurance</h1>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>RonaInsurance</title>
    
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
      <a class='navbar-brand' href='#'>Navbar</a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNavDropdown'>
        <ul class='navbar-nav'>
          <li class='nav-item active'>
            <a class='nav-link' href='index.php'>Home <span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='clients.php'>Clients</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='claims.php'>Claims</a>
          </li>
          <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              More Options
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
              <a class='dropdown-item' href='#'>About</a>
              <a class='dropdown-item' href='#'>Another action</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

     <!-- Custom Style Sheet --> 
     <link rel='stylesheet' href='styles.css'>
    <!-- Link to load Bootstrap -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
    </head>
";
echo $header;
?>