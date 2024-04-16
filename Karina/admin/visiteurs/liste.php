<?php  //php start

            session_start();
            include "../../inc/functions.php";
            $visiteurs=getAllUsers();




            //php end?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Admin : Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../deconnexion.php">Deconnexiont</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <?php  //navigation
    include "../template/navigation.php";
      ?> 
       

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des visteurs</h1>
           
            <div>


           
          </div>
          </div>


          <!-- Liste start-->


          <div>
                      <!--bech l messag Categorie Ajoutee Avec Succees mayodhhor ken ki yabda fel url fama ajout w m3aha ok
 -->

          <?php if (isset($_GET['valider']) && $_GET['valider']=="ok"){
            print'
            <div class="alert alert-success">
               Visiteur validé avec succée

            </div>';
          }
            ?> 




<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Nom et prenom</th>
<th scope="col">Email</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>

<?php  //php pour afficher les visiteurs
        $i=0;
        foreach($visiteurs as $i => $visiteur){
            $i++;
            print '<tr>
            <th scope="row">'.$i.'</th>
            <td>'.$visiteur['nom'].' '. $visiteur['prenom'].'</td>
            <td>'.$visiteur['email'].'</td>
            <td>
            <a href="valider.php?id='.$visiteur['id'].'"class="btn btn-success">Valider</a>
            
            
            
            </td>
            </tr>';
        }


            //php end?> 


           


</tbody>
</table>
  



</div>


          
        </main>
      </div>
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
  $('#addform').submit(function(){
    if($('#nom').val()==""){
      $('#blocknom1').append('<p class="text-danger"> il faut remplir le champ nom!</p>');
      return false;
    }
    else if($('#description').val()==""){
      $('#blocknom2').append('<p class="text-danger"> il faut remplir le champ description!</p>');
      return false;
    

    }
  })

  function popUpDeleteCategorie(){

    return confirm("Voulez-vous vraiment supprimer la categorie?");
  }


</script>
  </body>
</html>
