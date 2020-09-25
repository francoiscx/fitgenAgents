          <!-- TO DO List -->
          <div class="box" style="height:900px; box-primary">
            <div class="box-header">
        <!--      <i class="ion ion-clipboard"></i> -->



<br><br>

  <style>
      .dataTables_wrapper .dataTables_filter input {
    background: #f0f0f0;
    }

    select {
    background: #f0f0f0;
    }

  </style>


      
  <table id="agentlist" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Town</th>
                <th>Area</th>
                <th>Province</th>
                <th>Country</th>
                <th>Agent</th>
                <th>Cell</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            

            
         <?php
    $active = 1;  

    //COUNT HOW MANY USERS NEED TO BE DISPLAYED
    $sqlQuery = "SELECT count(*) from agents WHERE active = $active";
    $result = $db->prepare($sqlQuery); 
    $result->execute(array(':active' => $active)); 
    $agentInfo = $result->fetchColumn();


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                            
//NOW THAT THERE IS ONE OR MORE AGENTS LISTED FETCH DETAILS FOR EACH AGENT                                
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                 


        if(isset($agentInfo)) {
 
                                $agentInfoQuery = "
         
                                    SELECT
                                        agents.agentID,
                                        agents.country,
                                        agents.province,
                                        agents.town,
                                        agents.area,
                                        agents.agentName,
                                        agents.cell,
                                        agents.email,
                                        agents.lat,
                                        agents.lng
                                    FROM
                                        agents
                                    WHERE
                                        agents.active = $active
                                    ORDER BY agents.country DESC, agents.province, agents.town, agents.area, agents.agentname ASC
                                ";
                         
                                $agentsInfo = $db->query($agentInfoQuery)->fetchAll();
    
    //var_dump($agentsInfo);                            
               
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                            
//START FOR EACH LOOP - BUILD FILES FOR EACH AGENT                                
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                             

            foreach($agentsInfo as $agentsInfo):
                
                                                                        $agentsInfoID = $agentsInfo['agentID'];
                                                        
                                                        
                                                                        //THIS WILL RETREIVE THE INFO TO POPULATE THE AGENTCARD IN QUESTION
                                                                        $getagentQuery = "
                                                                                                                        
                                                                                            SELECT 
                                                                                                    agents.agentID,
                                                                                                    agents.country,
                                                                                                    agents.province,
                                                                                                    agents.town,
                                                                                                    agents.area,
                                                                                                    agents.agentName,
                                                                                                    agents.cell,
                                                                                                    agents.email,
                                                                                                    agents.lat,
                                                                                                    agents.lng
                                                                                            FROM
                                                                                                agents
                                                                                            WHERE
                                                                                                agents.agentID = $agentsInfoID AND agents.active = $active
                                                                                        ";
                                                                                        
                                                                                        $getagent = $db->query($getagentQuery);
    //var_dump($getagentStep1);                                    
                                                                                                            foreach($getagent->fetchAll() as $getagent):

                                                                                                            $agent = $getagent['agentName'];
                                                                                                            $province = $getagent['province'];
                                                                                                            $country = $getagent['country'];
                                                                                                            $town = $getagent['town'];
                                                                                                            $area = $getagent['area'];
                                                                                                            $cell = $getagent['cell'];
                                                                                                            $email = $getagent['email'];
                                                                                                            $lat = $getagent['lat'];
                                                                                                            $lng = $getagent['lng'];
                                                                                                            
                                                                                                            endforeach;
/////////////////////////////////////////// 
					
?>

        <tr>
            <td><?php echo $town;?></td>
            <td><?php echo $area;?></td>
            <td><?php echo $province;?></td>
            <td><?php echo $country;?></td>
            <td><?php echo $agent;?></td>
            <td><?php echo '<a href="tel:' . $cell . '" style="text-decoration:none; color:#82b834">' . $cell . '</a>';?></td>
            <td><?php echo '<a href="mailto:' . $email . '" style="color:#82b834">' . $email . '</a>';?></td>
        </tr>        
<?php
            endforeach;
        }
?>

        
        </tbody>


        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
       
    </table>

        </div>

        <content >
            <center>
                <h4 style="padding:25px">
                    No agents in your area.<br>
                    We can still help.<br>
                    Please contact our headoffice: <br><br>
                    Tel: <a href="tel:+27647556332">+27 (64) 755 6332</a> <br><br>
                    Email: <a href="mailto:info@fitgen.co.za">info@fitgen.co.za</a>
                </h4>
            </center>
        </content>





            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->





            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->




