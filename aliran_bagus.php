<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css" type="text/css">
    <style>
        .map {
            height: 400px;
            width: 100%;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <title>Sistem Informasi Geografis</title>
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="inner">

                <!-- Header -->
                <header id="header">
                    <div class="logo">
                        <a href="index.html">Sistem Informasi Geografis</a>
                    </div>
                </header>

                <h2>Aliran Bagus Parit Lembah Sari</h2>

                <div id="map" class="map"></div>

                <div id="popup" class="ol-popup">
                    <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                    <div id="popup-content"></div>
                </div>

                <script type="text/javascript">
                    var vectorLayer = new ol.layer.Vector({
                        source: new ol.source.Vector({
                            format: new ol.format.GeoJSON(),
                            url: 'json/parit_foto.json'
                        }),
                        style: new ol.style.Style({
                            image: new ol.style.Icon(({
                                anchor: [0.5, 46],
                                anchorXUnits: 'fraticon',
                                anchorYUnits: 'pixels',
                                src: 'icon/location-pin.png'
                            }))
                        })
                    });

                    var map = new ol.Map({
                        target: 'map',
                        layers: [
                            new ol.layer.Tile({
                                source: new ol.source.OSM()
                            }),
                            vectorLayer
                        ],
                        view: new ol.View({
                            center: ol.proj.fromLonLat([101.438309, 0.510440]),
                            zoom: 10
                        })
                    });

                    var container = document.getElementById('popup'),
                        content_element = document.getElementById('popup-content'),
                        closer = document.getElementById('popup-closer');

                    closer.onclick = function() {
                        overlay.setPosition(undefined);
                        closer.blur();
                        return false;

                    };

                    var overlay = new ol.Overlay({
                        element: container,
                        autoPan: true,
                        offset: [0, -10]
                    });

                    map.addOverlay(overlay);

                    var fullscreen = new ol.control.FullScreen();
                    map.addControl(fullscreen);


                    map.on('click', function(evt) {
                        var feature = map.forEachFeatureAtPixel(evt.pixel,
                            function(feature, layer) {
                                return feature;
                            });
                        if (feature) {
                            var geometry = feature.getGeometry();
                            var coord = geometry.getCoordinates();
                            var content = '<h3>Nama Tempat : ' + feature.get('Nama Jalan') + '</h3>';
                            content += '<img src="' + feature.get('Foto') + '" height="240"/>'

                            content_element.innerHTML = content;
                            overlay.setPosition(coord);
                            console.info(feature.getProperties());
                        }
                    });
                </script>
            </div>
        </div>
    </div>
    <center>
        <h3>Daftar Parit dengan Aliran Bagus Kecamatan Lembah Sari</h3>
        <table class="table table-bordered" style="width: 50%;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Jalan</th>
                    <th scope="col">Panjang (m/km)</th>
                    <th scope="col">Lebar (cm)</th>
                    <th scope="col">Kedalaman (cm)</th>
                    <th scope="col">Bahan </th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Arah Alir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Jl. Sembilang</td>
                    <td>40 m</td>
                    <td>147,5 cm</td>
                    <td>183 cm</td>
                    <td>Batu</td>
                    <td>Bagus</td>
                    <td>Ke Kanan</td>
                </tr>

                <tr>
                    <th scope="row">2</th>
                    <td>Jl. Sembilang</td>
                    <td>50 m</td>
                    <td>138,5 cm</td>
                    <td>163 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>Ke Kiri</td>
                </tr>

                <tr>
                    <th scope="row">3</th>
                    <td>Jl. Pramuka</td>
                    <td>110 m</td>
                    <td>62 cm</td>
                    <td>48 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">4</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>83 cm</td>
                    <td>51 cm</td>
                    <td>Batu</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">5</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>80 cm</td>
                    <td>48 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>Ke Kiri</td>
                </tr>

                <tr>
                    <th scope="row">6</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>86 cm</td>
                    <td>36 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>Ke Kiri</td>
                </tr>

                <tr>
                    <th scope="row">7</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>90 cm</td>
                    <td>65 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>Ke Kiri</td>
                </tr>

                <tr>
                    <th scope="row">8</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>80 cm</td>
                    <td>60 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>Ke Kiri</td>
                </tr>

                <tr>
                    <th scope="row">9</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>65 cm</td>
                    <td>109 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">10</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>79 cm</td>
                    <td>118 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">11</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>80 cm</td>
                    <td>96 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">12</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>30 cm</td>
                    <td>40 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">13</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>48 cm</td>
                    <td>33 cm</td>
                    <td>Batu</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">14</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>30 cm</td>
                    <td>30 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>Ke Kanan</td>
                </tr>

                <tr>
                    <th scope="row">15</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>41 cm</td>
                    <td>50 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>Ke Kanan</td>
                </tr>

                <tr>
                    <th scope="row">16</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>36 cm</td>
                    <td>26 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">17</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>39 cm</td>
                    <td>28 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">18</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>88 cm</td>
                    <td>97 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">19</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>140 cm</td>
                    <td>116 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">21</th>
                    <td>Jl. Pramuka</td>
                    <td>100 m</td>
                    <td>98 cm</td>
                    <td>84 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">20</th>
                    <td>Jl. Perkasa</td>
                    <td>100 m</td>
                    <td>83 cm</td>
                    <td>52 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>Ke Kiri</td>
                </tr>

                <tr>
                    <th scope="row">21</th>
                    <td>Jl. Perkasa</td>
                    <td>100 m</td>
                    <td>28 cm</td>
                    <td>20 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>Ke Kiri</td>
                </tr>

                <tr>
                    <th scope="row">22</th>
                    <td>Jl. Pramuka Ujung</td>
                    <td>100 m</td>
                    <td>119 cm</td>
                    <td>48 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">23</th>
                    <td>Jl. Pramuka Ujung</td>
                    <td>100 m</td>
                    <td>71 cm</td>
                    <td>81 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">24</th>
                    <td>Jl. Pramuka Ujung</td>
                    <td>200 m</td>
                    <td>71 cm</td>
                    <td>80 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">25</th>
                    <td>Jl. Pramuka Ujung</td>
                    <td>200 m</td>
                    <td>60 cm</td>
                    <td>61 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">26</th>
                    <td>Jl. Pramuka Ujung</td>
                    <td>200 m</td>
                    <td>69 cm</td>
                    <td>73 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>-</td>
                </tr>

                <tr>
                    <th scope="row">27</th>
                    <td>Jl. Lingkar Danau Buatan</td>
                    <td>200 m</td>
                    <td>71 cm</td>
                    <td>60 cm</td>
                    <td>Beton</td>
                    <td>Bagus</td>
                    <td>Ke Kanan</td>
                </tr>

                
            </tbody>
        </table>
    </center>
</body>

</html>