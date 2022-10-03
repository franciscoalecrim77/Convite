<?php

if(isset($_GET['xo32k38d876']) && $_GET['xo32k38d876'] == 'dc0323e0626fecf68e5385131ab46686c760019e'){
  //phpinfo();
  //exit;
    require_once("../../library/conexaoprod.php");

    $query = mysqli_query($conexao, "SELECT * FROM confirmacao order by data_hora_confirmacao");
    $result = [];
    if(mysqli_num_rows($query) > 0) {
      while($row = mysqli_fetch_object($query)){
            $result[]= $row;
      }
    }

} else {
  echo "acesso restrito";
    exit;
}

?>

<table style="width:100%;border:1px solid #ccc;text-align:left">
    <thead>
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Data / Hora</th>
        <th>IP</th>
        <th>Nº Acomp.</th>
        <th>Acão</th>


    </tr>
  </thead>
  <tbody>
    <?php
      $total_pessoas = 0;
      foreach ($result as $key => $value) {
          echo "<tr>
                  <td>{$value->nome}</td>
                  <td>{$value->email}</td>
                  <td>{$value->telefone}</td>
                  <td>{$value->data_hora_confirmacao}</td>
                  <td>{$value->ip_usuario}</td>
                  <td>{$value->acompanhantes}</td>
                  
                  <td>[Apagar]</td>
                </tr>";
                $total_pessoas = $value->acompanhantes + 1 + $total_pessoas;
      }
?>
  <tr>
      <td colspan="5"></td>
      <td><strong><?php echo $total_pessoas; ?></strong></td>
      <td></td>
    </tr>
</tbody>
</table>
