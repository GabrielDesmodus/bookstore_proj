<!DOCTYPE html>
<html>
  <head>
     <meta charset='utf-8' />
     <title>Livraria</title>
     <link rel='icon' href='/////////////////////////////////////MUDAR ICONE AQUI////////////' />
     <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' >
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <meta name='viewport' content='width=device-width, initial-scale=1' />
  </head>
<body>
    <div class='container border m-2 mx-auto'>		  
        <h1 class="display-1">Livraria Athens</h1>
	    <nav class='navbar navbar-expand-lg navbar-light bg-secondary'>  
		    <a class="navbar-brand"style="font-weight: bold;font-size: 30px;">Sessões</a>
            <div class='navbar-expand' id='navbarNav'>
                <ul class='navbar-nav'>
				    <li class='nav-item'><a class='nav-link' href='Index.php?opc=H' style="font-weight: bold; color: red;">Homepage</a></li>
				    <li class='nav-item'><a class='nav-link' href='Index.php?opc=L' style="color: white;">Estoque</a></li>
				    <li class='nav-item'><a class='nav-link' href='Index.php?opc=R' style="color: white;">Restrito</a></li>
				</ul>
            </div>
	    </nav>		
<?php 	 
	include "DataBase.php";
	
	if (isset($_GET['opc'])){
		$option = $_GET['opc'];
	} 
	else{
		$option = "H";				
	}

///////////////////////////---------------------HOMEPAGE-------------------/////////////////////////////////
        
  	if ($option == "H"){ 		
				echo "<br/><br/>
		 	     	  <div class='container'>
					      <div class='col text-center' ><img src='Imagens/Homepage.jpg' width=750 / style='border-style: solid; border-width: 3px;'></div>
			          </div>
		             <br />";
	}

//////////////////////////----------------------ESTOQUE--------------------/////////////////////////////////

	elseif ($option == "L"){	
		echo "<br/>
			 <h2>Procurar por:</h2>
			 <br/>
			 <div class='dropdown'> 
				 <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
					 Idiomas
				 </button>
			    	 <div class='dropdown-menu' aria-labelledby='dropdownMenu2'>
					     <button type='button' class='btn btn-secondary' onclick=location.replace('Index.php?opc=L&crit=IDIOMA&sel=Inglês')>Inglês</button>	
					     <button type='button' class='btn btn-secondary' onclick=location.replace('Index.php?opc=L&crit=IDIOMA&sel=Espanhol')>Espanhol</button>
					     <button type='button' class='btn btn-secondary' onclick=location.replace('Index.php?opc=L&crit=IDIOMA&sel=Japonês')>Japonês</button>
					     <button type='button' class='btn btn-secondary' onclick=location.replace('Index.php?opc=L&crit=IDIOMA&sel=Alemão')>Alemão</button>
					 </div>
			 </div>
			 <br/><br/>
			 <br/>
			 <div class='dropdown'> 
				 <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenu3' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
					 Gênero
				 </button>
				 <div class='dropdown-menu' aria-labelledby='dropdownMenu3'>
				     <button type='button' class='btn btn-secondary' onclick=location.replace('Index.php?opc=L&crit=GENERO&sel=Romance')>Romance</button>	
					 <button type='button' class='btn btn-secondary' onclick=location.replace('Index.php?opc=L&crit=GENERO&sel=Terror')>Terror</button>
					 <button type='button' class='btn btn-secondary' onclick=location.replace('Index.php?opc=L&crit=GENERO&sel=Suspense')>Suspense</button>
                     <button type='button' class='btn btn-secondary' onclick=location.replace('Index.php?opc=L&crit=GENERO&sel=Filosofia')>Filosofia</button>
				 </div>  
			 </div>
			 <br/>
			 <br/>
			 <br/>";
        
		if (isset($_GET['crit']) and isset($_GET['sel'])) {
			$crit = $_GET['crit'];
			$sel = $_GET['sel'];
			$args = " WHERE ". $crit ." = '$sel'";		
			$table = seleciona("livros_tb", "*", $args);

			echo "<h5 class='p-2  bg-danger text-white'>$sel</h5>
				  <div class='container w-75'>
                      <div class='row'>";
            for ($i = 0; $i < count($table); $i++) {
                echo "<div class='col text-center font-weight-bold'> 
                          <span class='text-danger'>". $table[$i]['NOME'] ." </span> 
                          <br/> 
                          <img src='". $table[$i]['FOTO'] ."' width='300'/> 
                          <br/>
                          <span class='text-dark'>R$ ". number_format($table[$i]['PRECO'],2,",",".") ."</span> 
                          <br/>
                      </div>";
                    	}				 			
				echo "</div>
			    </div>
			<p class='m-2'><input type='submit' class='bg-danger'value='Voltar' onclick='history.go(-1)' /></p>";	
		}
	}	

