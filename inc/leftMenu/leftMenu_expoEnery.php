<?php
if($siteSection == "Expo") {

echo '    <li class="active treeview">';

} else {
    
echo '    <li class="treeview">';
    
}
?>
          <a href="#">
            <i class="fa fa-folder-o"></i> <span>Expo Entery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              
 
 
 
 
             
<?php


if($sitePage == "newEntery") {

echo '      <li><a href="/inc/page/expoAgents/redirectNewEnteryWithIdentifier.php"><i class="fa fa-circle"></i>New Entery</a></li>';

} else {
 
echo '      <li><a href="/inc/page/expoAgents/redirectNewEnteryWithIdentifier.php"><i class="fa fa-circle-o"></i>New Entery</a></li>';   
    
}
            


if($sitePage == "viewAllEnteries") {

echo '      <li><a href="/expo.php?id=2"><i class="fa fa-circle"></i>View All Enteries</a></li>';

} else {
 
echo '      <li><a href="/expo.php?id=2"><i class="fa fa-circle-o"></i>View All Enteries</a></li>';   
    
}
    
/*


if($sitePage == "reviewJob") {

echo '      <li><a href="/workbench.php?id=3"><i class="fa fa-circle"></i>Review Job</a></li>';

} else {
 
echo '      <li><a href="/workbench.php?id=3"><i class="fa fa-circle-o"></i>Review Job</a></li>';   
    
}
*/



?>
            
          </ul>
</li>


