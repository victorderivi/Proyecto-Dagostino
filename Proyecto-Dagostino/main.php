<?php
  class bloque{
    public $valor=NULL;
    public $l=NULL; //left
    public $r=NULL; //right
  }
  $bloque=array();
 function ingresarPiramide(...$lista){
    for ($i=0;$i<21;$i++){
      $bloque[$i] = new bloque;
      if(is_int($lista[$i])){
        $bloque[$i]->valor=$lista[$i];
      }
      if($i<=0){
        $bloque[$i]->l=1+$i;
        $bloque[$i]->r=1+$i+1;
      }
      else {
        if($i<=2){
          $bloque[$i]->l=2+$i;
          $bloque[$i]->r=2+$i+1;
        }
        else {
          if($i<=5){
            $bloque[$i]->l=3+$i;
            $bloque[$i]->r=3+$i+1;
          }
          else {
            if($i<=9){
              $bloque[$i]->l=4+$i;
              $bloque[$i]->r=4+$i+1;
            }
            else {
              if($i<=14){
                $bloque[$i]->l=5+$i;
                $bloque[$i]->r=5+$i+1;
              }
            }
          }
        }
      }
    }
    return $bloque;
  }
  function resolverPiramide($bloque){
    $flag=1;
    while($flag>0){
      $flag=0;
      for($i=0;$i<15;$i++){
        if(is_int($bloque[$bloque[$i]->l]->valor) && is_int($bloque[$bloque[$i]->r]->valor) && (is_int($bloque[$i]->valor)==FALSE)){
            $bloque[$i]->valor=$bloque[$bloque[$i]->l]->valor+$bloque[$bloque[$i]->r]->valor;
            $flag++;
          }
        if(is_int($bloque[$i]->valor) && is_int($bloque[$bloque[$i]->r]->valor) && (is_int($bloque[$bloque[$i]->l]->valor)==FALSE)){
          if($bloque[$bloque[$i]->r]->valor<=$bloque[$i]->valor){
            $bloque[$bloque[$i]->l]->valor=$bloque[$i]->valor-$bloque[$bloque[$i]->r]->valor;
            $flag++;
          }else{
            echo "la piramide no se puede resolver";
            return 0;
          }
        }
        if(is_int($bloque[$i]->valor) && is_int($bloque[$bloque[$i]->l]->valor) && (is_int($bloque[$bloque[$i]->r]->valor)==FALSE)){
          if($bloque[$bloque[$i]->l]->valor<=$bloque[$i]->valor){
            $bloque[$bloque[$i]->r]->valor=$bloque[$i]->valor-$bloque[$bloque[$i]->l]->valor;
            $flag++;
            }else{
              echo "la piramide no se puede resolver";
              return 0;
            }
        }
      }
    }
    for($i=0;$i<21;$i++){
      if(is_int($bloque[$i]->valor)==FALSE){
        echo "datos insuficientes para resolver la piramide";
        return 0;
      }
    }
    return $bloque;
  }
  $piramide=ingresarPiramide("",22,"","","",8,"","","",4,"",3,"","","","",1,"",1,"","");
  $piramide=resolverPiramide($piramide);
  error_reporting(0);
?>
<table>
  <tr>
    <td></td><td></td><td></td><td></td><td></td><td><?php echo $piramide[0]->valor; ?></td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td></td><td><?php echo $piramide[1]->valor; ?></td><td></td><td><?php echo $piramide[2]->valor; ?></td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td><?php echo $piramide[3]->valor; ?></td><td></td><td><?php echo $piramide[4]->valor; ?></td><td></td><td><?php echo $piramide[5]->valor; ?></td>
  </tr>
  <tr>
    <td></td><td></td><td><?php echo $piramide[6]->valor; ?></td><td></td><td><?php echo $piramide[7]->valor; ?></td><td></td><td><?php echo $piramide[8]->valor; ?></td><td></td><td><?php echo $piramide[9]->valor; ?></td>
  </tr>
  <tr>
    <td></td><td><?php echo $piramide[10]->valor; ?></td><td></td><td><?php echo $piramide[11]->valor; ?></td><td></td><td><?php echo $piramide[12]->valor; ?></td><td></td><td><?php echo $piramide[13]->valor; ?></td><td></td><td><?php echo $piramide[14]->valor; ?></td>
  </tr>
  <tr>
    <td><?php echo $piramide[15]->valor; ?></td><td></td><td><?php echo $piramide[16]->valor; ?></td><td></td><td><?php echo $piramide[17]->valor; ?></td><td></td><td><?php echo $piramide[18]->valor; ?></td><td></td><td><?php echo $piramide[19]->valor; ?></td><td></td><td><?php echo $piramide[20]->valor; ?></td>
  </tr>
<table>
</html>
