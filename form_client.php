
<?php

session_start();
include('database.inc.php');
if(!isset($_SESSION['UID'])){
    header('location:index.php');
    die();
}
$time=time();
$res=mysqli_query($con,"select * from user") or die;


require_once('../conex.class.php');
$Objdb = new database();
$link = $Objdb->conecta_mysql();











if(@$_GET['func'] == 'edita'){
  $id = intval($_GET['id']);
  $query = "SELECT * FROM client_prop WHERE id = '$id'";

}

$result = mysqli_query($link,$query);

$dados_usuario = $result;




?>

<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Optimus - Acompanhamento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

  #uf {
    margin: 0px 10px 0px 10px;
  }

  .bloco {
    

  }

  .MyAud {
    position: relative;
    top: 1000px;
    padding: 5px;
    width: 150px;
    margin-left: 30px;
    background-color: #FF0;
    border: solid 1px #F63;
  font-size: 11px;
} 

  #contato {
    

  }

 .fullwidth > .wrap {
    padding: 0;
    margin: 0;
    max-width: none;
  }
  .fullwidth > .wrap [data-theme] {
    padding: 1.5em 1.5em 3em 1.5em;
  }
  .fullwidth > .wrap .wrap {
    margin: 0 auto;
    padding: 0;
    max-width: 850px;
  }
  [data-button] {
    display: block !important;
    margin: 1em auto !important;
  }
  h2 {
    text-align: center !important;
  }

  #tamanho {
    margin:  10px;
    padding: 10px;
  }

  #butao {
    margin: 100px 500px;
    padding: 400px 400px 400px 400px;
  }
</style><link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700,300italic,400italic,500italic,700italic|Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic|Source+Code+Pro:300,400,500,600,700,900'>
<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/67439/basic.css'>
<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/67439/data-buttons.css'>
<link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/67439/data-modal.css'><link rel="stylesheet" href="./style.css">

</head>

<script>
    // CARREGA ENDEREÇO COM DADOS DOS CORREIOS
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    //FUNÇÃO PARA EXIBIR DIV(MYAUD) COM NOME DO BACK OFFICE E CLIENTE EM TRATAMENTO
    function dom(){
      const MyAud = document.getElementById("MyAud");
      console.log("MyAud");
    }

    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", dom();
    } else {
      dom();

    }


  </script>