////////////////--------------------ÁREA DO FUNCIONÁRIO---------------------/////////////////////////////

	elseif ($option == "R"){
		echo "<div class='p-2 btn-group'>
                  <button type='button' class='btn btn-secondary' onclick=location.replace('Index.php?opc=C')>Cadastrar</button>
			      <button type='button' class='btn btn-secondary' onclick=location.replace('Index.php?opc=A')>Alterar</button>	
			      <button type='button' class='btn btn-secondary' onclick=location.replace('Index.php?opc=E')>Excluir</button>	  
			      <button type='button' class='btn btn-secondary' onclick=location.replace('Index.php?opc=S')>Listar</button>	
		      </div>";	
	}	

//CADASTRAR LIVRO//
        
	elseif ($option == "C"){
		echo "<h5 class='p-2 m-2 bg-secondary text-white '>Cadastrar Livro</h5>
                  <br/>
                  <form action='Index.php?opc=I' method='post' class='p-2'>
                  <h4> Nome: <input type='text' name='NOME' size='40' maxlength='40' required /> </h4>
                  <h5> Idioma: 
                      <select name='IDIOMA' required >
                          <option value='' disabled selected>Selecione...</option> 
                          <option value='Inglês'>Inglês</option> 
                          <option value='Espanhol'>Espanhol</option>
						  <option value='Japonês'>Japonês</option>
						  <option value='Alemão'>Alemão</option>
                      </select>
                      <br/>
                      <h5 class='' > Gênero: 
                      <select name='GENERO' required >
                          <option value='' disabled selected>Selecione...</option> 
                          <option value='Romance'>Romance</option> 
                          <option value='Terror'>Terror</option>
                          <option value='Suspense'>Suspense</option>
                          <option value='Filosofia'>Filosofia</option>
                      </select> 
                  </h5>
                  <h5> Foto: <input type='text' name='FOTO' size='50' maxlength='50' value='Imagens/Fotos/' required /> </h5>
                  <h5> Preço: R$ <input type='number' name='PRECO' min='1' max='1000' value='0' required />,00 </h5>
                  <h5> Data: R$ <input type='date' name='DATA' required /></h5>
                  <br/>
                  <h5> <input type='submit' value='CADASTRAR' class='bg-danger'/></h5>
		      </form>";
	}

	elseif ( $option == "I" ){					
		$name = $_POST['NOME'];
        $genero = $_POST['GENERO'];
        $data = $_POST['DATA'];
		$idioma = $_POST['IDIOMA'];
		$foto = $_POST['FOTO'];
		$preco = $_POST['PRECO'];
		
		$fields = "NOME, GENERO, DATA, IDIOMA, FOTO, PRECO";
		$values = "'$name', '$genero', '$data', '$idioma', '$foto', '$preco'";

		if (insere("livros_tb", $fields, $values) == TRUE){
            echo "<p class='p-2 m-2 bg-info bg-danger'>Livro foi cadastrado</p>";
		}
		else{
            echo "<p class='p-2 m-2 bg-warning text-white'>Livro não pode ser cadastrado</p>";
		}
		echo "<p class='m-2'><input type='submit' value='Voltar' onclick=location.replace('Index.php?opc=R') /></p>";
	}

        
