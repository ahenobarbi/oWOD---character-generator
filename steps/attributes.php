<?php

  require 'dot_input_functions.php';

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
      ?>
    </div>
    <div class="central-column">
      <?php
        dot_inputs($social_attributes);
      ?>
    </div>
    <div class="right-column">
      <?php
        dot_inputs($mental_attributes);
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
  </before-script>
  <indata input-selector="#name-input" variable-id="name" />
  <indata input-selector="#nature-input" variable-id="nature" />
  <indata input-selector="#demeanor-input" variable-id="demeanor" />
  <indata input-selector="input[name='race-choice']:checked" variable-id="race" />
</step>
