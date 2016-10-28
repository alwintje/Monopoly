function action()
{
	console.log($('a').value);

	var request = new Request({method:'post', url:'../mons/index.php'}).send('param1='+ p1,'param2='+ p2);
}
