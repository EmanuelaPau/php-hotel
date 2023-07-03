<!-- 
Stampare tutti i nostri hotel con tutti i dati disponibili, iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. -->

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1 class="text-center mb-3">Hotels</h1>

    <form class="mb-5" action="" method="GET">
    <div class="form-row">
        <div class="col mb-3">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" name="hasParking">
                <label class="custom-control-label" for="customCheck1">Has parking</label>
            </div>
        </div>

        <div class="col">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
            <select class="custom-select my-1 mr-sm-2 mb-3" id="inlineFormCustomSelectPref">
                <option selected>Number of stars  </option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        
        <div class="col-auto my-1">
             <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <?php 
                    foreach ($hotels as $key => $hotel) { ?>
                        <th>
                            <?php echo $key ?>
                        </th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($hotels as $hotel ) { ?>
               <?php if (isset($_GET['hasParking'])) { 
                    if ($hotel['parking'] == true) {?>
                            <tr>
                                <td><?php echo $hotel['name']; ?></td>
                                <td><?php echo $hotel['description']; ?></td>
                                <td><?php echo $hotel['parking']; ?></td>
                                <td><?php echo $hotel['vote']; ?></td>
                                <td><?php echo $hotel['distance_to_center']; ?></td>
                            </tr>
                    <?php } ?> 
               <?php } ?>
               
               <?php else { ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking']; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php } ?>
               
            <?php } ?>

            
        </tbody>
    </table>
</body>
</html>


