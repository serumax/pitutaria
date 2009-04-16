 <?php
  sleep(10);
  if ($fp = fopen("/var/www/marketjob/log.txt", "a")) {
   	fwrite ($fp, "Child process finished at ".date("H:i:s", time())."!\n");
   	fclose($fp);
 }
?>