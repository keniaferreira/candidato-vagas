<!--
|========================
|      Script
|========================
-->

<!-- Outros arquivos JS default -->
<?php $dir = "js/default";

$iterator = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator(
      $dir, 
      FilesystemIterator::SKIP_DOTS
  )
);

$array = iterator_to_array($iterator);

ksort($array);

foreach ($array as $file) {
  echo "<script src=/".$file."></script>";
} ?>

@if(Session::has('add_javascript'))
@foreach (Session::get('add_javascript.caminho') as $caminho)
<script src="{{$caminho}}"></script>
@endforeach
{{ Session::forget('add_javascript')}}
@endif