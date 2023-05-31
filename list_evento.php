<?php
    include('config.php');
    
    $sqlSelect = "SELECT * FROM eventos";
    
    $result = $conn->query($sqlSelect);
    
    $eventos=[];
    
    

   // if($result->num_rows > 0)
//    {
        while($event_data = mysqli_fetch_assoc($result))
        {
              $id = $event_data['id'];
              $titulo = $event_data['titulo'];
              $cor = $event_data['cor'];
              $inicio = $event_data['inicio'];
              $fim = $event_data['fim'];
              $obs = $event_data['obs'];
              $contato = $event_data['contato'];
              
              $eventos [] = [
                'id' => $id,
                'title' => $titulo,
                'color' => $cor,
                'start' => $inicio,
                'end' => $fim,   
                'obs' => $obs,
                'contato' => $contato,

              ];
            
        }
        
  //  }
  
  echo json_encode($eventos);
?>