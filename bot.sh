
if [ $1 = 'stop' ] 
    then 
        screen -X -S bot quit
    fi

if [ $1 = 'start' ] 
    then 
        screen -A -m -d -S bot php pokebot.php
    fi
