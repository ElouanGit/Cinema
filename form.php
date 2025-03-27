<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h3>Inscriver vous !</h3>
        <div class="form">
            <form method="get" action="info-profile.php">
                <label for="form">Remplisser le form</label><br>
                <label for="nom">Firstname</label>
                <input type="text" id="nom" name="nom"  placeholder="Firstname..."><br>
                <label for="nom">Lastname</label>
                <input type="text" id="nom" name="prénom"  placeholder="lastname ...."><br>
                <label for="date">Birthday</label>
                <input type="date" id="date" name="date"><br>
                <label for="adress">Adress</label>
                <input type="text" id="adress" name="adress"><br>
                <label for="Zipcode">Zipcode</label>
                <input type="text" id="Zipcode" name="Zipcode"><br>
                <label for="city">City</label>
                <input type="text" id="city" name="city"><br>
                <label for="country">Country</label>
                <input type="text" id="country" name="country"><br>
                <input type="submit" id="form">
                <select name="choix" id="choix" required>
                   
                    <option value="1">VIP</option>
                    <option value="2">GOLD</option>
                    <option value="3">CLASSIC</option>
                    <option value="4">PASS DAY</option>
                </select><br>
                <input type="submit" id="form">
            </form>
            
        </div>
    </body>
</html>