PHP Watch
=========

So.. [Realtime php task runner](https://github.com/MattivdWeem/Realtime-php-task-runner) was kinda an test, since i had to travel for 4 hours today i did some proof of concept in the train.

### What does it do?
PHP watch watches your folders, filers or w/e task you have given in. When one of the files changes, gets deleted or some new one is created it runs a task.

### How to start?

#### Setting up your tasks

 - Edit tasks.json
 - Create an file in the tasks folder linking to your start up file
 - Run code

##### Edit tasks.json

Your tasks.json should look something like this:

	{
		"markdown": {
			"onUpdate": "markdown/parseMarkdown",
			"watch": "test/markdown/*.md",
			"output": "test/markdown/output/",
			"theme": "github.html"

		},

		"host": {
			"onLaunch": "server/startServer",
			"start": "test/markdown/output",
			"open": true,
			"host": "localhost",
			"port": 5000
		}
	}
You are able to trow in extra options and loading them in your custom task by $t->youroption here. Watch is required.

The onUpdate includes the file that will be included (tasks/{youronupdate}.php) This should be filled in if you want to run a function on update.
It wille be included(on each update time(so do it efficent with include_once(when needed))). You may use code like exit or die in this file to close the script (if you want to).

##### Run the code

Just execute: `./watch` In your terminal, this will start the watcher.
