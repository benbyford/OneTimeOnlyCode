<?php

class OneTimeOnlyCodeConfig extends ModuleConfig{

	private $cronArray	= [	'everyMinute',
							'every30Minutes',
							'everyHour',
							'every2Hours',
							'every4Hours',
							'every6Hours',
							'every12Hours',
							'everyDay',
                            'every2Days',
                            'every4Days',
                            'everyWeek',
                            'every2Weeks',
                            'every4Weeks'];

	// default array for UserSubscription module
	public function getDefaults() {
	    return array(
            'cron_check' => 'everyDay',
            'elapsedTime' => '86400'
	    );
	}

	/*
	* getInputfields()
	*
	* return:  $inputfields
	*/

	// create form within PW admin to enable configuration of module
	public function getInputfields() {

		// get module getInputfields set config class
    	$inputfields = parent::getInputfields();

		// get InputfieldSelect module
    	$f = $this->modules->get('InputfieldSelect');
    	$f->attr('name', 'cron_check');
    	$f->label = 'Time to check codes';
		$f->description = 'Choose a time interval the site will use LazyCron to check whether any codes need deleting';

		foreach ($this->cronArray as $cronTime) {
			$f->addOption($cronTime);
		}
		// add cron option to inputfields
		$inputfields->add($f);


        $f = $this->modules->get('InputfieldInteger');
    	$f->attr('name', 'elapsedTime');
    	$f->label = 'Code elapsed length time';
		$f->description = 'Amount of time in seconds after code created before it is deleted. 86400 seconds = 1 day. If set to 0 then codes will never get deleted by cron job';
		$inputfields->add($f);

		// return module config inputs
	    return $inputfields;
  	}
}
