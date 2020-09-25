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
                <th>Name</th>
                <th>Surname</th>
                <th>Cell</th>
                <th>Email</th>
                <th>Area</th>
            </tr>
        </thead>
        <tbody>
            

            
         <?php

    //COUNT HOW MANY USERS NEED TO BE DISPLAYED
    $sqlQuery = "SELECT count(*) from fibo2018";
    $result = $db->prepare($sqlQuery); 
    $result->execute(array(':active' => $active)); 
    $agentInfo = $result->fetchColumn();


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                            
//NOW THAT THERE IS ONE OR MORE fibo2018 LISTED FETCH DETAILS FOR EACH AGENT                                
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                 


        if(isset($agentInfo)) {
 
                                $agentInfoQuery = "
         
                                    SELECT
                                        fibo2018.fiboID,
                                        fibo2018.fiboName,
                                        fibo2018.fiboSurname,
                                        fibo2018.fiboArea,
                                        fibo2018.fiboCell,
                                        fibo2018.fiboEmail
                                    FROM
                                        fibo2018
                                    ORDER BY fibo2018.fiboID, fibo.fiboName, fibo.fiboSurname, fibo.fiboArea, fibo.fiboCell, fibo.fiboEmail
                                ";
                         
                                $fibo2018Info = $db->query($agentInfoQuery)->fetchAll();
    
    //var_dump($fibo2018Info);                            
               
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                                                                            
//START FOR EACH LOOP - BUILD FILES FOR EACH AGENT                                
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                             

            foreach($fibo2018Info as $fibo2018Info):
                
                                                                        $fibo2018InfoID = $fibo2018Info['fiboID'];
                                                        
                                                        
                                                                        //THIS WILL RETREIVE THE INFO TO POPULATE THE AGENTCARD IN QUESTION
                                                                        $fibo2018Query = "
                                                                                                                        
                                                                                            SELECT 
                                                                                                    fibo2018.fiboID,
                                                                                                    fibo2018.fiboName,
                                                                                                    fibo2018.fiboSurname,
                                                                                                    fibo2018.fiboArea,
                                                                                                    fibo2018.fiboCell,
                                                                                                    fibo2018.agentName,
                                                                                                    fibo2018.fiboEmail
                                                                                            FROM
                                                                                                fibo2018
                                                                                            WHERE
                                                                                                fibo2018.fiboID = $fibo2018InfoID
                                                                                        ";
                                                                                        
                                                                                        $fibo2018 = $db->query($fibo2018Query);
    //var_dump($getfibo2018tep1);                                    
                                                                                                            foreach($fibo2018->fetchAll() as $fibo2018):

                                                                                                            $fiboID = $fibo2018['fiboID'];
                                                                                                            $fiboName = $fibo2018['fiboName'];
                                                                                                            $fiboSurname = $fibo2018['fiboSurname'];
                                                                                                            $fiboArea = $fibo2018['fiboArea'];
                                                                                                            $fiboCell = $fibo2018['fiboCell'];
                                                                                                            $fiboEmail = $fibo2018['fiboEmail'];

                                                                                                            
                                                                                                            endforeach;
/////////////////////////////////////////// 
					
?>

        <tr>
            <td><?php echo $fiboName;?></td>
            <td><?php echo $fiboSurname;?></td>
            <td><?php echo '<a href="tel:' . $fiboCell . '" style="text-decoration:none; color:#82b834">' . $fiboCell . '</a>';?></td>
            <td><?php echo '<a href="mailto:' . $fiboEmail . '" style="color:#82b834">' . $fiboEmail . '</a>';?></td>
            <td><?php echo $fiboArea;?></td>
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
            </tr>
        </tfoot>
       
    </table>

        </div>







            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->





            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->




