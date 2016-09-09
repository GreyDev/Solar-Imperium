function randomizeEmpire()
{
	
	var name1 = Array(
        'Corporate','Master','Space',
        'Solar','Ralos','Blorgz','Heavy',
        'Hyperdrive','USR','Rogue','Death',
        'Star','Galactic','Cyber','Peaceful',
        'Power','Kickass','Elite','Evil'
    );

	var name2 = Array(
        'Muirepmi','Imperium','Corporation','Associates',
        'Industries','Robotics','Nation','Squadron',
        'Destroyers','Hyperion','Factories','Dominion'
    );

	var r1 = Math.round((name1.length-1)*Math.random());
	var r2 = Math.round((name2.length-1)*Math.random());
	document.join_form.empire_name.value = name1[r1] + ' '+name2[r2];


}


function randomizeEmperor()
{
	var name1 = Array(
        'Nafarious','Necro','Infamous','Illarious',
        'Mad','Bloody','Imperial','Goth','Chief',
        'Undead','Star','Evil','Good','Nasty',
        'Marvellous','Lord','Solar'
    );

	var name2 = Array(
        'Leader','Warrrior','Vampire',
        'PlanetBuster','Monster','JailKeeper','Jack',
        'Cleon I','Bevatron','Lord','Gurney','Jackal',
        'Destroyer','Master','Chief'
    );

	var r1 = Math.round((name1.length-1)*Math.random());
	var r2 = Math.round((name2.length-1)*Math.random());
	document.join_form.emperor_name.value = name1[r1] + ' '+name2[r2];

}
