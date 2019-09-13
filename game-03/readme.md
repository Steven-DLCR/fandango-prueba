# The Gilded Rose Kata

## Setup

This repository includes the initial setup for this Kata, including a specs file. It uses the [Kahlan library](https://kahlan.github.io/docs/) which you might not be familiar with. But, don't worry, there's really nothing new to learn. Review the specs, and you'll understand the basic syntax in less than a minute.

1. Before starting, make sure you have [Docker](https://www.docker.com/get-started) installed and accessible through the `docker` command in your terminal.
2. Build and start our `gilded-rose` docker container using `start.sh`.
	```bash
	$ ./start.sh
	```
3. Now you are ready for happy refactoring 🎉. Whenever you need to run the tests use `test.sh`.
	```bash
	$ ./test.sh
	```
4. Once you finish your work, you can run `finish.sh` to stop and remove the running container.
	```bash
	$ ./finish.sh
	```
5. We assume your OS has Bash available. If that's not the case, you might need to have a look at `start.sh`, `test.sh` and `finish.sh` in order to run the suitable commands needed for this project.

## Rules

Hi and welcome to team Gilded Rose. As you know, we are a small inn with a prime location in a prominent city ran by a friendly innkeeper named Allison. We also buy and sell only the finest goods. Unfortunately, our goods are constantly degrading in quality as they approach their sell by date. We have a system in place that updates our inventory for us. It was developed by a no-nonsense type named Leeroy, who has moved on to new adventures.

**Your task is to add the new feature to our system so that we can begin selling a new category of items.**

First, an introduction to our system:

- All items have a SellIn value which denotes the number of days we have to sell the item
- All items have a Quality value which denotes how valuable the item is
- At the end of each day our system lowers both values for every item

Pretty simple, right? Well, this is where it gets interesting:

- Once the sell by date has passed, Quality degrades twice as fast
- The Quality of an item is never negative
- "Aged Brie" actually increases in Quality the older it gets
- The Quality of an item is never more than 50
- "Sulfuras", being a legendary item, never has to be sold or decreases in Quality
- "Backstage passes", like aged brie, increases in Quality as it's SellIn value approaches; Quality increases by 2 when there are 10 days or less and by 3 when there are 5 days or less but Quality drops to 0 after the concert

We have recently signed a supplier of conjured items. This requires an update to our system:

"Conjured" items degrade in Quality twice as fast as normal items.

Just for clarification, an item can never have its Quality increase above 50. However, because "Sulfuras" is a legendary item, its Quality starts at 80 and never changes.

## Challenge

1. Refactor the monstrous code in the `GildedRose.php` class.
2. Add a new item type, "Conjured". The specs for this item are commented out in the `GildedRoseSpec.php` file.
