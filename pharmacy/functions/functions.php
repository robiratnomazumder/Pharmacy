<?php

/* For Content */

class Parts
{

    public function addHeader()
    {
        
        require_once "includes/header.php";
    }

    public function addSidebar()
    {
        require_once "includes/sidebar.php";
    }

    public function addPage($pageName)
    {
        require_once "includes/" . $pageName;
    }

     public function addSlid(){
        require_once "includes/slid.php";
    }
     public function addBanner(){
        require_once "includes/banner.php";
    }


    public function addServices(){
        require_once "includes/services.php";
    }
    public function addAbout(){
        require_once "includes/about.php";
    }
    public function addGallery(){
        require_once "includes/gallery.php";
    }
    public function addIcons(){
        require_once "includes/icons.php";
    }
    public function addCodes(){
        require_once "includes/codes.php";
    }
     public function addContact(){
        require_once "includes/contact.php";
    }
    
    public function addRegister(){
       require_once "includes/register.php";
    }

    public function addFooter()
    {
        require_once "includes/footer.php";
    }
    public function addFooter2()
    {
        require_once "includes/footer2.php";
    }
}