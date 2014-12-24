<?php

return array(

	'mandrill' => array(
		'secret' => getenv('MANDRILL_API_KEY'),
	),

	'stripe' => array(
		'model'  => 'User',
		'secret' => '',
	),

);
