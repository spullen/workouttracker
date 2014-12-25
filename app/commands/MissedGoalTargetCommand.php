<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MissedGoalTargetCommand extends Command {

	protected $name = 'notifications:missed_goal_target';
	protected $description = 'Send notification to users that have missed their target date for a goal.';

	public function fire() {
		
	}

}
