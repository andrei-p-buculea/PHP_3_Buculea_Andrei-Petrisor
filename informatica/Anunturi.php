<html>

<head>
    <title>Anunturi </title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="anunturi.css">
</head>

<body>
    <header>
        <img src="logo.png" alt="logo">
        <img src="sigla.png" alt="sigla">
        <p>Departamentul de Informatica <br>Facultatea de Stiinte</p>
        <ul class="nav">
            <li> <a href="Admitere.php">Admitere</a></li>
            <li> <a href="Anunturi.php">Anunturi</a></li>
            <li> <a href="CadreDidactice.php">Cadre Didactice</a></li>
            <li> <a href="Contact.php">Contact</a></li>
            <li> <a href="Home.php">Home</a></li>
            <li> <a href="ProgrameStudiu.php">Programe Studiu</a></li>
        </ul>
    </header>


    <?php
    require_once "connect.php";
    ?>


    <h1>Anunturi</h1>
    <?php
    $comanda = isset($_REQUEST['comanda']) ? $_REQUEST['comanda'] : "";
    if (!empty($comanda)) {
        switch ($comanda) {

            case 'add':
                $descriere = $_REQUEST["descriere"];
                $categorie = $_REQUEST["categorie"];

                //TODO
                $sql = "INSERT INTO anunturi(descriere,categorie)
             VALUES ('$descriere','$categorie')";
                if (!mysqli_query($conexiune, $sql)) {
                    die('Eroare: ' . mysqli_error($conexiune));
                }

                echo "<font color='blue'>Anunt adaugat cu succes</font><br/>";
                break;

            case 'delete':
                $id = $_REQUEST["id"];
                //TODO
                $sql = "DELETE FROM anunturi WHERE id=$id";
                if (!mysqli_query($conexiune, $sql)) {
                    die('Eroare: ' . mysqli_error($conexiune));
                }
                echo "<font color='red'>Anuntul cu id-ul $id a fost sters cu succes </font><br/>";

                break;

            case 'edit':
                $id = $_REQUEST["id"];
                //TODO
                $sql = "SELECT * FROM anunturi WHERE id=$id";
                $result = mysqli_query($conexiune, $sql);
                if ($row = mysqli_fetch_array($result)) {
                    $descriere = $row['descriere'];
                    $categorie = $row['categorie'];

    ?>
                    <!-- Forma de editare (begin) ---->
                    <h3>Editare</h3>
                    <form action="Anunturi.php" method="POST">
                        <input name="comanda" type="hidden" value="update" />
                        <input name="id" type="hidden" value="<?php echo $id; ?>" />
                        Descriere: <input type="text" name="descriere" value="<?php echo $descriere; ?>" required />
                        Categorie: <input type="text" name="categorie" value="<?php echo $categorie; ?>" required />
                        <input type="submit" value="Update" />
                    </form>
                    <!-- FORMA DE EDITARE (end) -->
    <?php
                } else {
                    echo "<font color='red'>Intrarea cu id-ul $id nu exista!</font><br/>";
                }
                break;

            case 'update':
                $id = $_REQUEST["id"];
                $descriere = $_REQUEST["descriere"];
                $categorie = $_REQUEST["categorie"];

                //TODO
                $sql = "UPDATE anunturi SET descriere='$descriere', categorie='$categorie'  WHERE id=$id ";
                if (!mysqli_query($conexiune, $sql)) {
                    die('Eroare: ' . mysqli_error($conexiune));
                } else {
                    echo "<font color='red'>Anuntul cu id-ul $id a fost actualizat cu succes </font><br/>";
                }
                break;
        }
    }
    ?>

    <?php
    //AFISAREA anunturilor
    $query = "SELECT * FROM anunturi";
    $result = mysqli_query($conexiune, $query);

    if (mysqli_num_rows($result)) {
        print("<table border='1' cellspacing='0'>\n");
        print("<tr><th>#</th><th width='200'>descriere</th><th width='20'>categorie</th><th>Sterge</th><th>Editare</th></tr>\n");
        while ($row = mysqli_fetch_array($result)) {
            print("<tr>\n");
            print("<td>" . $row['id'] . "</td>\n");
            print("<td>" . $row['descriere'] . "</td>\n");
            print("<td>" . $row['categorie'] . "</td>\n");
            print("<td><a href='Anunturi.php?comanda=delete&id=" . $row['id'] . "'>Delete</a></td>\n");
            print("<td><a href='Anunturi.php?comanda=edit&id=" . $row['id'] . "'>Edit</a></td>\n");
            print("</tr>\n");
        }
        print("</table>");
    } else {
        print "Nu exista anunturi !";
    }
    ?>

    <!-- Forma de adaugare -->
    <form action="Anunturi.php" method="POST">
        <input name="comanda" type="hidden" value="add" />
        Descriere: <input type="text" name="descriere" required />
        Categorie: <input type="text" name="categorie" required />
        <input type="submit" value="Adauga" />
    </form>

    <footer>
        Stiinta este ceea ce intelegem suficient de bine pentru a-i explica unui computer.
    </footer>
</body>

</html>