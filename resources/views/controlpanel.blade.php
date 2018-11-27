@extends('layouts.layout')

@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ url('../css/controlpanel.css') }}" />
@endsection

@section('content')
<div class="tab">
            @if ('{{ Auth::user()->Rechten }}' == 'Admin')
                <button class="tablinks" onclick="openCity(event, 'Accountbeheer')" id="defaultOpen">Accountbeheer</button>
                <button class="tablinks" onclick="openCity(event, 'Productbeheer')">Productbeheer</button>
            @else
                    <button class="tablinks" onclick="openCity(event, 'Productbeheer')" id="defaultOpen">Productbeheer</button>      
            @endif
</div>
    <div class="tabcontent" id="Accountbeheer">
        <div class="container users-main " >
            <div class="row users-top">
                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <form action="Search.php" mathod="post">
                                <input type="search" class="form-control" placeholder="Gebruikersnaam" aria-label="Search">
                            </form>
                            <button class="btn btn-outline-secondary" class="form-control" type="submit" onclick="window.location.href = 'NewUser.php';">Add user</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row users" id="infobar">
                <div class="col"></div>
                <div class="col"><p class="nummer"> User ID: </p></div>
                <div class="col"><p class="naam"> Username: </p></div>
                <div class="col last-col">Rechten</div>
                <div class="col last-col">Vestiging</div>
                <div class="col last-col"><img src="img/setting2.png" height="30" width="30"></div>
            </div>
            <?php 
                $sqlusers = "SELECT UserID, UserName, UserRechten, Vestiging FROM gebruikers";
                $result = $conn->query($sqlusers);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="row users">
                        <div class="col img-col"><img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-small"></div>
                        <div class="col"><?php echo $row["UserID"] ?></div>
                        <div class="col"><?php echo $row["UserName"] ?></div>
                        <div class="col"><?php echo $row["UserRechten"] ?></div>
                        <div class="col last-col"><?php echo $row["Vestiging"] ?></div>
                        <div class="col">Col</div>
                        </div>
                        <?php
                    }
                } else {
                    echo "0 results";
                } 
            ?>  
        </div>
    </div>
    <div class="tabcontent" id="Productbeheer">
        <div class="container-fluid users-main">
            <div class="row info" id="infobarproductbeheer">
                <div class="img-col colpadding"><img src="img/aanvraagicon.png" class="profile-img-small imginfobar"></div>
                <div class="col colpadding"><p class="nummer"> Aanvraag ID: </p></div>
                <div class="col colpadding"><p class="naam"> Gebruikers: </p></div>
                <div class="col colpadding">Product:</div>
                <div class="col colpadding">Product aantal:</div>
                <div class="col colpadding">Product locatie:</div>
                <div class="col colpadding"><img src="img/setting2.png" height="30" width="30"></div>
            </div>
            <?php 
                $sqlusers = "SELECT * FROM aanvragen";
                $result = $conn->query($sqlusers);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="row users">
                            <div class="img-col"><img src="img/productaanvraagicon.svg" class="profile-img-small"></div>
                            <div class="col"><?php echo $row["AanvraagID"] ?></div>
                            <div class="col"><?php echo $row["UserName"] ?></div>
                            <div class="col"><?php echo $row["pNaam"] ?></div>
                            <div class="col"><?php echo $row["ProductAantal"] ?></div>
                            <div class="col last-col"><?php echo $row["pAfkomst"] ?></div>
                            <div class="col fromscol">
                                <div class="form1">
                                    <form action="aanvraag/WeigerAanvraag.php" method="post" >
                                        <input type="hidden" name="aanvraagid" value="<?php echo $row["AanvraagID"] ?>" />
                                        <input type="submit" class="WeigAccbtn"  value="&#xf057;"  name="AfwijsBTN"/>
                                    </form>
                                </div>
                                <div class="form2">
                                    <form action="aanvraag/AccAanvraag.php" method="post" >
                                        <input type="hidden" name="aanvraagid" value="<?php echo $row["AanvraagID"] ?>" />
                                        <input type="submit" class="WeigAccbtn"  value="&#xf058;"  name="AccBTN"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php 
                    }
                } else {
                    echo "0 results";
                } 
            ?>  
        </div>
    </div>
@endsection