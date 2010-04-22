<?
  $st_src1     = $_POST[ 'st_src1' ];
  $st_src2     = $_POST[ 'st_src2' ];
  $st_form     = 0 + $_POST[ 'st_form' ];
  
  if ( $st_form > 1 ) $st_form = 1;
  if ( $st_form < 0 ) $st_form = 0;

  $fn1 = tempnam ( '/tmp', 'wdiff' );
  $fn2 = tempnam ( '/tmp', 'wdiff' );
  if ( $f1 = fopen ( $fn1, "w" ) ) {
    if ( $f2 = fopen ( $fn2, "w" ) ) {
      fwrite ( $f1, $st_src1 );
      fwrite ( $f2, $st_src2 );
      fwrite ( $f1, "\n" );
      fwrite ( $f2, "\n" );
      fclose ( $f2 );
      fclose ( $f1 );

      if ( $st_form == 0 ) $form = 'U';
      if ( $st_form == 1 ) $form = 'C';

      $cmd = 'diff -'.$form.' 3 '.$fn1.' '.$fn2;
      if ( $st_src1 == $st_src2 ) {
        echo "<p align=center style='font-weight: bold; font-size: 20pt; color: blue'>Texts is equal</p>";
      } else {
        echo "<table border=0 align=center>";
        echo "<tr><td>";
        exec ( $cmd, $out, $rv );
        for ( $i=0; $i<sizeof( $out ); $i++ ) {
          $s = $out[ $i ];
          if ( $st_form == 0 ) {
            if ( $s[ 0 ] =='-' && substr( $s, 0, 3 ) != '---' ) {
              echo "<b style='background-color: #FFCCCC'>", $s, "</b><br>";
            } else {
            if ( $s[ 0 ] =='+' && substr( $s, 0, 3 ) != '+++' ) {
              echo "<b style='background-color: #CCFFCC'>", $s, "</b><br>";
              } else {
                echo $s, "<br>";
              }
            }
          } else {
            echo $s, "<br>";
          }
        }
        echo "</table>";

        unlink ( $fn1 );
        unlink ( $fn2 );
      }
    }
  }
?>