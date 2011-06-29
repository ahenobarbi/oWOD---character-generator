<?xml version="1.0" encoding="UTF-8">
<step>
  <title>
    Podstawowe informacje o postaci
  </title>
  <description>
    Więcej informacji o <a href="http://wbn.noson.pl/wiki/index.php?title=Wampir">Wampirach<a>...
  </description>
  <main-content>
    <table><tr><td>Imię:</td><td><input width="40" id="name-input"/></td></tr>
    <tr><td>Natura:</td><td><input width="40" id="nature-input"/></td></tr>
    <tr><td>Postawa:</td><td><input width="40" id="demeanor-input"/></td></tr>
    </table>
    <input type="radio" name="race-choice" value="vampire">Wampir<br/>
    <input type="radio" name="race-choice" value="werewolf">Wilkołak<br/>
    <input type="radio" name="race-choice" value="mage">Mag</input><br/>
    <input type="radio" name="race-choice" value="human" checked>Człowiek</input>
  </main-content>
  <next-step>
    attributes
  </next-step>
  <indata input-selector="#name-input" variable-id="name" />
  <indata input-selector="#nature-input" variable-id="nature" />
  <indata input-selector="#demeanor-input" variable-id="demeanor" />
  <indata input-selector="input[name='race-choice']:checked" variable-id="race" />
</step>
