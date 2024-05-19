<?php
include("../../conexion.php");

if (isset($_GET["id"])) {
    $txtid = (isset($_GET["id"]) ? $_GET["id"] : "");

    $stm = $conexion->prepare("SELECT * FROM contactos WHERE id=:txtid");

    $stm->bindParam(":txtid", $txtid);
    $stm->execute();

    $registro = $stm->fetch(PDO::FETCH_ASSOC);
    $nombre = $registro["nombre"];
    $telefono = $registro["telefono"];
    $fecha = $registro["fecha"];



    if ($_POST) {
        $txtid=(isset($_POST["txtid"])?$_POST["txtid"]: "" );
        $nombre=(isset($_POST["nombre"])?$_POST["nombre"]: "" );
        $telefono=(isset($_POST["telefono"])?$_POST["telefono"]: "" );
        $fecha=(isset($_POST["fecha"])?$_POST["fecha"]: "" );
    
        $stm = $conexion->prepare("UPDATE contactos SET nombre=:nombre, telefono=:telefono, fecha=:fecha WHERE id=:txtid");
    
    
        $stm->bindParam(":nombre",$nombre);
        $stm->bindParam(":telefono",$telefono);
        $stm->bindParam(":fecha",$fecha);
        $stm->bindParam(":txtid",$txtid);
        
        
        $stm->execute();
    
        header("location:index.php");

    
    }
    
    
}
?>

<?php
include("../../template/header.php");
?>

<form action="" method="post">
    <input type="hidden" name="txtid" value="<?php echo $txtid; ?>">
       
    <label for="">Nombre</label>
    <input type="text" class="form-control" placeholder="Escribe tu nombre" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>">
    
    <label for="">Telefono</label>
    <input type="text" class="form-control" placeholder="Escribe tu Telefono" name="telefono" value="<?php echo isset($telefono) ? $telefono : ''; ?>">
    
    <label for="">Fecha</label>
    <input type="date" class="form-control" placeholder="Escribe tu fecha" name="fecha" value="<?php echo isset($fecha) ? $fecha : ''; ?>">
    
    <div class="modal-footer">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>

<?php
include("../../template/footer.php");
?>
