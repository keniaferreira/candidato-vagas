<!--
|========================
|      CSS
|========================
-->

<?php $dir = "css/default";

$iterator = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator(
    $dir, 
    FilesystemIterator::SKIP_DOTS
  )
);

$array = iterator_to_array($iterator);

ksort($array);

foreach ($array as $file) {
  echo "<link rel='stylesheet' href=/".$file.">";
} ?>