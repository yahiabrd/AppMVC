<?php

if(sizeof($articles) != 0 )
{
	$this->_t = 'Mon article';

	foreach($articles as $article)
	{
		echo '<h2>'.$article->getTitle().'</h2>';
		echo '<p>'.$article->getContent().'</p>';
		echo '<time>'.$article->getDate().'</time>';
	}

}