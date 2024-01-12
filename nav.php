 <header class="header_section">
     <div class="container-fluid">
         <nav class="navbar navbar-expand-lg custom_nav-container ">
             <a class="navbar-brand" href="index.php">
                 <span>
                     SimsaiFah
                 </span>
             </a>

             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class=""> </span>
             </button>

             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav  ml-auto">
                     <li class="nav-item active">
                         <a class="nav-link" href="index.php">หน้าหลัก</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="searchNumber.php">รายการเบอร์มงคล</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="article.php">บทความ</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="about.php"> เกี่ยวกับเรา</a>
                     </li>




                     <?php
                     if (isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])) {
                         ?>
                     <li class="nav-item">
                         <a class="nav-link" href="user.php">
                             <i class="fa fa-user" aria-hidden="true"></i>
                             <span>
                                 บัญชีของฉัน
                             </span>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="logout.php">

                             <span>
                                 log out
                             </span>
                         </a>
                     </li>
                     <?php } else { ?>
                     <li class="nav-item">
                         <a class="nav-link" href="signin.php">

                             <span>
                                 เข้าสู่ระบบ
                             </span>
                         </a>
                     </li>
                     <?php } ?>


                     <form class="form-inline">
                         <button class="btn   nav_search-btn" type="submit">
                             <i class="fa fa-search" aria-hidden="true"></i>
                         </button>
                     </form>
                 </ul>
             </div>
         </nav>
     </div>
 </header>