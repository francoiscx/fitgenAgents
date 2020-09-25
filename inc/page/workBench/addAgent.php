<?php if(isset($_SESSION['newAgentEntery'])) {
    
    unset($_SESSION['country']);
    unset($_SESSION['province']);
    unset($_SESSION['town']);
    unset($_SESSION['area']);
    unset($_SESSION['lat']);
    unset($_SESSION['lng']);
    unset($_SESSION['agent']);
    unset($_SESSION['cell']);
    unset($_SESSION['aemail']);
    unset($_SESSION['newAgentEntery']);
    
    unset($_POST['newAgentCountry']);
    unset($_POST['newAgentProvince']);
    unset($_POST['newAgentTown']);
    unset($_POST['newAgentArea']);
    unset($_POST['newAgentlat']);
    unset($_POST['newAgentlng']);
    unset($_POST['newAgentName']);
    unset($_POST['newAgentCell']);
    unset($_POST['newAgentEmail']);
    unset($_POST['clearFormBtn']);

}

?>


<style>
    input#clearFormBtn {
    background: gold;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}

input#addAgentBtn {
    background: #83B63E;
    width: 200px;
    padding: 10px;
    border-radius: 6px;
    color: #fff;
}
</style>

          <!-- TO DO List -->
          <div class="box" style="height:900px; box-primary">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->


<h3 class="box-title">Provide all details to add a new agent</h3>
<br><br>





            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->



<?php



if(isset($_POST['clearFormBtn'])){
    unset($_SESSION['country']);
    unset($_SESSION['province']);
    unset($_SESSION['town']);
    unset($_SESSION['area']);
    unset($_SESSION['lat']);
    unset($_SESSION['lng']);
    unset($_SESSION['agent']);
    unset($_SESSION['cell']);
    unset($_SESSION['aemail']);
    
    unset($_POST['newAgentCountry']);
    unset($_POST['newAgentProvince']);
    unset($_POST['newAgentTown']);
    unset($_POST['newAgentArea']);
    unset($_POST['newAgentlat']);
    unset($_POST['newAgentlng']);
    unset($_POST['newAgentName']);
    unset($_POST['newAgentCell']);
    unset($_POST['newAgentEmail']);
    unset($_POST['clearFormBtn']);
}







if(isset($_POST['newAgentCountry']) || isset($_SESSION['country'])) {
        if(isset($_SESSION['country'])){
   } else {
        if(isset($_POST['newAgentCountry'])) {
            $_SESSION['country'] = $_POST['newAgentCountry'];
        }
   }
}

if(isset($_POST['newAgentProvince']) || isset($_SESSION['province'])) {
        if(isset($_SESSION['province'])){
   } else {
        if(isset($_POST['newAgentProvince'])) {
            $_SESSION['province'] = $_POST['newAgentProvince'];
        }
   }
}

if(isset($_POST['newAgentTown']) || isset($_SESSION['town'])) {
        if(isset($_SESSION['town'])){
   } else {
        if(isset($_POST['newAgentTown'])) {
            $_SESSION['town'] = $_POST['newAgentTown'];
        }
   }
}

if(isset($_POST['newAgentArea']) || isset($_SESSION['area'])) {
        if(isset($_SESSION['area'])){
   } else {
        if(isset($_POST['newAgentArea'])) {
            $_SESSION['area'] = $_POST['newAgentArea'];
        }
   }
}

if(isset($_POST['newAgentlat']) || isset($_SESSION['lat'])) {
        if(isset($_SESSION['lat'])){
   } else {
        if(isset($_POST['newAgentlat'])) {
            $_SESSION['lat'] = $_POST['newAgentlat'];
        }
   }
}

if(isset($_POST['newAgentlng']) || isset($_SESSION['lng'])) {
        if(isset($_SESSION['lng'])){
   } else {
        if(isset($_POST['newAgentlng'])) {
            $_SESSION['lng'] = $_POST['newAgentlng'];
        }
   }
}

if(isset($_POST['newAgentName']) || isset($_SESSION['agent'])) {
        if(isset($_SESSION['agent'])){
   } else {
        if(isset($_POST['newAgentName'])) {
            $_SESSION['agent'] = $_POST['newAgentName'];
        }
   }
}

if(isset($_POST['newAgentCell']) || isset($_SESSION['cell'])) {
        if(isset($_SESSION['cell'])){
   } else {
        if(isset($_POST['newAgentCell'])) {
            $_SESSION['cell'] = $_POST['newAgentCell'];
        }
   }
}

