<?php


include("seo.php");

$seo = new SEO(array(
    "title" => "G. B. Pant Engineering College",
    "keywords" => "Delhi, Government, Engineering, Govind, Ballabh, Govind Ballabh Pant,  Delhi, College, GGSIPU affiliated, NCT, Electronics, Mechanical Automation, Computer Science, Graduation, Govindpuri, Okhla phase -3, G.B. Pant, GBPEC, Humanities, " ,
    "description" => "G. B. Pant Engineering College is  Engineering College under Goverment of Delhi NCT, affiliated by Guru Govind Singh Indraprastha University Located in Govind Puri, Okhla Phase-3, New Delhi PIN Code 110020. It was Founded in 2007 in G. B. Pant Polytechnique. Electronics and Communicatio, Mechanical Automation and Computer Science are the courses offered here.",
    "author" => "https://plus.google.com/107837531266258418226",
    "robots" => "INDEX,FOLLOW",
    "photo" => CDN . "images/logo.png"
));

framework\Registry::set("seo", $seo);