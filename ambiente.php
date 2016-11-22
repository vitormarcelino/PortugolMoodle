<link href="interpretador-portugol/jquery.terminal.min.css" rel="stylesheet"/>
<textarea id="codigo"></textarea>
<br><br>
<button id="exec" class="btn btn-default">Executar</button>
<button class="btn btn-info pull-right" id="salvar">Salvar</button>
<br><br>
<div id="term_demo"></div>
<input type="hidden" id="idportugol" value="<?php echo $portugol->id;?>">
<input type="hidden" id="idaluno" value="<?php echo $USER->id;?>">
<script src="interpretador-portugol/main.js"></script>