<?php

class CkDbComponent extends Object{
// ==================================================================
//	DB Constructor

		//$config = new DATABASE_CONFIG();


var $dbuser = 'root';
var $dbpass = 'traveler';
var $dbname = 'pitutaria';
var $dbhost = 'localhost';

	function ckdb() {
		$this->dbh = @mysql_connect($dbhost, $dbuser, $dbpass);
		if (!$this->dbh) {
			$this->err("");
		}
		$this->select($dbname);
	}

	function select($db) {
		if (!@mysql_select_db($db, $this->dbh)) {
			$this->err();
		}
	}

	function charset(){
	$caracteres = mysql_client_encoding($this->dbh);
	return $caracteres;
	}

	function query($query)	{
		$this->result = @mysql_query($query);
		return $this->result;
	}

	function object($query){
		$this->result=$this->query($query);
			while($row=@mysql_fetch_object($this->result)){$valor[]=$row;}
			return $valor;
	}

	function row($query)	{
		$this->result=$this->query($query);
			while($row=@mysql_fetch_object($this->result)){$r[]=$row;}
			if (@mysql_num_rows($this->result)!=0){
			foreach ($r as $valor) {}
			}
		return $valor;
	}

	function row_object($tabla, $key, $value)	{
		$this->result=$this->query("SELECT * FROM $tabla WHERE $key = '$value'");
			while($row=@mysql_fetch_object($this->result)){$r[]=$row;}
			if (@mysql_num_rows($this->result)!=0){
			foreach ($r as $valor) {}
			}
		return $valor;
	}

	function save($vars, $tabla){
	$value_vars="";
	$name_vars="";
			$fields=$this->query("SELECT * FROM $tabla");
			$num = mysql_num_fields($fields);
		   	for ($i=0; $i<$num ; $i++ ) {
       				$fieldsname[] = mysql_field_name($fields, $i);
       			}

		foreach($vars as $clave => $valor){
				if (!in_array($clave, $fieldsname)){
			    	$clavelist[]=$clave;
				}
		   		$value_vars .= "'" . $valor . "', ";
		   		$name_vars .= $clave .", ";

		    	}
		$name_vars=trim($name_vars, ", ");
		$value_vars=trim($value_vars, ", ");

		if (isset($clavelist)){
			return $clavelist;
		}
		else{
			$this->query("INSERT INTO $tabla ($name_vars) values ($value_vars)");
			return false;
		}
	}



	function delete($key,$val, $tabla){
		$this->query("delete from $tabla where $key = $val");
	}

	function update($id, $vars, $tabla){
	$pares="";
			$fields=$this->query("SELECT * FROM $tabla");
			$num = mysql_num_fields($fields);
		   	for ($i=0; $i<$num ; $i++ ) {
       				$fieldsname[] = mysql_field_name($fields, $i);
       			}

		foreach($vars as $clave => $valor){
			if (!in_array($clave, $fieldsname)){
			    	$clavelist[]=$clave;
				}
		   		$pares .= $clave ." = '". $valor ."', ";
		    	}
		$pares = trim($pares, ", ");

		if (isset($clavelist)){
			return $clavelist;
		}
		else{
			$this->query("UPDATE $tabla SET $pares WHERE id = $id");
			return false;
		}
		}



	function err(){
	echo '<div class="error"><h3>Error de la BB.DD</h3>
	<p>Hubo un error en la conexi&oacute;n con la bb.dd. Las posibilidades son tres:</p>
	<ul>
	<li>El nombre de usuario es incorrecto</li>
	<li>El password utilizado es incorrecto</li>
	<li>El host de la bb.dd es incorrecto</li>
	</ul>
	<p>Puedes comprobar estos datos en el archivo config.php</p>
	</div>
	';
	exit;
	}
}//end class
?>