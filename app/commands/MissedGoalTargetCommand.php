<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\DateTime\Scheduler;

class MissedGoalTargetCommand extends ScheduledCommand {

	protected $name = 'notifications:missed_goal_target';
	protected $description = 'Send notification to users that have missed their target date for a goal.';

	public function fire() {
		
	}

	public function schedule(Schedulable $scheduler) {
    return $scheduler
		        ->daily()
		        ->hours(4);
   }

}
