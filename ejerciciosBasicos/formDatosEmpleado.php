
<form action="mostrarDatosEmpleado.php" method='get'>
	<label for="apellidos">apellidos:</label> 
	<input type="text" name="apellidos">
	<br> 
	<label for="nombre">nombre:</label> 
	<input type="text" name="nombre">
	<br> 
	<label for="dni">dni:</label> 
	<input type="text" name="dni">
	<br> 
	<label for="sueldo">sueldo:</label> 
	<input type="text" name="sueldo">
	<br> 
	<label for="jefeProyecto">Jefe de Proyecto:</label>
	<input type='checkbox' name="jefeProyecto">
	<br>
	<label for="reduccionJornada">Reducción de Jornada:</label>
	<input type='checkbox' name="reduccionJornada">
	<br>
	Categoría:
	<br>
	<label for="categoria">analista:</label>
	<input type="radio" value="analista" name="categoria">
	<label for="categoria">programador:</label>
	<input type="radio" value="programador" name="categoria">
	<label for="categoria">operador:</label>
	<input type="radio" value="operador" name="categoria">
	<br>
	 <label for="conocimientos">conocimientos:</label>
    <select name="conocimientos[]" multiple>
      <option value="java">java</option>
      <option value="php">php</option>
      <option value="asp">asp</option>
      <option value="c">c</option>
    </select> 
    <br>
	 <label for="departamento">departamento:</label>
    <select name="departamento" size=2>
      <option value="informática">java</option>
      <option value="contabilidad">php</option>
      <option value="almacen">asp</option>
      <option value="ventas">c</option>
    </select> 
    <br>
	 <label for="formacion">formacion:</label>
    <select name="formacion">
      <option value=""></option>
      <option value="universitaria">universitaria</option>
      <option value="FP superior">FP superior</option>
      <option value="bachillerato">bachillerato</option>
    </select> 
	<br> <input type="submit">
	
</form>

