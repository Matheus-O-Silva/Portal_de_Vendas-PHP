
<?php



?>

<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Order Form with Element Queries</title>
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
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

<body>
<!-- partial:index.partial.html -->
<body class=fullwidth>
  <section class=wrap>
    <section data-theme>
      <section class=wrap>
        <h1>Novo Cadastro</h1>
        <h2></h2>
        <h2>Dados do Funcionário</h2>
        <form form method="POST" action="dados_cliente.php">
          <h3>Dados Pessoais</h3>  
          <fieldset id=billingAddress>

            
            <input type=text required name=nome id=firstName placeholder="Nome Completo" autocorrect=off >
            <input type=number required name=cpf id=lastName placeholder="CPF" autocorrect=off>
            <input type=date required name=nasc id=lastName placeholder="Data de Nascimento" autocorrect=off>
            <input type=text required name=mae id=firstName placeholder="Nome da Mãe" autocorrect=off>
            <input type=number required name=rg id=lastName placeholder="RG" autocorrect=off>
            <input type=text name="matricula" id=lastName placeholder="matrícula" autocorrect=off>
            <input type=email required name=email id=firstName placeholder="E-mail" autocorrect=off >




            <!--document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";-->

           
            
            
            <fieldset id=billingAddress>
            

            
          </fieldset>

      
          

          </fieldset>

          <h3>Contatos</h3>
          <fieldset id=billingAddress>
            <div id="bloco">
            <input type=tel name="tel1" id="contato" placeholder="Telefone 1" autocorrect=off>
             
            
      </div>

       </fieldset>

       <fieldset id=billingAddress>
      <div id="bloco">
            <input type="tel2" name="tel2" id="contato" placeholder="Telefone 2" autocorrect=off>
             
            
      </div>
           </fieldset> 

           <fieldset id=billingAddress>
      <div id="bloco">
            <input type="text" name="tel3" id="contato" placeholder="Telefone 3" autocorrect=off>
             
            
      </div>
           </fieldset> 

           
             
            
      </div>

       </fieldset>
               
               <h3>CARGO</h3>
              <select name="cargo" id=cargo class=quarters  placeholder="CARGO">
                <option value="EMPRESÁRIO"></option>
                <option value="GERENTE">GERENTE</option>
                <option value="CONSULTOR">CONSULTOR</option>
                <option value="BACK OFFICE">BACK OFFICE</option>
                <option value="SUPERVISOR">SUPERVISOR</option>
               </select> 
               
        </div>

              </select>
         </fieldset> 

         
              
            

            
              
         

         
          </br>
          </br>
          </br>

          <button data-button id="butao">Registrar Funcionário</button>
        </form>




      
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/eqcss/1.7.0/EQCSS-polyfills.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/eqcss/1.7.0/EQCSS.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/67439/data-modals.js'></script>
</body>
</html>


