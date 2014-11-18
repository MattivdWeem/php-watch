PHP Watch
=========

After [Realtime php task runner](https://github.com/MattivdWeem/Realtime-php-task-runner) I wanted to make something better, since i had to travel for 4 hours today i did some proof of concept in the train.

### How to start?

#### Setting up your tasks

 - Edit tasks.json
 - Create an file in the tasks folder linking to your start up file
 - Run code

##### Edit tasks.json

Your tasks.json should look something like this:

`
		{
			"checkTextFiles": {
				"onUpdate": "checkTextFiles",
				"watch": "test/*.txt"
			},
			"checkDB": {
				"onUpdate": "checkDB",
				"watch": "test/data/*.ds"
			},
			"staticData": {
				"onUpdate": "staticData",
				"watch": "../staticdata/data/static/*.*"
			}
		}
`

The onUpdate includes the file that will be included (tasks/{youronupdate}.php) This should be filled in if you want to run a function on update.
It wille be included(on each update time(so do it efficent with include_once(when needed))). You may use code like exit or die in this file to close the script (if you want to).

##### Run the code

Just execute: `php watch.php` In your terminal, this will start the watcher.

:).