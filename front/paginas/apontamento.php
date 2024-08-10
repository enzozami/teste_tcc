<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apontamento - O-LINKe Medical</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../apontamento.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: #b5b5b5; width: 100%; height: 100%;">
    <div class="container">
        <form action="index.php" method="post">
            
            <?php include 'template.php' ?>
            
            <div id="apontamentoForm" class="mt-3">
                
                
                    <h5 class="text-center mx-auto py-3">APONTAMENTO</h5> <!--     text-align: center; margin-top: 25px; padding-top: 15px; -->

                <div class="row mt-4 text-center" id="primeira_parte">
                    <div class="col">
                        <label for="nop" class="form-label">Número Ordem: </label>
                        <input type="text" id="nop" name="nop" class="form-control" pattern="^[0-9]{6}[A-Z]{2}[0-9]{3}$" title="Número Ordem" required value="<?=$_POST['nop'] ?? null ?>">
                        <div id="error-message-nop" style="color: red; display: none">Entrada Inválida.</div>
                    </div>

                    <div class="col">
                        <label for="codigo" class="form-label">Código: </label>
                        <input type="number" step="any" id="codigo" name="codigo" class="form-control">
                    </div>

                    <div class="col">
                        <label for="quantidade" class="form-label">Quantidade: </label>
                        <input type="number" step="any" id="quantidade" class="form-control" pattern="^[0-9]{4}$" title="Quantidade" required value="<?=$_POST['quantidade'] ?? null ?>">
                        <div id="" style="color: red; display: none;"></div>
                    </div>

                </div>

                <div class="row mt-5 text-center" id="segunda_parte">
                    <div class="col">
                        <label for="operador" class="form-label">Operador: </label>
                        <input type="number" step="any" id="operador" class="form-control" pattern="^[0-9]{2}$" title="Operador" required value="<?=$_POST['operador'] ?? null ?>">
                        <div id="error-message-operador" style="color: red; display: none"></div>
                    </div>

                    <div class="col">
                        <label for="operacao" class="form-label">Operação: </label>
                        <select name="operacao" id="operacao" class="form-control rounded-pill" onchange="teste()" required>
                            <option value="">Selecione uma operação:</option>
                            <option value="usi">Usinagem</option>
                            <option value="reb">Rebarbar</option>
                            <option value="lav">Lavagem</option>
                            <option value="poli">Polimento</option>
                            <option value="in">Inspeção</option>
                            <option value="est">Esterialização</option>
                            <option value="estoque">Estoque</option>
                        </select>
                        <div id="error-message-operacao" style="color: red; display: none">Operação inválida.</div>
                    </div>

                    <div id="maquina-div" class="col" style="display: none">
                        <label for="maquina" class="form-label">Máquina: </label>
                        <select name="maquina" id="maquina" class="form-control rounded-pill">
                            <option value="">Selecione uma máquina</option>
                            <option value="torno_l20">M-21</option>
                            <option value="torno_l20_2">M-31</option>
                            <option value="torno_C16">M-13</option>
                            <option value="torno_C16_2">M-14</option>
                            <option value="torno_C16_3">M-15</option>
                            <option value="centro_torneamento_star">M-05</option>
                            <option value="centro_usinagem_760">M-19</option>
                            <option value="centro_usinagem_660">M-22</option>
                            <option value="brother">M-18</option>
                        </select>
                        <div class="error-message-maquina" style="color: red; display: none">Máquina inválida.</div>
                    </div>
                </div>   
                <br><br>
                <button class="btn btn-success my-2 w-25 d-block mx-auto">Salvar</button> 
                <!-- <div class="error-message-apontamento" style="color: red; display: none">Apontamento Inválido.</div> -->
            </div>
        </form>

        <?php 
            $nop = filter_input(INPUT_POST, 'nop', FILTER_SANITIZE_STRING);
            $codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
            $operacao = filter_input(INPUT_POST, 'operacao', FILTER_SANITIZE_NUMBER_INT);
            $operador = filter_input(INPUT_POST, 'operador', FILTER_SANITIZE_NUMBER_INT);
            $maquina = filter_input(INPUT_POST, 'maquina', FILTER_SANITIZE_STRING);
            $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);

            if(isset($nop) == false || strlen($nop) == 0){
                echo"<div class='alert alert-danger'>Forneça o número da ordem corretamente!</div>";
            } elseif (isset($operacao) == false){
                echo"<div class='alert alert-danger'>Forneça a operação corretamente!</div>";
            } elseif(isset($operador) == false || strlen($operador) == 0){
                echo"<div class='alert alert-danger'>Forneça o operador corretamente!</div>";
            } elseif(isset($quantidade) == false || strlen($quantidade) == 0){
                echo"<div class='alert alert-danger'>Forneça a quantidade corretamente!</div>";
            } else {
                // aqui vai ocorrer o codigo kkk
            }

        ?>

    </div>
    
    <script src="apontamento.js"></script>
    <script>

        /*function teste() {
            alert('teste');
            var operacao = this.value;
            var maquinaDiv = document.getElementById('maquina-div');
            
            if(operacao == "usi"){
                maquinaDiv.style.display = 'block';
                isValid = false;
            } else {
                maquinaDiv.style.display = 'none';
                document.getElementById('maquina').selectedIndex = 0; // reinicia para o padrao se o campo 'usi' for desselecionado
            }
            
        }*/

        document.getElementById('operacao').addEventListener('change', function() {
            
    var operacao = this.value;
    var maquinaDiv = document.getElementById('maquina-div');
    
    if(operacao == "usi"){
        maquinaDiv.style.display = 'block';
        isValid = false;
    } else {
        maquinaDiv.style.display = 'none';
        document.getElementById('maquina').selectedIndex = 0; // reinicia para o padrao se o campo 'usi' for desselecionado
    }
    });
    </script>
</body>
</html>