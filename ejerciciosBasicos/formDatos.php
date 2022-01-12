
<!-- 
Crear un formulario que pida la siguiente información:
- Apellidos
- Nombre
- Provincia
- Familia Numerosa (si o no)
- Estado civil. Una de las opciones siguientes: Casado, Divorciado, Soltero, Separado
-->
<form action="mostrarDatos.php" method='get'>
	<label for="apellidos">apellidos:</label> 
	<input type="text" name="apellidos">
	<br> 
	<label for="nombre">nombre:</label> 
	<input type="text" name="nombre">
	<br> 
	<label for="provincia">provincia:</label> 
	<input type="text" name="provincia">
	<br> 
	<label for="familiaNumerosa">familia numerosa:</label>
	<input type='checkbox' name="familiaNumerosa">
	<br>
	Estado Civil:
	<br>
	<label for="estadoCivil">soltero:</label>
	<input type="radio" value="soltero" name="estadoCivil">
	<label for="estadoCivil">casado:</label>
	<input type="radio" value="casado" name="estadoCivil">
	<label for="estadoCivil">separado:</label>
	<input type="radio" value="separado" name="estadoCivil">
	<label for="estadoCivil">divorciado:</label>
	<input type="radio" value="divorciado" name="estadoCivil">
	<br> <input type="submit">
</form>

