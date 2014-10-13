<?php
/*
 * Model/Event.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
 
class Event extends FullCalendarAppModel {

    var $name = 'Event';

    var $displayField = 'title';

    var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'start' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		)
	);

    var $hasManty = array(
        'ProductsForEvent' => array(
            'className' => 'ProductsForEvent',
            'foreignKey' => 'event_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

	var $belongsTo = array(
		'EventType' => array(
			'className' => 'FullCalendar.EventType',
			'foreignKey' => 'event_type_id'
		),
        'Meal' => array(
            'className' => 'Meal',
            'foreignKey' => 'meal_id',
            'dependent' => false
        )
	);

    public function findEvent($id = null){
        $options = array(
            'conditions' => array('Event.id' => $id),
            'recursive' => 0,
            'contain' => array(
                'Meal' => array(
                    'RecipesForMeal' => array(
                        'Recipe' => array(
                            'ProductsForRecipe' => array(
                                'Product' => array(
                                    'MeasureUnit' => array()
                                )
                            )
                        )
                    )
                ),
                'EventType' => array()
            )
        );
        $event = $this->find('first', $options);
        return $event;
    }
}
?>
