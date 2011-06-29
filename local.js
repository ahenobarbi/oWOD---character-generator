var step = 'initial'
var character = { }
var to_get = { }
function parseStepXML(xml){
  title = $(xml).find('title').text()
  description = $(xml).find('description').html()
  content = $(xml).find('main-content').html()
  step = jQuery.trim($(xml).find('next-step').text())
  script = jQuery.trim($(xml).find('before-script').html())

  $("#title").html(title)
  $("#description").html(description)
  $("#main-content").html(content)

  to_get = { }
  $(xml).find('indata').each(function(){
    key = $(this).attr('variable-id')
    value = $(this).attr('input-selector')
    to_get[key] = value
   })

   eval(script)
}

function getStep(){
  $.ajax({
    type: "GET",
    url: "./steps/" + step +".php",
    data: character,
    success: parseStepXML
  });
}

function makeAStep(){
  for(variable in to_get){
    field = to_get[variable]
    value = $(field).val()
    character[variable] = value
  }
  getStep();
}

function default_to(val, default_val){ return(typeof(val) != 'undefined' ? val : default_val); }

function repeat(s, n) { var r=""; for (var a=0;a<n;a++) r+=s; return r;}

function makeInput(val, min_val, max_val, container_selector, name, show_dots, full_dot, empty_dot){

  show_dots = default_to(show_dots, 5);
  full_dot = default_to(full_dot, '*');
  empty_dot = default_to(empty_dot, '-');

  this._val = val;
  this._min_val = min_val;
  this._max_val = max_val;
  this._full_dot = full_dot;
  this._empty_dot = empty_dot;
  this._show_dots = show_dots;

  this._container = $(container_selector);

  this._container.html('<span name="display" class="dot-display"></span>' +
                  '<span name="minus" class="button" onclick="javascript:window.' +
                  name + '.decrease();">-</span>' +
                  '<span name="plus" class="button" onclick="javascript:window.' +
                  name + '.increase();">+</span>');

  this._display = this._container.children("span[name='display']")

  this.show_value = function(){
    full_dots = repeat(this._full_dot,this._val);
    empty_dots = repeat(this._empty_dot, this._show_dots - this._val);
    all_dots = full_dots + empty_dots;
    this._display.html(all_dots);
  }

  this.increase = function(){
    if(this._val < this._max_val){
      this._val = this._val + 1;
      this.show_value();
    }
  }
  this.decrease = function(){
    if(this._val > this._min_val){
      this._val = this._val - 1;
      this.show_value();
    }
  }

  this.show_value();
  return(this);
}
