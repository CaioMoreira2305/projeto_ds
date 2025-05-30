<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-left">
                                <h1 class="h4 text-gray-900 mb-4">Endereço</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="cep"
                                            placeholder="CEP">
                                    </div>
                                    <div class = "col-sm-2">
                                        <input type="button" class="btn btn-primary btn-user btn-block" id = "pesquisar_cep" value="Pesquisar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="bairro"
                                        placeholder="Bairro" > 
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>

                                <div class = "col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control" name = "uf" >
                                        <option value = "1" >AC</option>
                                        <option value = "2" >AL</option>
                                        <option value = "3" >AP</option>
                                        <option value = "4" >AM</option>
                                        <option value = "5" >BA</option>
                                        <option value = "6" >CE</option>
                                        <option value = "7" >DF</option>
                                        <option value = "8" >ES</option>
                                        <option value = "9" >GO</option>
                                        <option value = "10" >MA</option>
                                        <option value = "11" >MG</option>
                                        <option value = "12" >MS</option>
                                        <option value = "13" >MT</option>
                                        <option value = "14" >PA</option>
                                        <option value = "15" >PB</option>
                                        <option value = "16" >PE</option>
                                        <option value = "17" >PI</option>
                                        <option value = "18" >PR</option>
                                        <option value = "19" >RJ</option>
                                        <option value = "20" >RN</option>
                                        <option value = "21" >RO</option>
                                        <option value = "22" >RR</option>
                                        <option value = "23" >RS</option>
                                        <option value = "24" >SE</option>
                                        <option value = "25" >SC</option>
                                        <option value = "26" >SP</option>
                                        <option value = "27" >TO</option>
                                    </select>
                                    
                                    <br>
                                    
                                <div class = "row">
                                    <div class = col-sm-3>
                                        <input type = "Submit" value = "Salvar" class = "btn btn-primary btn-user btn-block">
                                    </div>

                                    <div class = col-sm-3>
                                        <a href="login.html" class="btn btn-primary btn-user btn-block">
                                            Limpar
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include_once 'footer.php' ?>

    <script>
        
        $(document).ready(function(){
            $('#pesquisar_cep').click(function(){
                var cep = $("#cep").val();
                $.get('https://viacep.com.br/ws/' + cep + '/json', function(dados){
                    $('#cep').val(dados.cep);
                    $('#bairro').val(dados.bairro);
                    console.log(dados);
                });
            });
        });

    </script>

</body>

</html>