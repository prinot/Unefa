<center>
	Ingrese cedula de identidad: 
    <form method="post" action="b_personas.php" target="_web">
    	<input name="cedula" type="text" size="8" maxlength="8" autocomplete="off" placeholder="Escribe Aqui..." required>
    	<input name="button" type="submit" value=" Buscar ">
    </form>


<?php
if(isset($_POST['cedula'])){
	require('../secure/class.config.php');
	conexion();
	$cedula=($_POST['cedula']);
	$query=pg_query('select * from sys_persona');
	$existe=0;
	while($row=(pg_fetch_array($query))){
		if($row['nu_cedula']==$cedula){
			if($existe<=0){
				$existe=1;
	?>
            <table align="center" id="table_consulta" width="100%" border="1" style="border-collapse: collapse; font-size: 12px;">
                <tr align="center">
                    <td><strong>Cedula</strong></td>
                    <td><strong>1er. Nombre</strong></td>
                    <td><strong>2do. Nombre</strong></td>
                    <td><strong>1er. Apellido</strong></td>
                    <td><strong>2do. Apellido</strong></td>
                    <td><strong>F. Nacimiento</strong></td>
                    <td><strong>L. Nacimiento</strong></td>
                    <td><strong>E-mail</strong></td>
                    <td><strong>Telef. Habitacion</strong></td>
                    <td><strong>Telef. Celular</strong></td>
                    <td><strong>Ver R.L</strong></td>
                </tr>
                <tr>
                    <td><?php echo $row['nu_cedula'];?></td>
                    <td><?php echo $row['nb_pnombre'];?></td>
                    <td><?php echo $row['nb_snombre'];?></td>
                    <td><?php echo $row['nb_papellido'];?></td>
                    <td><?php echo $row['nb_sapellido'];?></td>
                    <td><?php echo $row['fe_nacimiento'];?></td>
                    <td><?php echo $row['in_lugar_nac'];?></td>
                    <td><?php echo $row['ce_correo'];?></td>
                    <td><?php echo $row['nu_telhab1'];?></td>
                    <td><?php echo $row['nu_telcel1'];?></td>
                    <td align="center">
                    <form method="post" action="relacion_laboral.php?id_persona=<?php echo $row['id_persona'];?>" target="_web">
                    <input name="button" type="submit" value=" Ver "></form></td>
                </tr>
            </table>
	<?php
			}
		}
	}
	if($existe==0){
		echo '<br><hr>La cedula de identidad, no se encuentra localizada.<hr>';
	}
}
?>
</center>