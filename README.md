## Table of contents
* [General Info](#general-info)
* [Technologies](#technologies)
* [Localhost](#localhost)
* [Process for getting the website running locally](#process-for-getting-the-website-running-locally)
* [Branching and merging strategy](#branching-and-merging-strategy)

## General Info
This project is a website with two parts: the wiki and the map.

The wiki part contains pages for all countries, puppets and colonies and all their leaders, generals, equipment, battles, divisions and political situation in that country from 1933 to 1945.

The map part is an interactive map similar to google maps with countries and their puppets showed on the map painted according to their faction. The map shows the borders and frontlines for each day from October 1935 (start of the Italo-Ethiopian war) to September 1945 (end of WWII), and also shows the events that happened on a particular day.

## Technologies
Project is created with:
* HTML 5
* CSS 4
* PHP 7.3.12
* JavaScript 9
* Bootstrap 3.4
* jQuery 3.4
* Leaflet 1.6

## Localhost
For hosting a localhost, we used:
* WAMP 3.2.0

## Process for getting the website running locally
Download WAMP via this link: https://www.wampserver.com/en/ and make sure to select "PHP 7.3.12" during the installation phase.
WAMP makes it possible for you to emulate the website on your machine.

After you're done with that, download Github desktop: https://desktop.github.com
Login with your Github account, and clone the repository to C:\wamp64\www\waw

After that, restart WAMP by clicking on the "W" icon on the right side of your taskbar.

## Branching and merging strategy
We are using GitHub Flow's branching strategy, and here is their set of rules that must be always followed:
* Code in master must be deployable at all times.
* When you want to start working on a new task, create a new branch off of master and give it a descriptive name.
* Commit to that branch locally and regularly send your work to the same-named branch on the server.
* Open a pull request when you feel your changes are ready to be merged (or even if you aren’t so sure, but would like some feedback).
* After the new feature is revised and approved, you can merge it into master.
* Once your changes are merged and pushed to the master, you can and should deploy immediately.
