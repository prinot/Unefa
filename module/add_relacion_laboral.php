<?php
	require('../secure/class.config.php');
	conexion();
	if(!empty($_POST['guardar'])){
		
		 $a=$_POST['id_persona'];
		 $b=$_POST['si_orden_administrativa'];
		 $c=$_POST['si_numero_documen'];
		 $d=$_POST['si_oficio'];
		 $e=$_POST['si_numero_oficio'];
		 $f=$_POST['fe_oficio'];
		 $g=$_POST['id_condicion_trab'];
		 $h=$_POST['id_tipo_docente'];
		 $i=$_POST['id_categoria_docente'];
		 $j=$_POST['id_estatus_laboral'];
		 $k=$_POST['obs_status'];
		 $l=$_POST['fe_ingreso'];
		 $m=$_POST['id_cargo_colateral'];
	  	 $n=$_POST['fe_orden'];
		
		pg_query("insert into sys_relacion_laboral (id_persona,
												   si_orden_administrativa,
												   si_numero_documen,
												   si_oficio,
												   si_numero_oficio,
												   fe_oficio,
												   id_condicion_trab,
												   id_tipo_docente,
												   id_categoria_docente,
												   id_estatus_laboral,
												   obs_status,
												   fe_ingreso,
												   id_cargo_colateral,
												   fe_orden) values ($a,
												   					 '$b',
																	 '$c',
																	 '$d',
																	 '$e',
																	 '$f',
																	 $g,
																	 $h,
																	 $i,
																	 $j,
																	 'si',
																	 '$l',
																	 $m,
																	 '$n')");
				echo '<center><br><br><hr>Relacion laboral guardada con exito.<hr><br><br></center>';
	}else{
?>

<form action="add_relacion_laboral.php" method="post">
<input type="hidden" name="id_persona" value="<?php echo $_GET['id_persona'];?>">
<table width="70%" border="0" align="center">
  <tr>
    <td><strong>Orden administrativa:</strong></td>
    <td>
    <select name="si_orden_administrativa">
    	<option value="0">NO</option>
        <option value="1">SI</option>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Numero de documento:</strong></td>
    <td><input name="si_numero_documen" type="text" autocomplete="off" placeholder="Escribe aqui..." maxlength="15"></td>
  </tr>
  <tr>
    <td><strong>Oficio:</strong></td>
    <td>
    	<select name="si_oficio">
    	<option value="0">NO</option>
        <option value="1">SI</option>
    </select>
    </td>
  </tr>
  <tr>
    <td><strong>Numero de oficio:</strong></td>
    <td><input name="si_numero_oficio" type="text" required autocomplete="off" placeholder="Escribe aqui..." maxlength="15"></td>
  </tr>
  <tr>
    <td><strong>Fecha de oficio:</strong></td>
    <td><input name="fe_oficio" type="date" required autocomplete="off"></td>
  </tr>
  <tr>
    <td><strong>Condicion de trabajo:</strong></td>
    <td>
    	<select name="id_condicion_trab">
		<?php $query1=(pg_query('select * from par_condicion_trab'));
		while($row1=(pg_fetch_array($query1)))
		{
		?>
        	<option value="<?php echo $row1['id_condicion_trab'];?>"><?php echo $row1['nb_condicion_trab']?></option>
        <?php
		}
		?>
        </select>
    </td>
  </tr>
  <tr>
    <td><strong>Dedicacion del docente:</strong></td>
    <td>
    	<select name="id_tipo_docente">
		<?php $query2=(pg_query('select * from par_tipo_docente'));
		while($row2=(pg_fetch_array($query2)))
		{
		?>
        	<option value="<?php echo $row2['id_tipo_docente'];?>"><?php echo $row2['nb_tipo_docente']?></option>
        <?php
		}
		?>
        </select>
    </td>
  </tr>
  <tr>
    <td><strong>Categoria de docente:</strong></td>
    <td>
    	<select name="id_categoria_docente">
		<?php $query3=(pg_query('select * from par_cat_docente'));
		while($row3=(pg_fetch_array($query3)))
		{
		?>
        	<option value="<?php echo $row3['id_cat_docente'];?>"><?php echo $row3['nb_categoria_docente']?></option>
        <?php
		}
		?>
        </select>
    </td>
  </tr>
  <tr>
    <td><strong>Status laboral:</strong></td>
    <td>
    	<select name="id_estatus_laboral">
		<?php $query4=(pg_query('select * from par_estatus_laboral'));
		while($row4=(pg_fetch_array($query4)))
		{
		?>
        	<option value="<?php echo $row4['id_estatus_laboral'];?>"><?php echo $row4['nb_estatus_laboral']?></option>
        <?php
		}
		?>
        </select>
    </td>
  </tr>
  <tr>
    <td><strong>Observacion de status:</strong></td>
    <td><textarea name="obs_status" cols="40" rows="3" placeholder="Escribe aqui..."></textarea></td>
  </tr>
  <tr>
    <td><strong>Fecha de ingreso:</strong></td>
    <td><input name="fe_ingreso" type="date" required autocomplete="off"></td>
  </tr>
  <tr>
    <td><strong>Cargo colateral:</strong></td>
    <td>
    	<select name="id_cargo_colateral">
		<?php $query5=(pg_query('select * from par_cargo_colateral'));
		while($row5=(pg_fetch_array($query5)))
		{
		?>
        	<option value="<?php echo $row5['id_cargo_colateral'];?>"><?php echo $row5['nb_cargo']?></option>
        <?php
		}
		?>
        </select>
    </td>
  </tr>
  <tr>
    <td><strong>Fecha de orden:</strong></td>
    <td><input name="fe_orden" type="date" required autocomplete="off"></td>
  </tr>
  <tr>
  <td colspan="2" align="center"><br><hr><br><input name="guardar" type="submit" value=" GUARDAR "> <a href="../extras/home.html" target="_web"><strong>[Regresar]</strong></a></td>
  </tr>
</table>
</form>
<?php }?>