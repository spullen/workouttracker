<?php

return [

    'initialize' => function ($authority) {
        $user = Auth::guest() ? new User : $authority->getCurrentUser();

        if(Auth::check()) {
            $authority->allow(['read', 'update', 'delete'], 'Goal', function($self, $goal) {
                return $self->user()->id == $goal->user_id;
            });

            $authority->allow(['read'], 'Workout', function($self, $workout) {
                return $self->user()->id == $workout->user_id;
            });

            // Only allow the owner of the workout to update or delete if the workout was created within the last day
            $authority->allow(['update', 'delete'], 'Workout', function($self, $workout) {
                $now = Carbon::now();
                $created = new Carbon($workout->created_at);
                return $self->user()->id == $workout->user_id && $created->diff($now)->days < 1;
            });
        }

    }

];
