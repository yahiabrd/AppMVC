<?php

$this->_t = 'Mon blog';

foreach($articles as $article)
{
	?>

	<h2>
		<a href='<?= URL. 'articles/'.$article->getId(); ?>'>
			<?= $article->getTitle(); ?>	
		</a>
	</h2>
	<time><?= $article->getDate(); ?></time>

	<?php
}