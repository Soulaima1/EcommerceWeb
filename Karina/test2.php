<!DOCTYPE html>
<html>
<head>
  <title>Liste déroulante</title>
  <script>
    function afficherValeur() {
      var select = document.getElementById("variables");
      var valeurSelectionnee = select.value;
      
      var resultat = document.getElementById("resultat");
      resultat.textContent = "Vous avez sélectionné : " + valeurSelectionnee;
    }
  </script>
</head>
<body>
  <label>Choisissez une variable :</label>
  <select id="variables" onchange="afficherValeur()">
    <option value="1">Variable 1</option>
    <option value="2">Variable 2</option>
  </select>

  <div id="resultat"></div>
</body>
</html>
