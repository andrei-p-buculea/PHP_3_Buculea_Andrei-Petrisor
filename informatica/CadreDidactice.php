<html>

<head>
    <meta charset="utf-8" />
    <title>Cadre Didactice</title>
    <link rel="stylesheet" type="text/css" href="cadre.css">
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


    <h1>Cadre didactice</h1>

    <?php
    $comanda = isset($_REQUEST['comanda']) ? $_REQUEST['comanda'] : "";
    if (!empty($comanda)) {
        switch ($comanda) {

            case 'add':
                $nume = $_REQUEST["nume"];
                $grad = $_REQUEST["grad"];
                $titlu = $_REQUEST["titlu"];
                $pagina_web = $_REQUEST["pagina_web"];
                $telefon_serviciu = $_REQUEST["telefon_serviciu"];
                $fax_serviciu = $_REQUEST["fax_serviciu"];
                $e_mail = $_REQUEST["e_mail"];
                //TODO
                $sql = "INSERT INTO cadre(nume,grad,titlu,pagina_web,telefon_serviciu,fax_serviciu,e_mail)
             VALUES ('$nume','$grad','$titlu','$pagina_web','$telefon_serviciu','$fax_serviciu','$e_mail')";
                if (!mysqli_query($conexiune, $sql)) {
                    die('Eroare: ' . mysqli_error($conexiune));
                }

                echo "<font color='blue'>Cadru didactic adaugat cu succes</font><br/>";
                break;

            case 'delete':
                $id = $_REQUEST["id"];
                //TODO
                $sql = "DELETE FROM cadre WHERE id=$id";
                if (!mysqli_query($conexiune, $sql)) {
                    die('Eroare: ' . mysqli_error($conexiune));
                }
                echo "<font color='red'>Cadrul cu id-ul $id a fost sters cu succes </font><br/>";

                break;

            case 'edit':
                $id = $_REQUEST["id"];
                //TODO
                $sql = "SELECT * FROM cadre WHERE id=$id";
                $result = mysqli_query($conexiune, $sql);
                if ($row = mysqli_fetch_array($result)) {
                    $nume = $row['nume'];
                    $grad = $row['grad'];
                    $titlu = $row['titlu'];
                    $pagina_web = $row['pagina_web'];
                    $telefon_serviciu = $row['telefon_serviciu'];
                    $fax_serviciu = $row['fax_serviciu'];
                    $e_mail = $row['e_mail'];
    ?>
                    <!-- Forma de editare (begin) ---->
                    <h3>Editare</h3>
                    <form action="CadreDidactice.php" method="POST">
                        <input name="comanda" type="hidden" value="update" />
                        <input name="id" type="hidden" value="<?php echo $id; ?>" />
                        Nume: <input type="text" name="nume" value="<?php echo $nume; ?>" required />
                        Grad: <input type="text" name="grad" value="<?php echo $grad; ?>" required />
                        Titlu: <input type="text" name="titlu" value="<?php echo $titlu; ?>" required />
                        Pagina Web: <input type="url" name="pagina_web" value="<?php echo $pagina_web; ?>" required />
                        Telefon de serviciu: <input type="text" name="telefon_serviciu" value="<?php echo $telefon_serviciu; ?>" required />
                        Fax de serviciu: <input type="text" name="fax_serviciu" value="<?php echo $fax_serviciu; ?>" required />
                        E-mail : <input type="email" name="e_mail" value="<?php echo $e_mail; ?>" required />
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
                $nume = $_REQUEST["nume"];
                $grad = $_REQUEST["grad"];
                $titlu = $_REQUEST["titlu"];
                $pagina_web = $_REQUEST["pagina_web"];
                $telefon_serviciu = $_REQUEST["telefon_serviciu"];
                $fax_serviciu = $_REQUEST["fax_serviciu"];
                $e_mail = $_REQUEST["e_mail"];
                //TODO
                $sql = "UPDATE cadre SET nume='$nume', grad='$grad', titlu='$titlu', pagina_web='$pagina_web' , telefon_serviciu='$telefon_serviciu' ,
            fax_serviciu='$fax_serviciu', e_mail='$e_mail' WHERE id=$id ";
                if (!mysqli_query($conexiune, $sql)) {
                    die('Eroare: ' . mysqli_error($conexiune));
                } else {
                    echo "<font color='red'>Cadrul cu id-ul $id a fost actualizat cu succes </font><br/>";
                }
                break;
        }
    }
    ?>

    <?php
    //AFISAREA CADRELOR DIDACTICE 
    $query = "SELECT * FROM cadre";
    $result = mysqli_query($conexiune, $query);

    if (mysqli_num_rows($result)) {
        print("<table border='1' cellspacing='0'>\n");
        print("<tr><th width='1'>#</th><th width='200'>Nume</th><th width='5'>Grad</th><th width='5'>Titlu</th><th width='15'>Pagina Web</th><th width='10'>Telefon de serviciu</th><th width='10'>Fax de serviciu </th> <th width='15'>E-mail </th><th>Sterge</th><th>Editare</th></tr>\n");
        while ($row = mysqli_fetch_array($result)) {
            print("<tr>\n");
            print("<td>" . $row['id'] . "</td>\n");
            print("<td>" . $row['nume'] . "</td>\n");
            print("<td>" . $row['grad'] . "</td>\n");
            print("<td>" . $row['titlu'] . "</td>\n");
            print("<td>" . $row['pagina_web'] . "</td>\n");
            print("<td>" . $row['telefon_serviciu'] . "</td>\n");
            print("<td>" . $row['fax_serviciu'] . "</td>\n");
            print("<td>" . $row['e_mail'] . "</td>\n");
            print("<td><a href='CadreDidactice.php?comanda=delete&id=" . $row['id'] . "'>Delete</a></td>\n");
            print("<td><a href='CadreDidactice.php?comanda=edit&id=" . $row['id'] . "'>Edit</a></td>\n");
            print("</tr>\n");
        }
        print("</table>");
    } else {
        print "Nu exista cadre didactice!";
    }
    ?>

    <!-- Forma de adaugare -->
    <form action="CadreDidactice.php" method="POST">
        <input name="comanda" type="hidden" value="add" />
        Nume: <input type="text" name="nume" required />
        Grad: <input type="text" name="grad" required / maxlength="5">
        Titlu: <input type="text" name="titlu" required / maxlength="3">
        Pagina Web: <input type="url" name="pagina_web" required pattern="https?://.+" />
        Telefon de serviciu: <input type="tel" name="telefon_serviciu" required pattern="[+]{1}[0-9]{2}.[0-9]{3}.[0-9]{6}" />
        Fax de serviciu: <input type="text" name="fax_serviciu" required pattern="[+]{1}[0-9]{2}.[0-9]{3}.[0-9]{6}" />
        E-mail: <input type="email" name="e_mail" required />
        <input type="submit" value="Adauga" />
    </form>



    <footer>
        Stiinta este ceea ce intelegem suficient de bine pentru a-i explica unui computer.
    </footer>
</body>

</html>