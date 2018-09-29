<?php //echo "Silence is golden";

try {
  throw new Exception("Test Eccezione!");
} catch (Exception $e) {
  echo 'Caught exception: ' . $e->getMessage();
}
