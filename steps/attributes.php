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

  $physical_attributes = array(
    "Siła" => regular_stat(1, "strength-input-wrapper", "strInput"),
    "Zręczność" => regular_stat(1, "dextrity-input-wrapper", "dexInput"),
    "Wytrzymałość" => regular_stat(1, "stamina-input-wrapper", "staInput")
  );

  $social_attributes = array(
    "Charyzma" => regular_stat(1, "charisma-input-wrapper", "chaInput"),
    "Oddziaływanie" => regular_stat(1, "manipulation-input-wrapper", "manInput"),
    "Wygląd" => regular_stat(1, "apperance-input-wrapper", "appInput")
  );

  $mental_attributes = array(
    "Percepcja" => regular_stat(1, "perception-input-wrapper", "perInput"),
    "Inteligencja" => regular_stat(1, "inteligence-input-wrapper", "intInput"),
    "Spryt" => regular_stat(1, "wits-input-wrapper", "witInput")
  );

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

<?xml version="1.0" encoding="UTF-8">
<step>
  <title>
    Wybierz atrybuty
  </title>
  <description>
    Jedne są pierszorzędne i masz 7 pkt na nie.<br/>
    Drugie są drugorzędne i masz 5 pkt.<br/>
    A czecie som czecio rzendne i masz czy punkty na nie.<br/>
  </description>
  <main-content>
    <div class="left-column">
      <?php
        dot_inputs($physical_attributes);
        //dot_input_tds("Siła", "strength-input-wrapper");
      ?>
    </div>
    <div class="central-column">
      <?php
        dot_inputs($social_attributes);
        //dot_input_tds("Charyzma", "charisma-input-wrapper");
      ?>
    </div>
    <div class="right-column">
      <?php
        dot_inputs($mental_attributes);
        //dot_input_tds("Inteligencja", "inteligence-input-wrapper");
      ?>
    </div>
  </main-content>
  <next-step>
    attributes
  </next-step>
  <before-script>
    <?php js_dot_inputs($physical_attributes); ?>
    <?php js_dot_inputs($social_attributes); ?>
    <?php js_dot_inputs($mental_attributes); ?>

    window.chaWrapper = new makeInput(1, 1, 5, "#charisma-input-wrapper", "chaWrapper");
    window.intWrapper = new makeInput(1, 1, 5, "#inteligence-input-wrapper", "intWrapper");
  </before-script>
  <indata input-selector="#name-input" variable-id="name" />
  <indata input-selector="#nature-input" variable-id="nature" />
  <indata input-selector="#demeanor-input" variable-id="demeanor" />
  <indata input-selector="input[name='race-choice']:checked" variable-id="race" />
</step>
