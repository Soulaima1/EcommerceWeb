<?php 
session_start();
session_unset();//bech nfasa5 les variables m session
session_destroy();//bech nfasa5 l session

header('location:index.php');// bech ki nenzel ala deconnexion mato5rojlich page bidha w iraja3ni lel index
?> 