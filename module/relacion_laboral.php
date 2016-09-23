<a href="../extras/home.html" target="_web"><h3>[Regresar]</h3></a><h2 align="center">Relacion Laboral</h2>
<?php
if(isset($_GET['id_persona'])){
	if(!empty($_GET['id_persona'])){
		require('../secure/class.config.php');
		conexion();
		$query=(pg_query('select * from sys_relacion_laboral'));
		$existente=0;
		$exito=0;
		while($row=(pg_fetch_array($query))){
			$existente+=1;	
			if($row['id_persona']==$_GET['id_persona']){
				$exito+=1;
			?>
                <table width="100%" border="1" style="border-collapse:collapse;">
                  <tr align="center">
                    <td><strong>Orden administrativa</strong></td>
                    <td><strong>Numero de documento</strong></td>
                    <td><strong>Oficio</strong></td>
                    <td><strong>Numero de oficio</strong></td>
                    <td><strong>Fecha de oficio</strong></td>
                    <td><strong>Condicion de trabajo</strong></td>
                    <td><strong>Tipo de docente</strong></td>
                    <td><strong>Categoria de docente</strong></td>
                    <td><strong>Status laboral</strong></td>
                    <td><strong>Observacion de status</strong></td>
                    <td><strong>Fecha de ingreso</strong></td>
                    <td><strong>Cargo colateral</strong></td>
                    <td><strong>Fecha de orden</strong></td>
                  </tr>
                  <tr>
                    <td><?php if($row['si_orden_administrativa']=='f'){ echo 'NO';}else{ echo 'SI';}?></td>
                    <td><?php echo ($row['si_numero_documen']);?></td>
                    <td><?php if($row['si_oficio']=='f'){ echo 'NO';}else{ echo 'SI';}?></td>
                    <td><?php echo ($row['si_numero_oficio']);?></td>
                    <td><?php echo ($row['fe_oficio']);?></td>
                    <td><?php 
								$query1=(pg_query('select * from par_condicion_trab'));
								while($row1=pg_fetch_array($query1)){
									if($row['id_condicion_trab']==$row1['id_condicion_trab']){
										echo $row1['nb_condicion_trab'];
									}
								}
						?>
                    </td>
                    <td><?php 
								$query2=(pg_query('select * from par_tipo_docente'));
								while($row2=pg_fetch_array($query2)){
									if($row['id_tipo_docente']==$row2['id_tipo_docente']){
										echo $row2['nb_tipo_docente'];
									}
								}
						?>
					</td>
                    <td><?php 
								$query3=(pg_query('select * from par_cat_docente'));
								while($row3=pg_fetch_array($query3)){
									if($row['id_categoria_docente']==$row3['id_cat_docente']){
										echo $row3['nb_categoria_docente'];
									}
								}
						?>
					</td>
                    <td><?php 
								$query4=(pg_query('select * from par_estatus_laboral'));
								while($row4=pg_fetch_array($query4)){
									if($row['id_estatus_laboral']==$row4['id_estatus_laboral']){
										echo $row4['nb_estatus_laboral'];
									}
								}
						?>
                    </td>
                    <td><?php echo ($row['obs_status']);?></td>
                    <td><?php echo ($row['fe_ingreso']);?></td>
                    <td><?php 
								$query5=(pg_query('select * from par_cargo_colateral'));
								while($row5=pg_fetch_array($query5)){
									if($row['id_cargo_colateral']==$row5['id_cargo_colateral']){
										echo $row5['nb_cargo'];
									}
								}
						?>
                    </td>
                    <td><?php echo ($row['fe_orden']);?></td>
                  </tr>
                </table>
            <?php
			}
		}
		if($exito<=0){
				echo ('<br><hr><center>Error. La relacion laboral de este trabajador no existe en la base de datos.<br>¿Desea agregar la relacion laboral a este trabajador? <a href="add_relacion_laboral.php?id_persona='.$_GET['id_persona'].'" target="_web">Si</a></center><hr>');
		}
		if($existente<=0){
			echo ('<br><hr><center>Error. la tabla que contiene la informacion de la relacion laboral esta vacia.<br>¿Desea agregar la relacion laboral a este trabajador? <a href="add_relacion_laboral.php?id_persona='.$_GET['id_persona'].'" target="_web">Si</a></center><hr>');
		}
	}else{
		echo ('<br><hr><center>Error. en la relacion laboral del trabajador.</center><hr>');
	}
}
else{
	header('Location: ../extras/home.html');
}
?>