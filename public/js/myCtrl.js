/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 appEventi.config(function ($interpolateProvider) {
 
 $interpolateProvider.startSymbol('<%');
 $interpolateProvider.endSymbol('%>');
 
 });*/

appCrypt.controller('Cryptography', function ($scope, $http, $parse) {

    /*biljeske brisanje*/
    $scope.obrisiBiljeskuPitanje = function (item) {
        // console.log('otvori info');
        // console.log(item.currentTarget);
        var url = item.currentTarget.getAttribute("data-url");
        var sakrij = item.currentTarget.getAttribute("data-hide");

        console.log(url);
        console.log(sakrij);
        $scope.nazivBiljeske = item.currentTarget.getAttribute("data-naslov");
        $scope.prikaziDaNe = 'display:block';
        $scope.deleteURL = url;
        $scope.hideNote = sakrij;
        $scope.closeForm = false;
        $scope.success = false;
        $scope.danger = false;




    }

    $scope.obrisiBiljesku = function (item) {
        var url = item.currentTarget.getAttribute("data-url");
        var sakrij = item.currentTarget.getAttribute("data-hide");
        $http.get(url)
                .then(function mySuccess(response) {

                    // $scope.prikaziDaNe = 'display:none';
                    var model = $parse(sakrij);
// Assigns a value to it
                    model.assign($scope, true);

                    console.log('uspjeh');
                    $scope.closeForm = true;
                    $scope.success = true;

                }, function myError(response) {

                    $scope.closeForm = true;
                    $scope.danger = true;
                    console.log('greška');

                });




    }





    $scope.generirajKljuceve = function (item) {
        var url = item.currentTarget.getAttribute("data-url");
        console.log(url);
        $http.get(url)
                .then(function mySuccess(response) {

                    console.log('uspjeh');
                    $scope.closeForm = true;
                    $scope.success = true;
                    console.log(response.data);
                    $scope.javni = response.data['javni'];
                    $scope.tajni = response.data['tajni'];
                    $scope.privatni = response.data['privatni'];

                }, function myError(response) {


                    console.log('greška');

                });

    }



    $scope.asinkronoKriptiranje = function (item) {
        var url = item.currentTarget.getAttribute("data-url");
        var newurl = url + "/" + $scope.plain_text;
        console.log(url);
        console.log(newurl);

        $http.get(newurl)
                .then(function mySuccess(response) {

                    console.log('uspjeh');

                    console.log(response.data);
                    $scope.DEkriptiraniText = (response.data['dekriptirani']);
                    $scope.kriptiraniText = (response.data['kriptirani']);
                }, function myError(response) {


                    console.log('greška');

                });

    }


    $scope.sinkronoKriptiranje = function (item) {
        var url = item.currentTarget.getAttribute("data-url");
        var newurl = url + "/" + $scope.plain_text;
        console.log(url);
        console.log(newurl);

        $http.get(newurl)
                .then(function mySuccess(response) {

                    console.log('uspjeh');

                    console.log(response.data);
                    $scope.DEkriptiraniText = (response.data['dekriptirani']);
                    $scope.kriptiraniText = (response.data['kriptirani']);
                }, function myError(response) {


                    console.log('greška');

                });

    }


    $scope.sinkronoDeKriptiranje = function (item) {
        var url = item.currentTarget.getAttribute("data-url");
        var newurl = url + "/" + $scope.kriptiraniText;
        console.log(url);
        console.log(newurl);

        $http.post(url, {
            Ktext: $scope.kriptiraniText,

        })
                .then(function mySuccess(response) {

                    console.log('uspjeh');

                    console.log(response.data);
//$scope.DEkriptiraniText = (response.data['dekriptirani']);
                    $scope.cistiText = (response.data['dekriptirani']);
                }, function myError(response) {


                    console.log('greška');

                });

    }


    $scope.asinkronoDeKriptiranje = function (item) {
        var url = item.currentTarget.getAttribute("data-url");
        var newurl = url + "/?Ktext=" + $scope.kriptiraniText;
        console.log(url);
        console.log(newurl);

        $http.post(url, {
            Ktext: $scope.kriptiraniText,

        })
                .then(function mySuccess(response) {

                    console.log('uspjeh');

                    console.log(response.data);
//$scope.DEkriptiraniText = (response.data['dekriptirani']);
                    $scope.cistiText = (response.data['dekriptirani']);


                }, function myError(response) {


                    console.log('greška');

                });

    }

    $scope.sazetak = function (item) {
        var url = item.currentTarget.getAttribute("data-url");
        var newurl = url + "/?Ktext=" + $scope.kriptiraniText;
        console.log(url);
        console.log(newurl);

        $http.post(url, {
            text: $scope.text_za_sazetak,

        })
                .then(function mySuccess(response) {

                    console.log('uspjeh');

                    console.log(response.data);
//$scope.DEkriptiraniText = (response.data['dekriptirani']);

                    $scope.sazetakTexta = (response.data);


                }, function myError(response) {


                    console.log('greška');

                });

    }

    $scope.potpisi = function (item) {
        var url = item.currentTarget.getAttribute("data-url");
        var newurl = url + "/?Ktext=" + $scope.kriptiraniText;
        console.log(url);
        console.log(newurl);

        $http.post(url, {
            //text: $scope.text_za_sazetak,


        })
                .then(function mySuccess(response) {

                    console.log('uspjeh');

                    console.log(response.data);
//$scope.DEkriptiraniText = (response.data['dekriptirani']);

                    $scope.digitalniPotpis = (response.data);


                }, function myError(response) {


                    console.log('greška');

                });

    }

    $scope.provjeri = function (item) {
        var url = item.currentTarget.getAttribute("data-url");

        console.log(url);


        $http.post(url, {
            dig_potpis: $scope.digitalniPotpis,
            sazetak: $scope.ulazniText,

        })
                .then(function mySuccess(response) {

                    console.log('uspjeh');

                    console.log(response.data);
//$scope.DEkriptiraniText = (response.data['dekriptirani']);

                    $scope.dekPotpis = (response.data['dencrypted']);
                    $scope.ulazniTextSazetak = (response.data['sazetak'])
                    console.log(response.data);

                    if (response.data['ispravan'] == true) {
                        alert("Digitalni potpis JE ispravan!!");


                    } else {

                        alert("Digitalni potpis NIJE ispravan!!");

                    }

                    


                }, function myError(response) {


                    console.log('greška');

                });

    }

    /*
     $http.get("./responseJSON/vrijemejson.php")
     .then(function (response) {
     
     
     // var obj = JSON.parse(response.data.records);        
     console.log("vrijeme:");
     
     console.log(response.data.records[0].Pomak);
     var pomak = Number(response.data.records[0].Pomak);
     
     $scope.pomak = pomak;
     
     $scope.clock = "loading clock..."; // initialise the time variable
     $scope.tickInterval = 1000 //ms
     
     var tick = function() {
     var d = Date.now();// + pomak;
     // console.log("vrijeme:"+d);
     
     d = d+pomak;
     // console.log("vrijeme1:"+d);
     $scope.clock = d;
     //$scope.clock = Date.now(); // get the current time
     
     // $scope.clock=$scope.clock+pomak;
     // console.log("vrijeme1:"+$scope.clock);
     
     
     $timeout(tick, $scope.tickInterval); // reset the timer
     }
     
     // Start the timer
     $timeout(tick, $scope.tickInterval);          
     
     
     
     
     
     });*/




    $scope.prikazOpisaEventa = false;
    $scope.otovoriInfoEventa = function (item) {
        // console.log('otvori info');
        // console.log(item.currentTarget);
        //console.log(item.currentTarget.getAttribute("data-url"));
        var id = item.currentTarget.getAttribute("data-id");
        $http.get(item.currentTarget.getAttribute("data-url"))
                .then(function (response) {
                    $scope.opisDogadjaja = response.data;
                    $scope.opis = 'bok';
                    //console.log(response.data);
                    $scope.prikazi = 'display:block';
                });



    }





    $scope.zatvoriInfoEventa = function () {


        $scope.prikazi = 'display:none';
    }


    /*
     * 
     * dohvaca tri diskusije prema id podrucja
     */
    /*
     $scope.otovoriModalDiskusija = function (item) {
     console.log(item.currentTarget);
     console.log(item.currentTarget.getAttribute("data-id"));
     var id = item.currentTarget.getAttribute("data-id");
     $http.get("./responseJSON/TopTriDiskusija.php?id=" + id)
     .then(function (response) {
     $scope.triDiskusije = response.data.records;
     });
     
     
     $scope.otvoriModal = !$scope.otvoriModal;
     }
     
     */


});

