<?php
session_start();
 ?>
      <?php
      if (isset($_SESSION['listar_excel'])):
        foreach (@$_SESSION['listar_excel'] as $key) {
        $dat=explode("||", $key);
       ?>
       <tr>
         <th><?php echo $dat[0] ?></th>
         <?php if($dat[1]=="Desayuno"){echo "<th>$dat[1] <img src='./pictures/des.png' width='30' height='30'></th>";} else if($dat[1]=="Almuerzo"){echo "<th>$dat[1] <img src='./pictures/alm.png' width='30' height='30'></th>";} else if($dat[1]=="Cena"){ echo "<th>$dat[1] <img src='./pictures/cen.png' width='30' height='30'></th>";}
          else if($dat[1]=="Merienda"){echo "<th>$dat[1] <img src='./pictures/mer.png' width='30' height='30'></th>";} else{ echo "<th>$dat[1]</th>"; }?>
         <th style="text-align:center;"><?php echo $dat[2] ?></th>
         <th style="text-align:center;"><?php echo $dat[10] ?></th>
         <th><?php echo $dat[3] ?></th>
         <th><?php echo $dat[4] ?></th>
         <th><?php echo $dat[5] ?></th>
         <th><?php echo $dat[6] ?></th>
         <th><?php echo $dat[7] ?></th>
         <?php if($dat[8] =='1'){echo "<th>Huella</th>";} else if($dat[8] =='2'){echo "<th>Id Usuario</th>";} else if($dat[8] =='3'){echo "<th>Contraseña</th>";} else if($dat[8] =='4'){echo "<th>Tarjeta</th>";} ?>
         <!-- <?php if($dat[9] =='10'){echo "<th>Entrada</th>";} else if($dat[9] =='11'){echo "<th>Salida</th>";} else if($dat[9] =='14'){echo "<th>Salida T.E</th>";} else if($dat[9] =='15'){echo "<th>Entrada T.E</th>";} ?> -->
       </tr>

<?php } ?>
<?php endif;?>