//VISUALIZAR LIVROS//
        
	elseif ($option == "S") {	 	
		$table = seleciona("livros_tb", "*", "");
		echo " <h5 class='p-2 m-2 bg-secondary text-white text-center'>Livros Disponíveis:</h5>
			<div class='container'>
                 <div class='row'>
                     <div class='col text-center font-weight-bold'></div>
		 			 <div class='col text-center font-weight-bold'>Nome</div>
		 			 <div class='col text-center font-weight-bold'>Preço</div>
		 			 <div class='col text-center font-weight-bold'>Detalhes</div>
				</div>";			
				for($i=0; $i < count($table); $i++) {		
					echo "<div class='row'>
                            <div class='col text-center'><img src=". $table[$i]['FOTO'] ." width='20'/></div>
							<div class='col text-center'>". $table[$i]['NOME'] ."</div>
							<div class='col text-center'>R$ ". number_format($table[$i]['PRECO'],2,',','.') ."</div>
							<div class='col text-center'><a href='Index.php?opc=D&id=". $table[$i]['CODIGO'] ."' ><img src='Imagens/plus.png' width='20'/></a></div>
						</div>
                        <br/>";
				}
		echo "</div>";	
	}

//DETALHES DOS LIVROS//        
        
	elseif ($option == "D") {	
		$codigo = $_GET['id'];
		$args = " WHERE CODIGO = '$codigo'";	

		$table = seleciona("livros_tb", "*", $args);	

		echo "<div class='container'>
              <h2 class='p-2 m-2 text-dark'>". $table[0]['NOME'] ."</h2>
                    <div class='row'>
                    	<div class='col text-center my-auto'><img src='". $table[0]['FOTO'] ."' width='100' /></div>
						<div class='col text-center font-weight-bold my-auto'>Idioma: </div>
                        <div class='col my-auto'>". $table[0]['IDIOMA'] ."</div>
                        <div class='col text-center font-weight-bold my-auto'>Gênero: </div>
					  	<div class='col my-auto'>". $table[0]['GENERO'] ."</div>
                        <div class='col text-center font-weight-bold my-auto'>Data: </div>
					  	<div class='col my-auto' style='font-size: 12px;'>". $table[0]['DATA'] ."</div>
                        <div class='col text-center font-weight-bold my-auto'>Código: </div>
					  	<div class='col my-auto'>". $table[0]['CODIGO'] ."</div>
						<div class='col text-center font-weight-bold my-auto'>Valor: </div>
					  	<div class='col my-auto'>R$ ". number_format($table[0]['PRECO'],2,',','.') ."</div>
					</div>
			        <br />
			        <p><input type='submit' value='Voltar' onClick='history.go(-1)'  class='bg-danger'/> </p>	
            </div>";
	}
	
    //ALTERAR OS LIVROS//    
        
	elseif ($option == "A"){	
		$table = seleciona("livros_tb", "*", "");
		echo " <h5 class='p-2 m-2 bg-secondary text-white text-center'>Livros Disponíveis para Alteração:</h5>
			<div class='container'>
                 <div class='row'>
                     <div class='col text-center font-weight-bold'></div>
		 			 <div class='col text-center font-weight-bold'>Nome</div>
		 			 <div class='col text-center font-weight-bold'>Preço</div>
		 			 <div class='col text-center font-weight-bold'>Alterar</div>
				</div>";			
				for($i=0; $i < count($table); $i++) {		
					echo "<div class='row'>
                            <div class='col text-center'><img src=". $table[$i]['FOTO'] ." width='20'/></div>
							<div class='col text-center'>". $table[$i]['NOME'] ."</div>
							<div class='col text-center'>R$ ". number_format($table[$i]['PRECO'],2,',','.') ."</div>
							<div class='col text-center'><a href='Index.php?opc=M&id=". $table[$i]['CODIGO'] ."' ><img src='Imagens/transform.png' width='20'/></a></div>
						</div>";
				}
		echo "</div>";			
	}

	elseif ($option == "M"){
		$codigo = $_GET['id'];
		$args = "WHERE CODIGO = '$codigo' ";
		$table = seleciona("livros_tb", "*", $args);
		
		echo "<h5 class='p-2 m-2 bg-secondary text-white'>Alterar</h5>
			 <form action='Index.php?opc=U&id=$codigo' class='p-2 m-2' method='post'>
			 <h4> Nome: <input type='text' name='NOME' size='40' maxlength='40' value='". $table[0]['NOME'] ."' required /></h4>
             <h5> Idioma: 
			 <select name='IDIOMA' required>
                 <option value='". $table[0]['IDIOMA'] ."' selected>". $table[0]['GENERO'] ."</option>  
                 <option value='Inglês'>Inglês</option> 
                 <option value='Espanhol'>Espanhol</option>
				 <option value='Japonês'>Japonês</option>
				 <option value='Alemão'>Alemão</option>
             </select> 
             </h5>
			 <h5> Gênero: 
			 <select name='GENERO' required>
                 <option value='". $table[0]['GENERO'] ."' selected>". $table[0]['GENERO'] ."</option> 
				 <option value='Romance'>Romance</option> 
				 <option value='Terror'>Terror</option>
				 <option value='Suspense'>Suspense</option>
				 <option value='Filosofia'>Filosofia</option>
				 </select> 
             </h5>
			 <h5> Foto: <input type='text' name='FOTO' size='50' maxlength='50' value='". $table[0]['FOTO'] ."' required /> </h5>
			 <h5> Valor: R$ <input type='number' name='PRECO' min='1' max='1000' value='". $table[0]['PRECO'] ."' required />,00 </h5>
			 <h5> Data: R$ <input type='date' name='DATA' value='". $table[0]['DATA'] ."' required /></h5>
             <br/>
             <h5> <input type='submit' value='Atualizar' class='bg-danger'/></h5>
		</form>";
	}

	elseif ($option == "U" ){
		$codigo = $_GET['id'];	
	
		$nome = $_POST['NOME'];
		$genero = $_POST['GENERO'];
		$idioma = $_POST['IDIOMA'];
		$foto = $_POST['FOTO'];
		$preco = $_POST['PRECO'];
		$data = $_POST['DATA'];

		$edit = " NOME = '$nome', 
				  GENERO = '$genero',
                  IDIOMA = '$idioma',
                  FOTO = '$foto',  
				  PRECO = '$preco',
				  DATA = '$data' ";

		$args = " WHERE CODIGO = '$codigo'";
        
		if (atualiza("livros_tb", $edit, $args) == TRUE ) {
			echo "<p class='p-2 m-2 bg-info bg-danger'>Produto alterado com sucesso!</p>";
		}
		else {
			echo "<p class='p-2 m-2 bg-warning text-white'>Erro ao alterar Produto!</p>";
		}
		echo "<p class='m-2'><input type='submit' value='Voltar' onclick=location.replace('Index.php?opc=R') class='bg-danger'/></p>";
	}

