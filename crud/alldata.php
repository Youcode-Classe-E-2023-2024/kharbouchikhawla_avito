<?php
require_once("config.php");
$data = new Config();
$all = $data->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <title>Tableau</title>
  <style>
    body {
      padding: 20px;
    }

    h2 {
      text-align: center;
    }

    .centre btn-success {
      text-align: center;

    }

    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }

    td button {
      margin: 2px;
    }
  </style>
</head>

<body>
  <h2>tableau des annonces</h2>
  <div class="d-flex justify-content-center">
    <a class="btn btn-success" href="index.php">ajouter annonce</a>
  </div>
  <br>
  <table>
    <tr>
      <th>id</th>
      <th>titre</th>
      <th>prix</th>
      <th>description</th>
      <th>action</th>
    </tr>
    <?php
    foreach ($all as $key => $val) {
      ?>

      <tr>
        <th scope="row">
          <?= $val['id'] ?>
        </th>
        <td>
          <?= $val['titre'] ?>
        </td>
        <td>
          <?= $val['prix'] ?>
        </td>
        <td>
          <?= $val['description'] ?>
        </td>
        <td><a class="btn btn-danger" href="delete.php?id=<?$val['id']?>&req=delete">DELETE</a> 
        <a class="btn btn-warning" href="edit.php?id=<?$val['id']?>">EDIT</a>
      </td>
      </tr>
      </tr>
    <?php

    }
    ?>

  </table>
</body>

</html>