if(isset($_POST['newAgentEmail']) || isset($_SESSION['email'])) {
        if(isset($_SESSION['aemail'])){
   } else {
        if(isset($_POST['newAgentEmail'])) {
            $_SESSION['aemail'] = $_POST['newAgentEmail'];
        }
   }
}




if(isset($_POST['addAgentBtn'])) {


    if(isset($_SESSION['country']) && ($_SESSION['province']) && ($_SESSION['town']) && ($_SESSION['area']) && ($_SESSION['lat']) && ($_SESSION['lng']) && ($_SESSION['agent']) && ($_SESSION['cell']) && ($_SESSION['aemail'])){

        
    $country = $_SESSION['country'];
    $province = $_SESSION['province'];
    $town = $_SESSION['town'];
    $area = $_SESSION['area'];
    $lng = $_SESSION['lng'];
    $lat = $_SESSION['lat'];
    $agent = $_SESSION['agent'];
    $cell = $_SESSION['cell'];
    $aemail = $_SESSION['aemail'];

    
        try{   
                                                    //SQL statement to update card
                                                    $sqlInsert = "INSERT INTO agents (agentName, country, province, town, area, lat, lng, cell, email)
                                                                VALUES (:agent, :country, :province, :town, :area, :lat, :lng, :cell, :aemail)";
                        
                                                                                                            
                                                    //use PDO prepared to sanitize SQL statement
                                                    $statement = $db->prepare($sqlInsert);
                                                                                                            
                                                    //execute the statement
                                                    $statement->execute(array(':agent' => $agent, ':country' => $country, ':province' => $province, ':town' => $town, ':area' => $area, ':lat' => $lat, ':lng' => $lng, ':aemail' => $aemail, ':cell' => $cell));
                                                                                                            
                                                    $_SESSION['agentAdded'] = "<h3>A new Agent was succesfully added</h3>";

                                                                                     
                                                                                                                                
                                                }catch (PDOException $ex){
                                                    $result = "An error occurred: ".$ex->getMessage();
                                                    echo $result;
                                                    
                                        }
                                        
                                        
        
    } else {
        echo' <h3>All fields are required</h3>';
    }
    
}


?>

<container>


                                                        <form action="" method="post">
                                                     
                                                            <input type="text" name="newAgentCountry" id="newAgentCountry" class="form-control" value="<?php if(isset($_SESSION['country'])) echo $_SESSION['country'];?>" placeholder="Country" required>
                                                            
                                                            <input type="text" name="newAgentProvince" id="newAgentProvince" class="form-control" value="<?php if(isset($_SESSION['province'])) echo $_SESSION['province'];?>" placeholder="Province" required>
                                                            
                                                            <input type="text" name="newAgentTown" id="newAgentTown" class="form-control" value="<?php if(isset($_SESSION['town'])) echo $_SESSION['town'];?>" placeholder="Town" required>
                                                            
                                                            <input type="text" name="newAgentArea" id="newAgentArea" class="form-control" value="<?php if(isset($_SESSION['area'])) echo $_SESSION['area'];?>" placeholder="Area" required>
                                                            
                                                            <input type="text" name="newAgentlat" id="newAgentlat" class="form-control" value="<?php if(isset($_SESSION['lat'])) echo $_SESSION['lat'];?>" placeholder="Lat" required>
                                                            
                                                            <input type="text" name="newAgentlng" id="newAgentlng" class="form-control" value="<?php if(isset($_SESSION['lng'])) echo $_SESSION['lng'];?>" placeholder="Lng" required>
                                                            
                                                            <input type="text" name="newAgentName" id="newAgentName" class="form-control" value="<?php if(isset($_SESSION['agent'])) echo $_SESSION['agent'];?>" placeholder="Agent" required>
                                                            
                                                            <input type="text" name="newAgentCell" id="newAgentCell" class="form-control" value="<?php if(isset($_SESSION['cell'])) echo $_SESSION['cell'];?>" placeholder="Cell" required>
                                                            
                                                            <input type="text" name="newAgentEmail" id="newAgentEmail" class="form-control" value="<?php if(isset($_SESSION['aemail'])) echo $_SESSION['aemail'];?>" placeholder="Email" required>
                                                            
                                                            
                                                            
                                                            <input type="submit" id="addAgentBtn" name="addAgentBtn" value="Add Agent" style="float:right;">
                                                            
                                                        </form>
                                                <form action="" method="post">
                                                    <input type="submit" id="clearFormBtn" name="clearFormBtn" value="Clear Form" style="float:left; margin-top:50px">
                                                </form>
</container>



<?php
    if(isset($_SESSION['agentAdded']))     
    
            echo $_SESSION['agentAdded'];
    
    unset($_SESSION['agentAdded']);
?>



            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->