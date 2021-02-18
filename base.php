<?php
session_start();
include('database.inc.php');
if(!isset($_SESSION['UID'])){
  header('location:index.php');
  die();
}
$time=time();
$res=mysqli_query($con,"select * from user");
?>


<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Acompanhamento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
  /* FullWidth Template */
  .fullwidth,
  .fullwidth body {
    padding: 0;
    max-width: 100%;
  }

  #produtos {
  padding: 10px;
  margin: 0px 10px 10px 0px;  
  

  }

back-ground {


}

tr:hover { 
   background: red; 
}
td a { 
   display: block; 
   border: 1px solid black;
   padding: 16px; 
}


  table {
    width: 20px;
    table-layout: fixed;

  }

  td {
   width: 20px;

  }

  }

  .tabel {
    
    
    padding: 20px;
    margin: 400px;
    margin-top: 80px;
    widows: 700px;
  }

  #uf {
    margin: 0px 10px 0px 10px;
  }

  .tcont td{
        background-color: #fff;
        color: #444;
        font-size: 11px;
        border-top: solid 1px #ccc;
        border-right: solid 1px #ccc;
          padding: 8px;
          line-height: 125%;
           text-transform: uppercase;

  .table-bordered

  #contato {
    

  

 
  #butao {
    margin: 100px 500px;
    padding: 400px 400px 400px 400px;
  }



</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/67439/basic.css'>
<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/67439/data-buttons.css'>
<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/67439/data-modal.css'><link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<script type="text/javascript">
  
  function openform() {

      window.location.href="form_client.php?id=("24")";

  }



</script>


</head>

<body class=fullwidth>
  

<h1>Acompanhamento</h1>


<?php
require_once('../conex.class.php');

$Objdb = new database();
$link = $Objdb->conecta_mysql();

$sql = "SELECT * FROM client_prop";





/* $resultado = mysqli_query($link,$sql);

  if ($resultado) {

    echo "<script>alert('Conexão ok!');</script>";
  } else {
    echo " Erro ao conectar";
  } */ //Teste de Conexão com o BD.



  $result = mysqli_query($link,$sql);

  $dados_usuario = $result;

                 //table-striped table table-hover  table table-bordered"

?>

<div class="tabel">
  <div class="container">
    <css style: margin-left: 50px; ><h4 >Base de Clientes</h4></style>

    <table class="table table-bordered table-hover w3-table-all w3-hoverable">
      <thead>
        <tr class="w3-light-grey">
          <th>Nome</th>
          <th>CPF</th>
          <th>Pedido</th>
          <th>Endereço</th>
          <th>Bairro</th>
          <th>Plano</th>
          <th>Fixo</th>
          <th>Editar</th>
          
        <?php while ($dado = mysqli_fetch_array($result)) {
        ?>
        
      </tr>
      <div class="tcont" ondblclick="openform()">
             
            
            <tr>
             <td><?php echo $dado['nome']; ?></td>  
              <td><?php echo $dado['cpf']; ?></td>
              <td><?php echo $dado['id']; ?></td>
              <td><?php echo $dado['rua']; ?></td>
              <td><?php echo $dado['bairro']; ?></td>
              <td><?php echo $dado['blarga']; ?></td>
              <td><?php echo $dado['fixo']; ?></td>
               <?php $id = $dado['id'];            ?>
              <td>
              <a class="btn btn-info" href="form_client.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

              
              </td>

            </tr>



            </a>
        
      <div>


     <?php }

     ?>
    
    


    </table>
  </div>
</div>













</body>

<script>
    
   




      

  <script src='https://cdnjs.cloudflare.com/ajax/libs/eqcss/1.7.0/EQCSS-polyfills.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/eqcss/1.7.0/EQCSS.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/67439/data-modals.js'></script>
</script>
</body>
</html>