<body>
<!-- partial:index.partial.html -->
<body class=fullwidth>

  <?php while ($dado = mysqli_fetch_array($result)) {
            
            

            
            ?>


  
  <div class="MyAud" scope="row">
        
              <tbody id="user_grid">
                 <?php 
                 $i=1;
                 while($row=mysqli_fetch_assoc($res)){
                 $status='Offline';
                 $class="btn-danger";
                 if($row['last_login']>$time){
                  $status='Online';
                  $class="btn-success";
                 }

         
         

                  ?> 
                   <tr>
                      <th scope="row"><?php echo $i?></th>
                      <td><?php echo $row['name']?></td>
                      <td><button type="button" class="btn <?php echo $class?>"><?php echo $status?></button></td>
                   </tr>
             <?php 
             $i++;
             } ?>
                </tbody>






















              <!--<div align="center">
                <?php //echo $i?>
              <h4 id="MyAud"><?php //echo $dado['nome']; ?></h4>
              <br>
              <div><solid> <?php //echo $row['user']?>; </solid></div>
              </div>-->
              
        
            </div>
      












  <section class=wrap>
    <section data-theme>
      <section class=wrap>

         

      


        
        <h2>Dados do Cliente</h2>

         <h4>Número do Pedido: <?php echo $dado['id']; ?> </h4>
        
         

        <form form method="POST" action=>
          <h3>Dados Pessoais</h3>  
          <fieldset id=billingAddress>

            
            <input type=text required name=nome id=firstName placeholder="Nome Completo" autocorrect=off  value="<?php echo $dado['nome']; ?>">
            <input type=number required name=cpf id=lastName placeholder="CPF" autocorrect=off value="<?php echo $dado['cpf']; ?>">
            <input type=date required name=nasc id=lastName placeholder="Data de Nascimento" autocorrect=off value="<?php echo $dado['nasc']; ?>">
            <input type=text required name=mae id=firstName placeholder="Nome da Mãe" autocorrect=off value="<?php echo $dado['mae']; ?>">
            <input type=number required name=rg id=lastName placeholder="RG" autocorrect=off value="<?php echo $dado['rg']; ?>">
            <input type=email required name=email id=firstName placeholder="E-mail" autocorrect=off value="<?php echo $dado['email']; ?>">




            <!--document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";-->

           <h3>Endereço</h3> 



        <div>

        
        <input name="cep"  type="text" id="cep" placeholder="CEP" value="<?php echo $dado['cep']; ?>"  maxlength="9" autocorrect=off
               onblur="pesquisacep(this.value);">
               

        
        <input name="rua" type="text" id="rua"   placeholder="RUA" value="<?php echo $dado['rua']; ?>"><br />
        

        <div>
        
        <input name="bairro" type="text" id="bairro"  placeholder="BAIRRO" value="<?php echo $dado['bairro']; ?>">
        

        
        <input name="cidade" type="text" id="cidade"  placeholder="CIDADE" value="<?php echo $dado['cidade']; ?>"><br />
        
        </div>


        <div class="tamanho">

          
        
        <input type=text name=uf id="uf" class=quarter placeholder="UF" autocorrect=off value="<?php echo $dado['uf']; ?>"><br />

        <input type=text name=num id="num" class=quarter placeholder="NÚMERO" value="<?php echo $dado['num']; ?>" autocorrect=off>

        <div/>

        <div>

        <input type=text name=complemento id="complemento" class=quarter placeholder="COMPLEMENTO" value="<?php echo $dado['complemento']; ?>" autocorrect=off><br />

        <input type=text required name=ponto id=address2  placeholder="PONTO DE REFERÊNCIA" value="<?php echo $dado['ponto']; ?>" autocorrect=off><br />


        
        </div>
     

            
            
            <!-- <input type=text required name="cep" id="cep" class=quarter placeholder=CEP value="" autocorrect=off size="10" maxlength="9" onblur="pesquisacep(this.value);">

            <input type=text name="rua" id="rua" placeholder=RUA autocorrect=off size="60">
          
            <input type=text required name="bairro" id="bairro" class=quarter placeholder=BAIRRO autocorrect=off size="40">

            <input type=text name="cidade" id="cidade" class="quarter" placeholder="CIDADE" autocorrect=off size="40">

            <input type=text name=cc_postal_code id="numero" class="quarter" placeholder="NÚMERO" autocorrect=off>

            <input type=text name=uf id=postal class="uf" placeholder="UF" autocorrect=off size="2">
            
            <input type=text required name=cc_street1 id=address class=quarter placeholder=COMPLEMENTO autocorrect=off>

            <input type=text required name=cc_street2 id=address2 class=quarter placeholder="PONTO DE REFERÊNCIA" autocorrect=off> -->
      
            
            
            <fieldset id=billingAddress>
            

            
          </fieldset>

      
          

          </fieldset>

          <h3>Contatos</h3>
          <fieldset id=billingAddress>
            <div id="bloco">
            <input type=tel name="tel1" id="contato" placeholder="Telefone 1" value="<?php echo $dado['tel1']; ?>" autocorrect=off>
             
            
      </div>

       </fieldset>

       <fieldset id=billingAddress>
      <div id="bloco">
            <input type="tel2" name="tel2" id="contato" placeholder="Telefone 2" value="<?php echo $dado['tel2']; ?>" autocorrect=off>
             
            
      </div>
           </fieldset> 

           <fieldset id=billingAddress>
      <div id="bloco">
            <input type="text" name="tel3" id="contato" placeholder="Telefone 3" value="<?php echo $dado['tel3']; ?>" autocorrect=off>
             
            
      </div>
           </fieldset> 

           <h3>Planos</h3>
          <fieldset id=billingAddress>
            <div id="bloco">
            
             
            
      </div>

       </fieldset>

    <div class=split-input>
              <select name="blarga" id=cardType class=three-quarters placeholder="PLANO" value="<?php echo $dado['blarga']; ?>">
                <option value="SELECIONE"></option>
                <option value="200 Mega + Voip (OI FIBRA)">200 Mega + Voip (OI FIBRA)</option>
                <option value="400 Mega + Voip (OI FIBRA)">400 Mega + Voip (OI FIBRA)</option>
                <option value="TIM 150 Mega PLUS">TIM 150 Mega PLUS </option>
                <option value="TIM 200 Mega PLUS">TIM 200 Mega PLUS </option>
              </select>
    </div>

        <div class=split-input>
    
               
              <select name="fixo" id=cardType class=quarters  placeholder="FIXO" value="<?php echo $dado['fixo']; ?>">
                <option value="SEM TELEFONE"></option>
                <option value="TIM FIXO LOCAL">TIM FIXO LOCAL</option>
                <option value="TIM FIXO BRASIL">TIM FIXO BRASIL</option>
               </select>    
        </div>

              </select>


        <script>
    function updateUserStatus(){
      jQuery.ajax({
        url:'update_user_status.php',
        success:function(){
          
        }
      });
    }
    
    function getUserStatus(){
      jQuery.ajax({
        url:'get_user_status.php',
        success:function(result){
          jQuery('#user_grid').html(result);
        }
      });
    }
    
    setInterval(function(){
      updateUserStatus();
    },3000);
    
    setInterval(function(){
      getUserStatus();
    },7000);
    </script>             
         </fieldset> 

         
              
            

            
              
         

         


          <button data-button id="butao" name="editar">Salvar Pedido</button>
        </form>


        <?php }

     ?>

      <?php 

          if(isset($_POST['editar']))  {
          require_once('../conex.class.php');

            $Objdb = new database();
            $link = $Objdb->conecta_mysql();

            $sql_edit = "UPDATE client_prop SET nome = '$nome', cpf = '$cpf', nasc = '$nasc', mae = '$mae', rg = '$rg', email = '$email', cep = '$cep', rua = '$rua', bairro = '$bairro', cidade = '$cidade', uf = '$uf', num = '$num', complemento = '$complemento', ponto = '$ponto', tel1 = '$tel1', tel2 = '$tel2', tel3 = '$tel3', blarga = '$blarga', fixo = '$fixo' WHERE id = '$id' " ;

              echo "<script>window.location='base.php';</script>";


            }


      ?>


      
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/eqcss/1.7.0/EQCSS-polyfills.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/eqcss/1.7.0/EQCSS.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/67439/data-modals.js'></script>
</body>
</html>

