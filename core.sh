#!/bin/bash
i=1;
while [ $i -le 10 ]; do
        screen -A -m -d -S bot php pokebot1.php
	sleep 12h
	screen -X -S bot quit
done