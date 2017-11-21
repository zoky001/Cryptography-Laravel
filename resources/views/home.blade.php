@extends('layouts.app')

@section('content')

<!-- Page content -->
<div   ng-app="Crypt" ng-controller="Cryptography" class="w3-content " style="max-width:1532px;" >




    <!-- Page Container -->


    <div class="container"> 

        <div class="w3-panel w3-round-xlarge w3-light-grey">
            <h1>Generiranje ključeva</h1>
        </div>
        <div class="row">
            <!-- The Grid -->
            <div class="col-lg-4">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Tajni ključ</h3>
                    <div class="w3-container"> 
                        <textarea   class="form-control" id="exampleTextarea" rows="10" >  @{{ tajni }}</textarea>
                    </div>
                    <br>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Javni ključ </h3>
                    <div class="w3-container"> 
                        <textarea   class="form-control" id="exampleTextarea" rows="10" > @{{ javni}}</textarea>
                    </div>
                    <br>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Privatni ključ</h3>
                    <div class="w3-container"> 
                        <textarea   class="form-control" id="exampleTextarea" rows="10" >@{{ privatni }}</textarea>
                    </div>
                    <br>
                </div>
            </div>
            <br>
            <p ng-click="generirajKljuceve($event)"  data-url="{{ Route("generateKeys") }}" class="btn btn-primary btn-lg centered" style="width: 50%;margin-left: 25%">
                Generiraj ključeve
            </p>


        </div>

        <!-- End Page Container -->
    </div>
      <hr>
    <div class="container"> 

        <div class="w3-panel w3-round-xlarge w3-light-grey">
            <h1>Kriptiranje teksta</h1>
        </div>
        <div class="row">
            <!-- The Grid -->
            <div class="col-lg-4">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Čisti tekst</h3>
                    <div class="w3-container"> 
                        <textarea  ng-model="plain_text" class="form-control" id="exampleTextarea" rows="3" > </textarea>
                    </div>
                    <br>
                 
                      
                            <p ng-click="sinkronoKriptiranje($event)" data-url="{{ Route('sinkronoKriptiranje') }}" class="btn btn-primary btn-me centered" style="width: 50%;margin-left: 25%" >
                                Kriptiraj simetrično
                            </p>  
                            <br>
                            <br>
                            <p ng-click="asinkronoKriptiranje($event)" data-url="{{ Route('asinkronoKriptiranje') }}"    class="btn btn-primary btn-me centered" style="width: 50%;margin-left: 25%" >
                                Kriptiraj asimetrično
                            </p>  
                      


                   
                </div>



            </div>
            <div class="col-lg-4">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Kriptirani tekst </h3>
                    <div class="w3-container"> 
                        <textarea   class="form-control" id="exampleTextarea" rows="3" >@{{ kriptiraniText }}</textarea>
                    </div>
                    <br>
               
                </div>
            </div>
            <div class="col-lg-4">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Dekriptirani tekst </h3>
                    <div class="w3-container"> 
                        <textarea   class="form-control" id="exampleTextarea" rows="3" >@{{ DEkriptiraniText }} </textarea>
                    </div>
                    <br>
                </div>
            </div>
            <br>



        </div>

        <!-- End Page Container -->
    </div>
    <hr>
    <div class="container"> 

        <div class="w3-panel w3-round-xlarge w3-light-grey">
            <h1>Dekriptiranje teksta</h1>
        </div>
        <div class="row">
            <!-- The Grid -->
            <div class="col-lg-6">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Kriptirani sadržaj </h3>
                    <div class="w3-container"> 
                        <textarea   ng-model="kriptiraniText" class="form-control" id="exampleTextarea" rows="3" >  dsf</textarea>
                    </div>
                         <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <p ng-click="asinkronoDeKriptiranje($event)" data-url="{{ Route('asinkronoDeKriptiranje') }}" class="btn btn-primary btn-sm centered" >
                                Dekriptiraj asimetrično
                            </p>  
                        </div>
                          <div class="col-lg-6">
                              <p ng-click="sinkronoDeKriptiranje($event)" data-url="{{ Route('sinkronoDeKriptiranje') }}" class="btn btn-primary btn-sm centered" >
                                Dekriptiraj simetrično
                            </p>  
                        </div>


                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Čisti tekst </h3>
                    <div class="w3-container"> 
                        <textarea   class="form-control" id="exampleTextarea" rows="3" > @{{ cistiText }}</textarea>
                    </div>
                    <br>
                </div>
            </div>
    
        </div>

        <!-- End Page Container -->
    </div>
  
    <hr>
    <div class="container"> 

        <div class="w3-panel w3-round-xlarge w3-light-grey">
            <h1>Sažetak</h1>
        </div>
        <div class="row">
            <!-- The Grid -->
            <div class="col-lg-4">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Ulazni tekst </h3>
                    <div class="w3-container"> 
                        <textarea ng-model="text_za_sazetak"  class="form-control" id="exampleTextarea" rows="3" ></textarea>
                    </div>
                         <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <p ng-click="sazetak($event)" data-url="{{ Route('sazetak')}}" class="btn btn-primary btn-sm centered" >
                               Napravi sažetak
                            </p>  
                        </div>
                         


                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Sažetak </h3>
                    <div class="w3-container"> 
                        <textarea   class="form-control" id="exampleTextarea" rows="3" > @{{ sazetakTexta }}</textarea>
                    </div>
                         <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <p ng-click="potpisi($event)"  data-url="{{Route('potpisi')}}" class="btn btn-primary btn-sm centered" >
                              Digitalno potpiši
                            </p>  
                        </div>
                         


                    </div>
                </div>
            </div>
              <div class="col-lg-4">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Digitalni potpis </h3>
                    <div class="w3-container"> 
                        <textarea   class="form-control" id="exampleTextarea" rows="3" >@{{digitalniPotpis}}</textarea>
                    </div>
                         <br>
                    
                </div>
            </div>
    
        </div>

        <!-- End Page Container -->
    </div>
      <hr>
    <div class="container"> 

        <div class="w3-panel w3-round-xlarge w3-light-grey">
            <h1>Digitalni potpis</h1>
        </div>
         <p ng-click="provjeri($event)"  data-url="{{Route('provjeri')}}" class="btn btn-primary btn-lg centered" style="width: 50%;margin-left: 25%" >
                                Provjeri
                            </p>  
        <div class="row">
            <!-- The Grid -->
            <div class="col-lg-4">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Digitalni potpis </h3>
                    <div class="w3-container"> 
                        <textarea  ng-model="digitalniPotpis" class="form-control" id="exampleTextarea" rows="3" ></textarea>
                    </div>
                         <br>
                
                </div>

            </div>
            <div class="col-lg-4">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Ulazni sadržaj </h3>
                    <div class="w3-container"> 
                        <textarea  ng-model="ulazniText" class="form-control" id="exampleTextarea" rows="3" ></textarea>
                    </div>
                    <br>
                    
                    <div class="row">
                        <div class="col-lg-12">
                           
                        </div>
                         


                    </div>
                    <h3> Ulazni sadržaj sažetak </h3>
                    <div class="w3-container"> 
                        <textarea  ng-model="ulazniTextSazetak" class="form-control" id="exampleTextarea" rows="3" ></textarea>
                    </div>
                    <br>
                </div>
            </div>
            
             <div class="col-lg-4">
                <div class="w3-panel w3-round-xlarge w3-light-grey">
                    <h3> Dekriptirani digitalni potpis</h3>
                    <div class="w3-container"> 
                        <textarea   class="form-control" id="exampleTextarea" rows="3" >@{{ dekPotpis }}</textarea>
                    </div>
                    <br>
                </div>
            </div>
    
        </div>

        <!-- End Page Container -->
    </div>
  


</div>


@endsection
