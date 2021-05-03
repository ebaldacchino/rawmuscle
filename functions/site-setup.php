<?php
    function matchFile($extension) {
  $handler = get_template_directory() . '/assets/dist/'; 
  $openHandler = opendir($handler);
  while ($file = readdir($openHandler)) {
    if ($file !== '.' && $file !== '..') {
      if (preg_match("/^main[.][a-z0-9]+[.]" . $extension . "$/i", $file, $name)) {
        return $name[0];
      }
    }
  }
  closedir($openHandler);
}

function getTime( $url ) {
  return filemtime( get_template_directory() . $url  );
}

function site_setup(){
  $stylesheet_url = '/assets/dist/' . matchFile( 'css' );

  $script_url =  '/assets/dist/' . matchFile( 'js' );

    wp_enqueue_style('main', get_template_directory_uri() . $stylesheet_url, NULL, getTime( $stylesheet_url ) , 'all');  

    wp_enqueue_script('main', get_theme_file_uri() . $script_url, NULL, getTime( $script_url ) , true); 
}

add_action('wp_enqueue_scripts', 'site_setup'); 

add_theme_support( 'post-thumbnails' );
?>