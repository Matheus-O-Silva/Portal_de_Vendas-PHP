
<?php



?>

<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title> - Cadastro</title>
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
</style>

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
        <h2>preencha seus dados</h2>
        <h2>Dados do Cliente</h2>
        <form form method="POST" action="dados_cliente.php">
          <h3>Dados Pessoais</h3>  
          <fieldset id=billingAddress>

            
            <input type=text required name=nome id=firstName placeholder="Nome Completo" autocorrect=off >
            <input type=number required name=cpf id=lastName placeholder="CPF" autocorrect=off>
            <input type=date required name=nasc id=lastName placeholder="Data de Nascimento" autocorrect=off>
            <input type=text required name=mae id=firstName placeholder="Nome da Mãe" autocorrect=off>
            <input type=number required name=rg id=lastName placeholder="RG" autocorrect=off>
            <input type=email required name=email id=firstName placeholder="E-mail" autocorrect=off >




            <!--document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";-->

           <h3>Endereço</h3> 



        <div>

        
        <input name="cep"  type="text" id="cep" placeholder="CEP" value=""  maxlength="9" autocorrect=off
               onblur="pesquisacep(this.value);" />
               

        
        <input name="rua" type="text" id="rua"   placeholder="RUA"><br />
        

        <div>
        
        <input name="bairro" type="text" id="bairro"  placeholder="BAIRRO">
        

        
        <input name="cidade" type="text" id="cidade"  placeholder="CIDADE"><br />
        
        </div>


        <div class="tamanho">

          
        
        <input type=text name=uf id="uf" class=quarter placeholder="UF" autocorrect=off><br />

        <input type=text name=num id="num" class=quarter placeholder="NÚMERO" autocorrect=off>

        <div/>

        <div>

        <input type=text name=complemento id="complemento" class=quarter placeholder="COMPLEMENTO" autocorrect=off><br />

        <input type=text required name=ponto id=address2  placeholder="PONTO DE REFERÊNCIA" autocorrect=off><br />


        
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

           <h3>Planos</h3>
          <fieldset id=billingAddress>
            <div id="bloco">
            
             
            
      </div>

       </fieldset>

    <div class=split-input>
              <select name="blarga" id=cardType class=three-quarters placeholder="PLANO">
                <option value="SELECIONE"></option>
                <option value="200 Mega + Voip (OI FIBRA)">200 Mega + Voip (OI FIBRA)</option>
                <option value="400 Mega + Voip (OI FIBRA)">400 Mega + Voip (OI FIBRA)</option>
                <option value="TIM 150 Mega PLUS">TIM 150 Mega PLUS </option>
                <option value="TIM 200 Mega PLUS">TIM 200 Mega PLUS </option>
              </select>
    </div>

        <div class=split-input>
    
               
              <select name="fixo" id=cardType class=quarters  placeholder="FIXO">
                <option value="SEM TELEFONE"></option>
                <option value="TIM FIXO LOCAL">TIM FIXO LOCAL</option>
                <option value="TIM FIXO BRASIL">TIM FIXO BRASIL</option>
               </select>    
        </div>

              </select>
         </fieldset> 

         
              
            

            
              
         

         


          <button data-button id="butao">Salvar Pedido</button>
        </form>




      
<!-- partial -->
  <script></script>

</body>
</html>




