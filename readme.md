[MET Values](http://juststand.org/Portals/3/literature/compendium-of-physical-activities.pdf)
[Average Weights](http://www.theaveragebody.com/average_weight.php)

Requires [assets](https://github.com/spullen/getmovingfitness-assets) to be running

    grunt

## Deploying

* cd /var/www/html/workouttracker
* git pull
* composer update (* if necessary)
* php artisan migrate (* if necessary)
* cd /var/ww/html/workouttracker-assets
* grunt build-prod