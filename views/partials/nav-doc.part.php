<!-- Navigation Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
     <div class="container">
       <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a  class="navbar-brand page-scroll" href="#page-top">
              <span>[PHOTO]</span>
            </a>
       </div>
       <div class="collapse navbar-collapse navbar-right" id="menu">
          <ul class="nav navbar-nav">
            <li class="<?=(isActiveMenu("index")? "active":"");?> lien">
                <a href="<?=(isActiveMenu("index")? "#":"/");?>">
                <i class="fa fa-home sr-icons"></i> Home</a></li>
            <li class="<?=(isActiveMenu("about")? "active":"");?> lien">
                <a href="<?=(isActiveMenu("about")? "#":"/about.php");?>">
                <i class="fa fa-bookmark sr-icons"></i> About</a></li>
            <li class="<?=(isActiveMenu("blog")? "active":"");?> lien">
                <a href="<?=(isActiveMenu("blog")? "#":"/blog.php");?>">
                <i class="fa fa-file-text sr-icons"></i> Blog</a></li>
            <li class="<?=(isActiveMenu("contact")? "active":"");?> lien">            
                <a href="<?=(isActiveMenu("contact")? "#":"/contact.php");?>">
                <i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
          </ul>
       </div>
     </div>
   </nav>
<!-- End of Navigation Bar -->
