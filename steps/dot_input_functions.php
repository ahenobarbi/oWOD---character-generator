<?php
  function dot_input_div($text, $id){
  ?>
    <div class="input-wrapper">
      <span class="stat-name"><?php echo $text ?></span>
      <span id="<?php echo $id ?>"> </span>
    </div>
  <?php
  }

  function regular_stat($val, $name, $jsName){
    $result = array( "val" => $val, "min_val" => 1, "max_val" => 5,
                    "name" => $name, "show_dots" => 5, "full_dot" => "*",
                    "empty_dot" => "-", "js-name" => $jsName);
    return($result);
  }

  function dot_inputs($fields){
    foreach(array_keys($fields) as $field_name)
      dot_input_div($field_name, $fields[$field_name]["name"]);
  }

  function wrap($s1, $s2){
    return($s2.$s1.$s2);
  }

  function js_dot_input($config){
    $name = $config["js-name"];
    $val = $config["val"];
    $min_val = $config["min_val"];
    $max_val = $config["max_val"];
    $selector = wrap("#".$config["name"], '"');
    $name_str = wrap($config["js-name"], '"');
    $show_dots = $config["show_dots"];
    $full_dot= wrap($config["full_dot"], '"');
    $empty_dot= wrap($config["empty_dot"], '"');

    $args = array($val, $min_val, $max_val, $selector, $name_str, $show_dots, $full_dot, $empty_dot);
    $args_str = join(", ", $args);
    echo 'window.'.$name.' = new makeInput('.$args_str.');';
  }

  function js_dot_inputs($configs){
    foreach($configs as $config)
      js_dot_input($config);
  }
?>
