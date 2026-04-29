<?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];

    $only_parking = isset($_GET['only_parking']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>

    <!-- BOOTSTRAP ICONS  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- BOOTSTRAP SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous" defer></script>

</head>
<body class="container w-50">
    <h1 class="text-center my-4">Hotels</h1>    
    <div class="card my-4">
        <div class="card-body">
            <form class="mb-0" method="GET">
                <div class="mb-3">
                  <label for="voteFilter" class="form-label">Fitra per Voto</label>
                  <input type="number" class="form-control" id="voteFilter" placeholder="Inserire un numero" name="number_vote">
                </div>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="checkbox" id="parkingFilter" name="only_parking">
                    <label class="form-check-label" for="parkingFilter">
                      Solo Hotel Provvisti di Parcheggio
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Applica Filtri</button>
            </form>
        </div>
    </div>  
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th class="text-center" scope="col">Descrizione</th>
          <th class="text-center" scope="col">Parcheggio</th>
          <th class="text-center" scope="col">Voto</th>
          <th class="text-center" scope="col">Distanza da centro</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            foreach ($hotels as $hotel) {
                echo "<tr>";
                if ($only_parking && $hotel["parking"]) {
                    foreach ($hotel as $key => $value) {
                        if ($key == "name") {
                        echo '<th scope="row">'. $value .'</th>';
                        } else if ($key == "parking") {
                        echo $value ? '<td class="text-center"><i class="bi bi-check-circle"></i></td>' : '<td class="text-center"><i class="bi bi-x-circle"></i></td>';
                        } else {
                        echo '<td class="text-center">' . $value . '</td>';    
                        }
                    } 
                };
                if (!$only_parking) {
                    foreach ($hotel as $key => $value) {
                        if ($key == "name") {
                        echo '<th scope="row">'. $value .'</th>';
                        } else if ($key == "parking") {
                        echo $value ? '<td class="text-center"><i class="bi bi-check-circle"></i></td>' : '<td class="text-center"><i class="bi bi-x-circle"></i></td>';
                        } else {
                        echo '<td class="text-center">' . $value . '</td>';    
                        }
                    } 
                }


                echo "</tr>";
            }
        ?>
      </tbody>
    </table>
</body>
</html>