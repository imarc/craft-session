# Craft Session

This is a Craft 3 Session class which allows setting the mask for session files.

## Install

Install in your Craft 3 project using composer:

    composer require imarc/craft-session

Then enable the configure the class within your `config/app.php` file:

    <?php
    return [
	   'components' => [
			'session' => function() {
				$stateKeyPrefix = md5('Craft.' . Session::class . '.' . Craft::$app->id);

				return Craft::createObject([
					'class' => Imarc\Craft\Session::class,
					'flashParam' => $stateKeyPrefix . '__flash',
					'authAccessParam' => $stateKeyPrefix . '__auth_access',
					'name' => Craft::$app->getConfig()->getGeneral()->phpSessionName,
					'cookieParams' => Craft::cookieConfig(),

					// mask within path now supported for custom save path
					'savePath' => '0;0660;@storage/sessions'
				]);
			},
		],
    ];

## License

The MIT License (MIT)

## Copyright 

Copyright (c) 2020 iMarc LLC

