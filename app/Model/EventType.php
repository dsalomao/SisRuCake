<?php
/*
 * Model/EventType.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
 
class EventType extends AppModel {

    var $name = 'EventType';

	var $displayField = 'name';

	var $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
	);

    /**
     * hasMany associations
     *
     * @var array
     */
    var $hasMany = array(
        'Event' => array(
            'className' => 'Event',
            'foreignKey' => 'event_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );}
?>
