<!-- 수행시간(Execution time) -->
<?php

  $end = $function->getExecutionTime();
  $time = $end - $start;
  echo "\t\t\t<br>";
  echo "\t\t\t<span class=\"time_font\">";
  echo "수행시간(Execution Time):";
  echo $time . "초(Sec)</span>";
  
  echo "\t\t\t<br>";
  echo "\t\t\t<span class=\"time_font\">";
  echo "시작시간(Start Time):";
  echo $start . "초(Sec)</span>";
  echo "\t\t\t<br>";
  echo "\t\t\t<span class=\"time_font\">";
  echo "종료시간(End Time):";
  echo $end . "초(Sec)</span>";
?>
