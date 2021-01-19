<?php
include('navigationbar.php');
if(!isset($_SESSION)){
    session_start();
}
//s

?>


            <div class="rightContent">
                    <div class="slider">
                    <img src="DeathStanding.png">
                    </div>
                    <div class="recentgames">
                        <h1>Recent Released Games</h1>
                        <div class="recentgames-Image">
                            <img src="BF5.png">
                            <img src="TheDivision.png">
                        </div>
                    </div>

                    <div class="recentgames">
                            <h1>Recent News</h1>
                            <div class="recentgames-Image">
                                <img src="Zelda.png">
                                <img src="DOTA2.png">
                            </div>
                        </div>

                    
                </div>
                

            

        </main>
<?php echo file_get_contents("footer.html"); ?>