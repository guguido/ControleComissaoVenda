<html>
    <head>
        <title>Controle de Comissões e Vendas de Vendedores</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="card-header text-center">
            <h3 class="card-title ">Controle de Comissões e Vendas de Vendedores</h3>
            <div class="card rounded">
                <span id="success_message"></span>
                <table class="table table-borded table-striped">
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Mostrar Vendas</button> 
        <button type="submit" class="btn btn-success">Cadastrar Vendedor</button>
    </body>
</html>


<div id="cadastrarVendedor" class="modal fade">
    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Cadastro de Vendedores</strong>
    </h5>

    <div class="card-body px-lg-5">
        <form >
            <div class="form-group">
                <label for="inputAddress">Nome</label>
                <input type="text" class="form-control" placeholder="Nome Vendedor">
            </div>
            <div class="form-row">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" placeholder="seuemail@aqui.com">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>

<div id="cadastrarVendedor" class="modal fade">
    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Lançar Nova Venda</strong>
    </h5>
    <div class="card-body px-lg-5">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputState">Vendedores</label>
                <select id="inputState" class="form-control">
                    <option selected>Todos</option>
                    <option><h6>Vendedor 1</h6></option>
                </select>
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail4">Valor da venda</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="R$ 0">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Lançar</button>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript">
    console.log('data inincio');
    $(document).ready(function(){
        console.log('data antes');
        function fetch_data()
        {
            console.log('data durante');
            $.ajax({
                method:"POST",
                data:{
                    data_action:'fetch_all'
                },
                url:"<?php echo base_url() ?>test/action",
                success:function(data){
                    console.log('data', data);
                    $('tbody').html(data);
                }
            })
        }

        fetch_data();
    });
</script>
