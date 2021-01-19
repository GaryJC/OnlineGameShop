<?php echo file_get_contents("navigationbar.html"); ?>
<section id="down">
                <h2 class="middle">Contact Us</h2>
            </section>

            <section id="Contact_us">


                <section>
                    <h3>Select your question</h3>
                    <input type="radio" name="question" value="game"> Game Issues<br>
                    <input type="radio" name="question" value="payment"> Payment Issues<br>
                    <input type="radio" name="question" value="other"> Other Issues
                </section>
                <label for="demo-input">Enter your name: </label><br>
                <input id="demo-input" type="text" value="Ethan"><br>
                <label class="distance" for="demo-input">Enter your question here:</label><br>
                <input id="demo-input2" type="text" value="I have a question about..."><br>
                <button>Submit</button>
            </section>
            <?php echo file_get_contents("footer.html"); ?>