<link href="portugol_interpreter/jquery.terminal.min.css" rel="stylesheet"/>
<textarea id="codigo"></textarea>
<br><br>
<button id="exec" class="btn btn-default">Executar</button>
<button class="btn btn-info pull-right" id="save">Salvar</button>
<br><br>
<div id="terminal"></div>
<input type="hidden" id="idportugol" value="<?php echo $portugol->id;?>">
<input type="hidden" id="idaluno" value="<?php echo $USER->id;?>">
<script src="portugol_interpreter/main.js"></script>
<script src="salvar.js"></script>
