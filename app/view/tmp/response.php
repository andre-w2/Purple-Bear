
<? foreach ($datatable as $key => $value) { ?>

	<div class="block">
	<h4 class="name"><?= $value->name ?></h4>

	<p class="message"><?= $value->message ?></p>

	<time><?= $value->date ?></time>
</div>
<? } ?>
