<?php

return [

    'initialize' => function ($authority) {
        $user = Auth::guest() ? new User : $authority->getCurrentUser();

        if(Auth::check()) {
            $authority->allow(['read', 'update', 'delete'], 'Goal', function($self, $goal) {
                return $self->user()->id == $goal->user_id;
            });

            $authority->allow(['read', 'update', 'delete'], 'Workout', function($self, $workout) {
                return $self->user()->id == $workout->user_id;
            });
        }

    }

];
