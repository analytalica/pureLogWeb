<div class="center">
<ul class="parentMenu" style="margin-bottom: 2px">
<li><a href="#home" id="serverNav">Server Stats</a></li>
<li><a href="#news" id="adminNav">Admin Activity</a></li>
<li><a href="#contact" id="seederNav">Seeder Activity</a></li>
</ul>
<ul class="childMenu">
<li><a href="ss7.php" id="server7Nav">Last 7 Days</a></li>
<li><a href="index.php" id="server30Nav">Last 30 Days</a></li>
<li><a href="ssAll.php" id="serverAllNav">All Time</a></li>
</ul></div>
<p>pureLog is a plugin for PRoCon that logs game server popularity in a MySQL database by measuring player-minutes spent in game. 
A player-minute is defined as a single minute spent connected to the server by a player. 
The pureLog Web Interface allows users to view the daily player-minute totals from the web in a graphical, visualized format.
Results are compiled at the beginning of each new day, so the results of the current day will only be available the day after.</p>
<p><a href="http://purebattlefield.org">Version 1.0.0 - by Analytalica</a></p>

<?php include("config.php"); ?>