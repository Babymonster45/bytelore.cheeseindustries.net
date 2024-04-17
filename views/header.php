<!--====== NAVBAR ONE PART START ======-->
<section class="navbar-area navbar-one">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg" style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
               <a class="navbar-brand Headerlogo" href="./">
               <img style= "max-width:60%;" src="./web/img/logo-2.png" alt="Logo"/>
               </a>
               <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne" style="justify-self: center;">
                  <ul class="navbar-nav m-auto">
                     <li class="nav-item">
                        <a
                           class="page-scroll active"
                           href="./"
                           data-bs-toggle="collapse"
                           data-bs-target="#sub-nav1"
                           aria-controls="sub-nav1"
                           aria-expanded="false"
                           aria-label="Toggle navigation"
                           >
                           Home
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="/games_list.php">Game List</a>
                     </li>
                  </ul>
               </div>
               <div class="navbar-btn d-none d-sm-inline-block" style="width: 200px; justify-self: end;">
                  <ul>
                     <?php
                     // Check if the user is logged in and display appropriate buttons
                     if (isset($_SESSION["user_id"])) {
                         echo '<li><a class="btn primary-btn-outline" href="logout.php">Logout</a></li>';
                     } else {
                         echo '<li><a class="btn primary-btn-outline" href="login.php">Sign In</a></li>';
                         echo '<li><a class="btn primary-btn" href="signup.php">Sign Up</a></li>';
                     }
                     ?>
                  </ul>
               </div>
            </nav>
            <!-- navbar -->
         </div>
      </div>
      <!-- row -->
   </div>
   <!-- container -->
</section>
<!--====== NAVBAR ONE PART ENDS ======-->
