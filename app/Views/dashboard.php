<?php include 'header.php';?>
    <div class="content content-fixed bd-b">
        <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
            <img src="<?php echo base_url(); ?>/assets/img/plx.svg">
            </div>
        </div>
        </div><!-- container -->
    </div><!-- content -->

    <section id="chart" class="dtr-section dtr-py-90 bg-grey">
        <div class="container"> 
            <div class="dtr-rounded-corner-xl dtr-shadow bg-white">
                <div class="row text-center"> 
                        <div class="col-12 col-md-6 dtr-my-20">
                            <div class="card border-0 dtr-px-80">
                                <div class="card-header ht-100 d-flex align-items-center justify-content-between">
                                    <h4 class="mg-b-10">Presentase Matang Janjang Panen</h4>
                                    <div class="d-flex tx-18">
                                    <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                                    <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                                    </div>
                                </div>
                                    <div class="ht-350 ht-lg-400 dtr-my-20"><canvas id="chartPie"></canvas></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 dtr-my-20">
                            <div class="card border-0 dtr-px-80">
                                <div class="card-header ht-100 d-flex align-items-center justify-content-between">
                                    <h4 class="mg-b-10 mg-l-50">Harvesting Ripeness</h4>
                                    <div class="d-flex tx-18">
                                    <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                                    <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                                    </div>
                                </div>
                                <div class="ht-350 ht-lg-400 dtr-my-20"><canvas id="chartBar3"></canvas></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="maps" class="dtr-section dtr-py-90 bg-grey">
        <div class="container"> 
            <div class="dtr-rounded-corner-xl dtr-shadow bg-white">
                <div class="mapbox" style="overflow: auto;">
                    <div id="mapid" style="width:70%;float:left;"></div>
                    <div style="width:30%; height:100%;overflow: auto;">
                        <h4 class="mg-20 text-center">Data Panen</h4>
                        <?php
                            for ($i = 0; $i < count($harv); $i++) {
                                echo "<div class='mg-20'>";
                                echo "<b>".$harv[$i]->afdName.">>".$harv[$i]->pyName.">>".$harv[$i]->blockName."</b></br>";
                                echo "<b>Ancak/TPH : ".$harv[$i]->tphName."</b></br>";
                                echo "Kemandoran : ".$harv[$i]->groupName."</br>";
                                echo "Mandoran : ".$harv[$i]->workerName."</br>";
                                echo "TBS Dipanen : ".$harv[$i]->tbs_dipanen."</br>";
                                echo "Mentah : ".$harv[$i]->mentah."</br>";
                                echo "Kurang Matang : ".$harv[$i]->kurang_matang."</br>";
                                echo "Lewat Matang : ".$harv[$i]->terlalu_matang."</br>";
                                echo "Kosong : ".$harv[$i]->kosong."</br>";
                                echo "Busuk : ".$harv[$i]->busuk."</br>";
                                echo "Brondolan : ".$harv[$i]->brondolan."</br>";
                                echo "</div>";
                                echo "<hr>";
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

        
  </body>
  <?php include 'footer.php';?>
  <script src="<?php echo base_url(); ?>/assets/js/chart.chartjs.js"></script>
    <script>
        var mymap = L.map('mapid').setView([-2.985746, 104.446762], 13);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/satellite-v9',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoicGFuamlycCIsImEiOiJja2tpZnpyZHQwOXkxMm5tcWhkZHJkeGtlIn0.ZhSJzOHRIpvy1sfB92opwQ'
        }).addTo(mymap);

        var dummyDesc = "<b>Tanggal :</b> 10 Feb 2021<br><b>Inspektur:</b> John B<br>";
        dummyDesc += "<b>Inspection Target :</b> 200<br><b>Inspection Doing:</b> 160<br>";

        //line between markers
        var latlngs = Array();
        var marker1 = L.marker([-2.985746, 104.446762]).addTo(mymap).bindPopup(dummyDesc);
        var marker2 = L.marker([-2.984849, 104.448566]).addTo(mymap).bindPopup(dummyDesc);
        var marker3 = L.marker([-2.97872, 104.446743]).addTo(mymap).bindPopup(dummyDesc);
        var marker4 = L.marker([-2.973213, 104.447708]).addTo(mymap).bindPopup(dummyDesc);
        var marker5 = L.marker([-2.967642, 104.44582]).addTo(mymap).bindPopup(dummyDesc);

        //Get latlng from marker
        latlngs.push(marker1.getLatLng());
        latlngs.push(marker2.getLatLng());
        latlngs.push(marker3.getLatLng());
        latlngs.push(marker4.getLatLng());
        latlngs.push(marker5.getLatLng());

        //You can just keep adding markers

        //From documentation http://leafletjs.com/reference.html#polyline
        // create a yellow polyline from an arrays of LatLng points
        var polyline = L.polyline(latlngs, {color: 'yellow'}).addTo(mymap);

        // zoom the map to the polyline
        mymap.fitBounds(polyline.getBounds());
    </script>