//EXCLUSÃO DE LIVROS
        
	elseif ( $option == "E" ){ 	
		$table = seleciona("livros_tb", "*", "");
		echo " <h5 class='p-2 m-2 bg-secondary text-white text-center'>Livros Disponíveis para Exclusão:</h5>
			<div class='container'>
                 <div class='row'>
                     <div class='col text-center font-weight-bold'></div>
		 			 <div class='col text-center font-weight-bold'>Nome</div>
		 			 <div class='col text-center font-weight-bold'>Preço</div>
		 			 <div class='col text-center font-weight-bold'>Excluír</div>
				</div>";			
				for($i=0; $i < count($table); $i++) {		
					echo "<div class='row'>
                            <div class='col text-center'><img src=". $table[$i]['FOTO'] ." width='20'/></div>
							<div class='col text-center'>". $table[$i]['NOME'] ."</div>
							<div class='col text-center'>R$ ". number_format($table[$i]['PRECO'],2,',','.') ."</div>
							<div class='col text-center'><a href='Index.php?opc=X&id=". $table[$i]['CODIGO'] ."' ><img src='Imagens/remove.png' width='20'/></a></div>
						</div>";
				}
		echo "</div>";			
	}

	elseif ($option == "X"){
		$codigo = $_GET['id'];			
		$args = " WHERE CODIGO = '$codigo'";
		if ( deletar("livros_tb", $args) == TRUE ) {
			echo "<p class='p-2 m-2 bg-info bg-danger'>Livro excluído dos registros</p>";			  
		}
		else {
			echo "<p class='p-2 m-2 bg-warning text-white'>livro não foi excluído dos registros</p>";
		}
		echo "<p class='m-2'><input type='submit' value='Voltar' onclick=location.replace('Index.php?opc=R') class='bg-danger'/></p>";		
	}


	