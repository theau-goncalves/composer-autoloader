<?php
require 'vendor/autoload.php';

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

$client = (new HttpClient())->create();

$client = HttpClient::create();

try {
    $response = $client->request(
        'GET',
        'https://api.spacexdata.com/v4/crew/5fe3bc3db3467846b324218b'
    );

    $astro = $response->toArray();

    if(count($astro['launches']) > 0) {
        $launchId = $astro['launches'][0];
    }

    if(!empty($launchId)) {
        try {
            $response = $client->request(
                'GET',
                'https://api.spacexdata.com/v4/launches/' . $launchId
        );

            $launchData = $response->toArray();

//            dump($launchData);
        } catch (TransportExceptionInterface $e) {
            dump($e);
        }
    }



} catch (TransportExceptionInterface $e) {
    dump($e);
}


?>

<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>

    <style>
        img {
            max-width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 text-center">
            <img style="max-width: 400px;" src="<?php echo $astro['image'];?>" alt="<?php echo $astro['name'];?>">
            <h1>
                <?php echo $astro['name'];?>
            </h1>
            <div>
                Agence : <?php echo $astro['agency'];?>
            </div>
            <div>
                <a href="<?php echo $astro['wikipedia'];?>" target="_blank">
                    Wikipedia
                </a>
            </div>

            <div class="mt-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Mission
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <?php echo $launchData['name'];?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                    $launchDate = new \DateTime($launchData['static_fire_date_utc']);
                ?>
                Date : <?php echo $launchDate->format('Y-m-d H:i')?>$
                <div class="mt-3">
                    <?php echo $launchData['details'];?>
                </div>


                <?php if (count($launchData['links']['flickr']['original']) > 0):?>
                    <div class="row">
                        <?php foreach ($launchData['links']['flickr']['original'] as $img):?>
                            <div class="col-md-6 col-lg-3 mt-2">
                                <img src="<?php echo $img; ?>" style="width: 100%; height: 200px; object-fit: cover">
                            </div>
                        <?php endforeach;?>
                    </div>
                <?php endif;?>
                
            </div>
           
        </div>
    </div>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
